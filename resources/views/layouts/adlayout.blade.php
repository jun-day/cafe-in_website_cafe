<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cafe-in Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light text-dark" style="font-family: 'Poppins', sans-serif;">

    {{-- ===========================
        HEADER ADMIN
    ============================ --}}
    <header class="admin-navbar sticky-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <a href="{{ route('admin.menu.index') }}" class="text-decoration-none">
                    <span class="fw-bold fs-3" style="color: #92400e;">Cafe-in Admin</span>
                </a>

                <nav class="d-none d-md-flex align-items-center gap-4">
                    <a class="admin-nav-link" href="{{ route('admin.menu.index') }}">Menu</a>
                    <a class="admin-nav-link" href="{{ route('admin.orders.index') }}">Order</a>

                    <form action="{{ route('backend.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link admin-nav-link text-danger p-0">
                            Logout
                        </button>
                    </form>
                </nav>

                {{-- Mobile menu button --}}
                <div class="d-md-none">
                    <button class="btn mobile-menu-button" type="button">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Dropdown --}}
        <div class="mobile-menu d-none">
            <ul class="list-unstyled bg-white border-top mb-0">
                <li><a href="{{ route('admin.menu.index') }}" class="d-block px-3 py-2 small">Menu</a></li>
                <li><a href="{{ route('admin.orders.index') }}" class="d-block px-3 py-2 small">Order</a></li>
                <li>
                    <form action="{{ route('backend.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger w-100 text-start px-3 py-2 small text-decoration-none">
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
            menu.classList.toggle("d-none");
        });
    </script>

    {{-- ===========================
        CONTENT
    ============================ --}}
    <main class="container py-4" style="min-height: 70vh;">
        @yield('content')
    </main>

    {{-- ===========================
        FOOTER
    ============================ --}}
    <footer class="bg-dark text-white py-5">
        <div class="text-center small text-secondary">
            &copy; {{ date('Y') }} Cafe-in Admin Panel
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>