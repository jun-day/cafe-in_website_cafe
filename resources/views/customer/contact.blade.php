@extends('layouts.cuslayout')

@section('title', 'Kontak Kami')

@section('content')

<!-- CONTACT SECTION -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
            Hubungi Kami
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- FORM KONTAK -->
            <div>
                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-gray-700 mb-2">
                            Nama Anda
                        </label>
                        <input
                            type="text"
                            id="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                                   focus:outline-none focus:border-amber-500">
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 mb-2">
                            Email
                        </label>
                        <input
                            type="email"
                            id="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                                   focus:outline-none focus:border-amber-500">
                    </div>

                    <div>
                        <label for="message" class="block text-gray-700 mb-2">
                            Pesan
                        </label>
                        <textarea
                            id="message"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                                   focus:outline-none focus:border-amber-500"></textarea>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-amber-600 hover:bg-amber-700 text-white
                               font-bold py-3 px-4 rounded-lg
                               transition duration-300">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- INFO KONTAK & SOSIAL -->
            <div class="flex flex-col justify-between">

                <div>
                    <h3 class="text-xl font-semibold mb-4">
                        Kontak Langsung
                    </h3>

                    <p class="text-gray-600 flex items-center mb-4">
                        <svg class="w-5 h-5 text-amber-600 mr-3" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498
                                  4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042
                                  11.042 0 005.516 5.516l1.13-2.257a1 1 0
                                  011.21-.502l4.493 1.498a1 1 0 01.684.949V19
                                  a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        (021) 1234-5678
                    </p>

                    <p class="text-gray-600 flex items-center mb-4">
                        <svg class="w-5 h-5 text-amber-600 mr-3" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5
                                  19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2
                                  2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        info@cafe-in.com
                    </p>

                    <p class="text-gray-600 flex items-center">
                        <svg class="w-5 h-5 text-amber-600 mr-3" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0
                                  11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Setiap Hari 08.00 – 22.00
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
