@extends('layouts.adlayout')

@section('title', 'Daftar Menu')

@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<!-- PAGE HEADER -->
<div class="admin-page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1">Daftar Menu</h3>
            <small class="text-muted">
                Kelola daftar menu yang tersedia di Cafe-in
            </small>
        </div>

        <a href="{{ route('admin.menu.create') }}"
           class="btn btn-warning px-4 py-2 shadow-sm">
            + Tambah Menu
        </a>
    </div>
</div>

<!-- ALERT -->
@if (session('success'))
    <div class="alert alert-success shadow-sm mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- TABLE CARD -->
<div class="card admin-card admin-table-card border-0 shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">

                <thead>
                    <tr>
                        <th style="width:80px">No</th>
                        <th style="width:150px">Gambar</th>
                        <th>Nama Menu</th>
                        <th style="width:160px">Kategori</th>
                        <th style="width:180px">Harga</th>
                        <th style="width:220px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($menus as $menu)
                        <tr>

                            <!-- NO -->
                            <td class="text-center fw-semibold">
                                {{ $loop->iteration }}
                            </td>

                            <!-- GAMBAR -->
                            <td class="text-center">
                                @if ($menu->gambar)
                                    <img src="{{ asset('uploads/menu/' . $menu->gambar) }}"
                                         width="100"
                                         height="100"
                                         class="rounded"
                                         style="object-fit:cover;">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>

                            <!-- NAMA -->
                            <td class="fw-semibold">
                                {{ $menu->nama }}
                            </td>

                            <!-- KATEGORI -->
                            <td class="text-center">
                                <span class="badge bg-secondary px-3 py-2">
                                    {{ ucfirst($menu->kategori) }}
                                </span>
                            </td>

                            <!-- HARGA -->
                            <td class="fw-semibold">
                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                            </td>

                            <!-- AKSI -->
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('admin.menu.edit', $menu->id) }}"
                                       class="btn btn-success btn-sm px-4">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.menu.destroy', $menu->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus menu ini?');">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm px-4">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="text-center text-muted py-5">
                                Data menu belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection
