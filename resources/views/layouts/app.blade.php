<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <!-- TON HEADER SOMBRE -->
    <header class="header">

        <!-- Niveau 1 -->
        <div class="header-top">
            @php
                $cart = session()->get('cart', []);
                $count = array_sum(array_column($cart, 'quantity'));
            @endphp

            <a href="{{ route('cart.index') }}" style="position:relative; margin-left:20px; color: {{ request()->routeIs('about') ? '#4CAF50' : '#fff' }};">
                <i class="fa-solid fa-cart-shopping" style="font-size:20px;"></i>

                @if($count > 0)
                    <span style="
                        position:absolute;
                        top:-8px;
                        right:-10px;
                        background:#4CAF50;
                        color:white;
                        padding:2px 6px;
                        font-size:12px;
                        border-radius:50%;
                    ">
                        {{ $count }}
                    </span>
                @endif
            </a>

            <div class="logo">
                <a href="{{ url('/') }}" style="color: {{ request()->routeIs('/') ? '#4CAF50' : '#777' }};">
                    <img src="https://lavipnoir.com/wp-content/uploads/2025/12/ChatGPT-Image-May-7_-2025_-12_20_27-PM-Photoroom-120x120.png" alt="" >
                </a>
            </div>

            <div class="admin">
                <a href="{{ route('admin.dashboard') }}" class="admin" >
                    <i class="fa-solid fa-user-gear"></i>
                </a>
            </div>
        </div>

        <!-- Niveau 2 -->
        <nav class="header-nav">
            <a href="/menu">Menu</a>
            <a href="/about">About Us</a>
            <a href="/how-to-order">How to Order</a>
            <a href="/verify">Verify</a>
        </nav>

        <button id="hamburger">
            ☰
        </button>

    </header>

    <div id="mobile-menu"
        style="position:fixed; top:0; right:-260px; width:260px; height:100vh; background:#212121; padding:40px 20px;
                display:flex; flex-direction:column; gap:25px; transition:0.3s; z-index:9999;">

        <button id="close-menu"
                style="font-size:26px; background:none; border:none; color:white; cursor:pointer; align-self:flex-end;">
            ✕
        </button>

        <a href="/menu">Menu</a>
        <a href="/about">About Us</a>
        <a href="/how-to-order">How to Order</a>
        <a href="/verify">Verify</a>
    </div>

    <!-- CONTENU DES PAGES -->
    <main>
        {{ $slot }}
    </main>

    <!-- TON FOOTER SOMBRE -->
    <footer class="footer">

        <!-- Niveau 1 -->
        <div class="footer-icons">
            <a href="#"><i class="fa-brands fa-telegram"></i></a>
            <a href="#"><i aria-hidden="true" class="fab fa-rocketchat"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>

        <div class="traits"></div>

        <!-- Niveau 2 -->
        <div class="footer-bottom">
            <span>© 2026 My Shop</span>
            <span>All rights reserved</span>
        </div>

    </footer>

    <!-- CSS -->
    <style>
        body {
            background: #111;
            color: #eee;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
        }

        /* HEADER */
        .header {
            width: 100%;
            /* background: #1a1a1a; */
            padding-bottom: 10px;
            /* box-shadow: 0 3px 10px rgba(0,0,0,0.4); */
        }

        .header-top {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 25px;
            padding: 15px 0;
        }

        .header-top .logo {
            width: 120px;
        }

        .header-top .logo a img {
           color: #fff;
           width: 100%;
            /* min-width: 150px; */
           filter: invert(1) brightness(2);
        }

        .header-top .logo a:hover img {
           color: #fff;
           width: 100%;
           filter: invert(1) brightness(1.5);
        }

        .cart, .admin {
            position: relative;
            font-size: 22px;
            color: #fff;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -12px;
            background: #e63946;
            color: #fff;
            padding: 2px 6px;
            border-radius: 50%;
            font-size: 12px;
        }

        .header-nav {
            display: flex;
            justify-content: center;
            gap: 50px;
            padding: 10px 0;
        }

        .header-nav a {
            color: #ddd;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: 0.2s;
            text-transform: uppercase;
        }

        .header-nav a:hover {
            color: #777;
        }

        /* FOOTER */
        .footer {
            background: #111;
            padding: 25px 0;
            margin-top: 40px;
            text-align: center;
            color: #ccc;
            position: relative;
            bottom: 0px;
        }

        .footer .traits {
            width: 100%;
            height: 0.5px;
            background: #cccccc2f;
            margin: 0 auto 20px auto;
        }

        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .footer-icons a {
            color: #111;
            font-size: 24px;
            transition: 0.2s;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
            border-radius: 10px;
            background-color:rgb(255,255,255);
        }

        .footer-icons a:hover {
            color: #4CAF50;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            padding: 0 40px;
            font-size: 14px;
            color: #777;
        }



        .nav-link {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-link:hover {
            color: #4CAF50;
        }

        .mobile-link {
            color: white;
            text-decoration: none;
            font-size: 20px;
        }

        .mobile-link:hover {
            color: #4CAF50;
        }

        #hamburger {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 26px;
            cursor: pointer;
            position: absolute;
            left: 20px;
            top: 30px;
        }

        @media (max-width: 768px) {
            .desktop-menu {
                display: none;
            }

            #hamburger {
                display: block;
            }

            .header-nav {
                display: none;
            }

            .header-top {
                gap: 15px;
                padding: 10px 0;
            }

            .header-top .logo {
                width: 80px;
            }

            .cart, .admin {
                font-size: 18px;
            }

            .footer-bottom {
                flex-direction: column;
                padding: 0 20px;
                gap: 10px;
            }

            .footer-icons {
                gap: 15px;
            }

            .footer-icons a {
                height: 40px;
                width: 40px;
                line-height: 40px;
                font-size: 18px;
            }
        }
    </style>


    <script>
        document.getElementById('hamburger').addEventListener('click', function () {
            document.getElementById('mobile-menu').style.right = '0';
        });

        document.getElementById('close-menu').addEventListener('click', function () {
            document.getElementById('mobile-menu').style.right = '-260px';
        });
    </script>

</body>
</html>