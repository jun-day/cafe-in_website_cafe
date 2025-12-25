@extends('layouts.adlayout')

@section('title', 'Tambah Menu')

@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<div class="admin-page-header mb-4">
    <h3 class="fw-bold">Tambah Menu</h3>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card admin-card shadow-sm border-0">
    <div class="card-body">

        <form action="{{ route('admin.menu.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Menu</label>
                <input type="text" name="nama"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="3"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Harga</label>
                    <input type="text" id="harga"
                           class="form-control"
                           required>
                    <input type="hidden" name="harga" id="harga_real">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori"
                            class="form-select"
                            required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="cemilan">Cemilan</option>
                        <option value="penutup">Penutup</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Gambar Menu</label>
                <input type="file" name="gambar"
                       class="form-control"
                       required>
            </div>

            <div class="text-end">
                <button class="btn btn-warning px-4">
                    Simpan Menu
                </button>
            </div>

        </form>

    </div>
</div>

<script>
const hargaInput = document.getElementById('harga');
const hargaReal = document.getElementById('harga_real');

hargaInput.addEventListener('input', function () {
    let value = this.value.replace(/\D/g, '');
    hargaReal.value = value;
    this.value = value
        ? new Intl.NumberFormat('id-ID').format(value)
        : '';
});
</script>

@endsection
