<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cafe-in Admin')</title>

    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- Global CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-50 text-gray-800 font-[Poppins]">

    {{-- ===========================
        HEADER ADMIN
    ============================ --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('admin.menu.index') }}" class="text-decoration-none">
                    <span class="font-bold text-amber-800 text-3xl">Cafe-in Admin</span>
                </a>

                <nav class="hidden md:flex items-center space-x-10 text-gray-700 font-medium">
                    <a class="hover:text-amber-600" href="{{ route('admin.menu.index') }}" style="text-decoration: none;">Menu</a>
                    <a class="hover:text-amber-600" href="{{ route('admin.orders.index') }}" style="text-decoration: none;">Order</a>

                    <form action="{{ route('backend.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-600">
                            Logout
                        </button>
                    </form>
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
                <li><a href="{{ route('admin.menu.index') }}" class="block px-4 py-2 text-sm">Menu</a></li>
                <li><a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 text-sm">Order</a></li>
                <li>
                    <form action="{{ route('backend.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600">
                            Logout
                        </button>
                    </form>
                </li>
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
    <main class="min-h-[70vh] max-w-6xl mx-auto px-4 py-6">
        @yield('content')
    </main>

    {{-- ===========================
        FOOTER
    ============================ --}}
    <footer class="bg-gray-800 text-white py-10">
        <div class="text-center text-sm text-gray-400">
            &copy; {{ date('Y') }} Cafe-in Admin Panel
        </div>
    </footer>

</body>
</html>