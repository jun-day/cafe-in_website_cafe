@extends('layouts.adlayout')

@section('title', 'Daftar Order')

@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<!-- PAGE HEADER -->
<div class="admin-page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1">Daftar Pesanan</h3>
            <small class="text-muted">
                Kelola dan selesaikan pesanan pelanggan
            </small>
        </div>

        <a href="{{ route('admin.orders.history.export') }}"
           class="btn btn-success px-4 py-2 shadow-sm">
            Unduh History (Excel)
        </a>
    </div>
</div>

<!-- ALERT -->
@if (session('success'))
    <div class="alert alert-success shadow-sm mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- TABLE -->
<div class="card admin-card border-0 shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table admin-table table-hover mb-0 w-100">
                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th width="180">Nama</th>
                        <th width="120">Meja</th>
                        <th>Pesanan</th>
                        <th width="180">Total</th>
                        <th width="150">Status</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td class="text-center fw-semibold">
                                {{ $loop->iteration }}
                            </td>

                            <td class="fw-semibold">
                                {{ $order->customer_name }}
                            </td>

                            <td class="text-center">
                                {{ $order->meja }}
                            </td>

                            <td>
                                <ul class="mb-0 ps-3">
                                    @foreach ($order->items as $item)
                                        <li>
                                            {{ $item->menu->nama }}
                                            <span class="text-muted">
                                                ({{ $item->quantity }}x)
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="fw-semibold">
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </td>

                            <td class="text-center">
                                <span class="badge bg-warning text-dark px-3 py-2">
                                    {{ strtoupper($order->status) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <form action="{{ route('admin.orders.finish', $order->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Tandai pesanan ini sebagai selesai?')">
                                    @csrf
                                    <button class="btn btn-success btn-sm px-4">
                                        Selesai
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                Belum ada pesanan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
