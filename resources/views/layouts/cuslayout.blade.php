<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cafe-in')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-50 text-gray-800 font-[Poppins]">

    {{-- ===========================
        HEADER CUSTOMERS
    ============================ --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-6">
                <a href="{{ route('home') }}">
                    <span class="font-bold text-amber-800 text-3xl">Cafe-in</span>
                </a>

                <nav class="hidden md:flex items-center space-x-10 text-gray-700 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-amber-600">Beranda</a>
                    <a href="{{ route('menu') }}" class="hover:text-amber-600">Menu</a>
                    <a href="{{ route('about') }}" class="hover:text-amber-600">Tentang Kami</a>
                    <a href="{{ route('location') }}" class="hover:text-amber-600">Lokasi</a>
                    <a href="{{ route('contact') }}" class="hover:text-amber-600">Kontak</a>
                    <a href="{{ route('backend.login') }}" class="hover:text-amber-600">
                        Ruang Karyawan
                    </a>
                </nav>
            </div>
        </div>
    </header>

    {{-- ===========================
        CONTENT
    ============================ --}}
    <main class="min-h-[70vh]">
        @yield('content')
    </main>

    {{-- ===========================
        FOOTER
    ============================ --}}
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <span class="font-bold text-2xl text-amber-400">Cafe-in</span>
            <p class="mt-4 text-gray-400 text-sm">
                &copy; {{ date('Y') }} Cafe-in. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>
