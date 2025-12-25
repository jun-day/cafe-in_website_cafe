@extends('layouts.cuslayout')

@section('title', 'Lokasi')

@section('content')

<!-- LOCATION SECTION -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
            Lokasi Kami
        </h2>

        <div class="flex flex-col md:flex-row">
            <!-- INFO LOKASI -->
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h3 class="text-xl font-semibold mb-4">Alamat</h3>
                <p class="text-gray-600 mb-6">
                    UBSI Kaliabang<br>
                    Kec. Bekasi Utara, Kota Bekasi, Jawa Barat<br>
                    Jl. Kaliabang No.8, Perwira
                </p>

                <h3 class="text-xl font-semibold mb-4">Jam Operasional</h3>
                <div class="text-gray-600 space-y-1">
                    <div class="hours-item">Senin – Jumat: 08.00 – 22.00</div>
                    <div class="hours-item">Sabtu – Minggu: 07.00 – 23.00</div>
                </div>
            </div>

            <!-- GAMBAR LOKASI -->
            <div class="md:w-1/2">
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgqGbjmfS8tzTk4JTmmnCwVZEW0LD-hmmczQ&s="
                        alt="Peta lokasi Cafe-in"
                        class="w-full h-64 object-cover rounded"
                    >
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FLOATING BUTTON -->
<div class="fixed bottom-8 right-8">
    <a href="{{ route('contact') }}"
       class="floating-button bg-green-500 hover:bg-green-600 text-white
              w-14 h-14 rounded-full flex items-center justify-center
              shadow-lg transition duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502
                  1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0
                  011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1
                  C9.716 21 3 14.284 3 6V5z" />
        </svg>
    </a>
</div>

@endsection
