@extends('layouts.cuslayout')

@section('title', 'Tentang Kami - Cafe-in')

@section('content')

<!-- HERO SECTION -->
<section class="bg-amber-600 text-white py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">
            Cerita Kami
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto">
            Lebih dari sekadar warung kopi, kami adalah tempat di mana kenangan indah tercipta
        </p>
    </div>
</section>

<!-- OUR STORY -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                <img
                    src="{{ asset('images/logo.jpg') }}"
                    alt="logo"
                    class="rounded-lg shadow-lg w-full">
            </div>

            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">
                    Sejarah Cafe-in
                </h2>

                <p class="text-gray-600 mb-4">
                    Cafe-in didirikan pada tahun 2025 oleh Deni Prasetiyo, seorang pecinta kopi yang ingin
                    membawa pengalaman nongkrong ala warung kopi tradisional dengan sentuhan modern.
                    Berawal dari gerobak kecil di pinggir jalan, kini kami telah berkembang menjadi tempat
                    favorit masyarakat sekitar.
                </p>

                <p class="text-gray-600 mb-4">
                    Filosofi kami sederhana: kopi yang baik berasal dari biji yang baik, proses yang benar,
                    dan disajikan dengan hati. Kami memilih langsung biji kopi dari petani lokal untuk
                    mendukung perekonomian daerah.
                </p>

                <p class="text-gray-600">
                    Meski telah berkembang, semangat kekeluargaan dan kehangatan tetap menjadi jiwa utama
                    Cafe-in hingga hari ini.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- VALUES SECTION -->
<section class="py-16 bg-amber-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
            Nilai-Nilai Kami
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- VALUE 1 -->
            <div class="bg-white p-8 rounded-xl shadow-md text-center">
                <div class="bg-amber-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955
                              11.955 0 0112 2.944a11.955 11.955 0
                              01-8.618 3.04A12.02 12.02 0 003
                              9c0 5.591 3.824 10.29 9
                              11.622 5.176-1.332 9-6.03
                              9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-amber-800 mb-3">
                    Kualitas Premium
                </h3>
                <p class="text-gray-600">
                    Kami hanya menggunakan bahan terbaik dengan proses penyajian yang teliti
                    untuk menjaga konsistensi rasa.
                </p>
            </div>

            <!-- VALUE 2 -->
            <div class="bg-white p-8 rounded-xl shadow-md text-center">
                <div class="bg-amber-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17
                              20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7
                              20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0
                              0a5.002 5.002 0 019.288 0"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-amber-800 mb-3">
                    Kekeluargaan
                </h3>
                <p class="text-gray-600">
                    Setiap pelanggan kami perlakukan seperti keluarga dengan pelayanan
                    ramah dan suasana hangat.
                </p>
            </div>

            <!-- VALUE 3 -->
            <div class="bg-white p-8 rounded-xl shadow-md text-center">
                <div class="bg-amber-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2
                              2 0 01-2 2H5a2 2 0 01-2-2v-6a2
                              2 0 012-2m14 0V9a2 2 0 00-2-2M5
                              11V9a2 2 0 012-2"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-amber-800 mb-3">
                    Kebersihan
                </h3>
                <p class="text-gray-600">
                    Kebersihan tempat, peralatan, dan bahan adalah standar utama
                    yang selalu kami jaga.
                </p>
            </div>

        </div>
    </div>
</section>

@endsection
