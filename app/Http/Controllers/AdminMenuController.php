<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Helpers\ImageHelper;

class AdminMenuController extends Controller
{
    /**
     * ============================
     * LIST MENU (ADMIN DASHBOARD)
     * ============================
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'DESC')->get();

        return view('admin.index', compact('menus'));
    }

    /**
     * ============================
     * FORM TAMBAH MENU
     * ============================
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * ============================
     * SIMPAN MENU BARU
     * ============================
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga'     => 'required|numeric',
            'kategori'  => 'required|in:makanan,minuman,cemilan,penutup',
            'gambar'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('gambar')) {
            $file      = $request->file('gambar');
            $directory = 'uploads/menu';
            $filename  = time() . '_' . $file->getClientOriginalName();

            ImageHelper::uploadAndResize(
                $file,
                $directory,
                $filename,
                385,
                400
            );
        }

        Menu::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'kategori'  => $request->kategori,
            'gambar'    => $filename,
        ]);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * ============================
     * FORM EDIT MENU
     * ============================
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return view('admin.edit', compact('menu'));
    }

    /**
     * ============================
     * UPDATE MENU
     * ============================
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga'     => 'required|numeric',
            'kategori'  => 'required|in:makanan,minuman,cemilan,penutup',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $menu = Menu::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $file      = $request->file('gambar');
            $directory = 'uploads/menu';
            $filename  = time() . '_' . $file->getClientOriginalName();

            ImageHelper::uploadAndResize(
                $file,
                $directory,
                $filename,
                385,
                400
            );

            $menu->gambar = $filename;
        }

        $menu->update([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'kategori'  => $request->kategori,
        ]);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * ============================
     * HAPUS MENU
     * ============================
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
