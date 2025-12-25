<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Menu - Cafe-in</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- Global CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-50 text-gray-800 font-[Poppins]">

{{-- ===========================
    HEADER MENU 
============================ --}}
<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">

            <a href="{{ route('home') }}">
                <span class="font-bold text-amber-800 text-3xl">Cafe-in</span>
            </a>

            <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium">

                <a href="{{ route('home') }}" class="hover:text-amber-600">Beranda</a>
                <a href="{{ route('menu') }}" class="text-amber-600 font-semibold">Menu</a>
                <a href="{{ route('about') }}" class="hover:text-amber-600">Tentang Kami</a>
                <a href="{{ route('location') }}" class="hover:text-amber-600">Lokasi</a>
                <a href="{{ route('contact') }}" class="hover:text-amber-600">Kontak</a>

                {{-- CART BUTTON (WAJIB UNTUK JS) --}}
                <button id="cartButton"
                        class="relative p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                    🛒
                    <span id="cartCount"
                          class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        0
                    </span>
                </button>
            </nav>

        </div>
    </div>
</header>

{{-- ===========================
    CART DROPDOWN
============================ --}}
<div id="cartDropdown"
     class="hidden absolute right-4 top-20 w-72 bg-white rounded-md shadow-lg z-[9999] border">

    <div class="p-4 border-b">
        <h3 class="text-lg font-semibold">Keranjang Belanja</h3>
    </div>

    <div class="p-4 space-y-3">

        <div>
            <label class="text-sm font-medium">Nama Pemesan</label>
            <input type="text" id="customerName" class="w-full rounded border-gray-300">
        </div>

        <div>
            <label class="text-sm font-medium">Nomor Meja</label>
            <input type="number" id="tableNumber" class="w-full rounded border-gray-300">
        </div>

        <div>
            <label class="text-sm font-medium">Metode Pembayaran</label>
            <select id="paymentMethod" class="w-full rounded border-gray-300">
                <option value="tunai">Tunai</option>
                <option value="qris">QRIS</option>
            </select>

            <div id="qrisContainer" class="hidden text-center mt-2">
                <img src="{{ asset('images/qris.jpeg') }}" 
                    width="120" 
                    class="mx-auto"
                    alt="QRIS Code">
            </div>
        </div>

        <div id="cartItems">
            <p class="text-gray-500 text-center">Keranjang kosong</p>
        </div>

        <div id="cartTotal" class="pt-4 border-t">
            <div class="flex justify-between font-semibold">
                <span>Total:</span>
                <span id="totalPrice">Rp0</span>
            </div>

            <div class="mt-3">
                <label class="text-sm font-medium">Jumlah Pembayaran</label>
                <input type="number" id="amountPaid" class="w-full rounded border-gray-300">
                <div class="flex justify-between text-sm mt-2">
                    <span>Kembalian:</span>
                    <span id="changeAmount">Rp0</span>
                </div>
            </div>

            <button id="checkoutButton"
                    class="w-full mt-4 bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
                Pesan Sekarang
            </button>
        </div>

    </div>
</div>

{{-- ===========================
    FILTER + MENU LIST
============================ --}}
<main class="max-w-6xl mx-auto px-4 py-8">

    <div class="flex gap-4 mb-6 overflow-x-auto">
        <button class="category-btn active-category" data-category="all">Semua</button>
        <button class="category-btn" data-category="makanan">Makanan</button>
        <button class="category-btn" data-category="minuman">Minuman</button>
        <button class="category-btn" data-category="cemilan">Cemilan</button>
        <button class="category-btn" data-category="penutup">Penutup</button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach ($menus as $item)
            <div class="menu-item bg-white rounded shadow"
                 data-category="{{ strtolower($item->kategori) }}">

                <img src="{{ asset('uploads/menu/' . $item->gambar) }}"
                     class="h-48 w-full object-cover">

                <div class="p-4">
                    <h3 class="font-bold">{{ $item->nama }}</h3>
                    <p class="text-sm text-gray-600">{{ $item->deskripsi }}</p>

                    <div class="flex justify-between items-center mt-2">
                        <span class="font-bold text-yellow-600">
                            Rp{{ number_format($item->harga,0,',','.') }}
                        </span>

                        <button class="add-to-cart bg-yellow-500 text-white px-3 py-1 rounded text-sm"
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->nama }}"
                                data-price="{{ $item->harga }}">
                            + Keranjang
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</main>

{{-- ===========================
    FOOTER
============================ --}}
<footer class="bg-gray-800 text-white py-8 mt-10">
    <div class="text-center">
        <span class="font-bold text-amber-400 text-2xl">Cafe-in</span>
        <p class="text-gray-400 text-sm mt-2">
            &copy; {{ date('Y') }} Cafe-in
        </p>
    </div>
</footer>

<!-- INVOICE MODAL -->
<div id="invoiceModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white w-96 p-6 rounded shadow-lg relative">
        <button id="closeInvoice" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">&times;</button>
        <h2 class="text-xl font-semibold mb-4">Struk Pesanan</h2>
        <div id="invoiceContent">
            <!-- Detail pesanan akan masuk di sini -->
        </div>
        <button id="printInvoice" class="mt-4 w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
            Print Struk
        </button>
    </div>
</div>

<script src="{{ asset('js/menu.js') }}"></script>

</body>
</html>
