@extends('layouts.cuslayout')

@section('title', 'Beranda')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section flex items-center justify-center text-center px-4">
    <div>
        <h1 class="text-white text-4xl md:text-6xl font-bold mb-6">
            Nongkrong Asyik di Cafe-in
        </h1>
        <p class="text-white text-xl md:text-2xl mb-8">
            Kopi nikmat, suasana nyaman, harga terjangkau
        </p>
        <a href="{{ route('menu') }}"
           class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 inline-block">
            Lihat Menu
        </a>
    </div>
</section>

<!-- FEATURES SECTION -->
<section class="py-12 grid md:grid-cols-3 gap-8 text-center max-w-6xl mx-auto px-4">
    <div class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-amber-600 mb-2">Tempat Nyaman</h3>
        <p class="text-gray-600">
            Suasana cozy untuk kerja, nongkrong, dan bersantai.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-amber-600 mb-2">Menu Bervariasi</h3>
        <p class="text-gray-600">
            Aneka kopi, minuman segar, makanan ringan & berat.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-amber-600 mb-2">Harga Terjangkau</h3>
        <p class="text-gray-600">
            Nikmati menu favoritmu dengan harga ramah kantong.
        </p>
    </div>
</section>

<!-- TESTIMONI SECTION -->
<section class="py-16 bg-amber-50">
    <h2 class="text-3xl font-bold text-center text-amber-600 mb-8">
        Testimoni Pengunjung
    </h2>

    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">
        <div class="bg-white shadow rounded-xl p-6">
            <h4 class="font-bold mb-1">Budi</h4>
            <p class="text-amber-600 text-sm mb-2">Pelanggan</p>
            <p class="text-gray-600">
                "Tempatnya nyaman banget buat nugas!"
            </p>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <h4 class="font-bold mb-1">Rina</h4>
            <p class="text-amber-600 text-sm mb-2">Pelanggan</p>
            <p class="text-gray-600">
                "Kopinya enak, harganya bersahabat."
            </p>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <h4 class="font-bold mb-1">Andi</h4>
            <p class="text-amber-600 text-sm mb-2">Pelanggan</p>
            <p class="text-gray-600">
                "Rekomendasi buat nongkrong bareng teman."
            </p>
        </div>
    </div>
</section>

@endsection
