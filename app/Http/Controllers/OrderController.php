<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\History;
use App\Models\HistoryItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*
    |-------------------------------------------------------------------------- 
    | CUSTOMER
    |-------------------------------------------------------------------------- 
    */

    public function checkout()
    {
        return view('customer.checkout');
    }

    public function store(Request $request)
    {
        $order = null; // Deklarasi di luar
        
        DB::transaction(function () use ($request, &$order) { // Tambahkan &$order
            
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'meja'          => $request->meja,
                'total_harga'   => $request->total_harga,
                'status'        => 'pending',
            ]);

            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id'      => $order->id,
                    'menu_id'       => $item['id'],
                    'quantity'      => $item['quantity'],
                    'harga_satuan'  => $item['price'],
                    'subtotal'      => $item['price'] * $item['quantity'],
                ]);
            }
        });

        return response()->json(['success' => true, 'order_id' => $order->id]);
    }

    public function invoice($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);
        return view('customer.invoice', compact('order'));
    }

    /*
    |-------------------------------------------------------------------------- 
    | ADMIN
    |-------------------------------------------------------------------------- 
    */

    public function adminIndex()
    {
        $orders = Order::latest()->get();
        return view('admin.order', compact('orders'));
    }

    public function adminShow($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    public function adminProcess($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'paid']);

        return back()->with('success', 'Pesanan diproses.');
    }

    public function adminFinish($id)
    {
        DB::transaction(function () use ($id) {

            $order = Order::with('items.menu')->findOrFail($id);

            $history = History::create([
                'customer_name' => $order->customer_name,
                'meja'          => $order->meja,
                'total_harga'   => $order->total_harga,
                'finished_at'   => now(),
            ]);

            foreach ($order->items as $item) {
                HistoryItem::create([
                    'history_id'   => $history->id,
                    'menu_name'    => $item->menu->nama,
                    'quantity'     => $item->quantity,
                    'harga_satuan' => $item->harga_satuan,
                    'subtotal'     => $item->subtotal,
                ]);
            }

            $order->items()->delete();
            $order->delete();
        });

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Pesanan selesai & masuk riwayat.');
    }

    public function adminDelete($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'Pesanan dihapus.');
    }
}
