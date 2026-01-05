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

                {{-- Mobile menu button --}}
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button outline-none">
                        <svg class="w-6 h-6 text-gray-700" fill="none"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Dropdown --}}
        <div class="hidden mobile-menu">
            <ul class="bg-white border-t">
                <li><a href="{{ route('home') }}" class="block px-4 py-2 text-sm">Beranda</a></li>
                <li><a href="{{ route('menu') }}" class="block px-4 py-2 text-sm">Menu</a></li>
                <li><a href="{{ route('about') }}" class="block px-4 py-2 text-sm">Tentang Kami</a></li>
                <li><a href="{{ route('location') }}" class="block px-4 py-2 text-sm">Lokasi</a></li>
                <li><a href="{{ route('contact') }}" class="block px-4 py-2 text-sm">Kontak</a></li>
            </ul>
        </div>
    </header>

    {{-- Mobile menu toggle --}}
    <script>
        const btn = document.querySelector(".mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>

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
