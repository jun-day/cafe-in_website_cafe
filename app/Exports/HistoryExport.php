<?php

namespace App\Exports;

use App\Models\History;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoryExport implements FromCollection
{
    public function collection()
    {
        return History::with('items')->get()->flatMap(function ($history) {
            return $history->items->map(function ($item) use ($history) {
                return [
                    'ID History'     => $history->id,
                    'Customer'       => $history->customer_name,
                    'Meja'           => $history->meja,
                    'Menu'           => $item->menu_name,
                    'Qty'            => $item->quantity,
                    'Harga Satuan'   => $item->harga_satuan,
                    'Subtotal'       => $item->subtotal,
                    'Total Order'    => $history->total_harga,
                    'Waktu Selesai'  => $history->finished_at,
                ];
            });
        });
    }

    public function headings(): array
    {
        return [
            'ID History',
            'Customer',
            'Meja',
            'Menu',
            'Qty',
            'Harga Satuan',
            'Subtotal',
            'Total Order',
            'Waktu Selesai',
        ];
    }
}
