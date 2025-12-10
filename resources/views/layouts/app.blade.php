<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio Saya')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            color: #eee;
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: #16213e;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        nav {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .logo span {
            color: #ffd700;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255,255,255,0.2);
        }

        .nav-links a.active {
            background-color: rgba(255,255,255,0.3);
        }

        .btn-logout {
            background: #e94560;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: #d13a54;
        }

        .logout-form {
            display: inline;
            margin: 0;
        }

        /* Main Content */
        main {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
            min-height: 60vh;
        }

        /* Footer */
        footer {
            background-color: #0f0f1a;
            color: #888;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            border-top: 1px solid #0f3460;
        }

        footer p {
            font-size: 14px;
        }

        /* Content Styles */
        .card {
            background: #16213e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            border: 1px solid #0f3460;
        }

        h1 {
            color: #e94560;
            margin-bottom: 20px;
        }

        h2 {
            color: #0f9b8e;
            margin-bottom: 15px;
        }

        p {
            margin-bottom: 15px;
        }

        .highlight {
            color: #e94560;
            font-weight: bold;
        }

        .skill-tag {
            display: inline-block;
            background: #0f3460;
            color: #0f9b8e;
            padding: 5px 15px;
            border-radius: 20px;
            margin: 5px;
            font-size: 14px;
            border: 1px solid #0f9b8e;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-item span {
            margin-left: 10px;
        }

        .profile-header {
            text-align: center;
            padding: 20px 0;
        }

        .profile-header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .profile-header p {
            color: #666;
            font-size: 18px;
        }

        .badge {
            display: inline-block;
            background: #0f3460;
            color: #e94560;
            padding: 3px 10px;
            border-radius: 5px;
            font-size: 12px;
            margin-left: 10px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e94560;
            margin-bottom: 20px;
        }

        .project-link {
            display: inline-block;
            background: #e94560;
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .project-link:hover {
            background: #0f9b8e;
            transform: scale(1.05);
        }

        a {
            color: #0f9b8e;
        }

        li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a href="{{ route('home') }}" class="logo">Fazli<span>Radika</span></a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                
                @auth
                    <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Produk</a></li>
                    <li><a href="{{ route('tokos.index') }}" class="{{ request()->routeIs('tokos.*') ? 'active' : '' }}">Toko</a></li>
                    <li><a href="{{ route('stoks.index') }}" class="{{ request()->routeIs('stoks.*') ? 'active' : '' }}">Stok</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="btn-logout">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Fazli Radika. Mahasiswa Teknologi Informasi | Tugas Online Web</p>
    </footer>
</body>
</html>
