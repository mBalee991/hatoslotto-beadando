<!DOCTYPE HTML>
<html lang="hu">
    <head>
        <title>{{ config('app.name', 'Hatoslottó Beadandó') }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

        <!-- Stellar CSS -->
        <link rel="stylesheet" href="{{ asset('theme/assets/css/main.css') }}" />
        <noscript><link rel="stylesheet" href="{{ asset('theme/assets/css/noscript.css') }}" /></noscript>

        <!-- Laravel Vite (Breeze-hez, ha használod) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="is-preload">
        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            <header id="header" class="alt">
                <span class="logo"><img src="{{ asset('theme/images/logo.svg') }}" alt="" /></span>
                <h1>Hatoslottó Beadandó</h1>
                <p>Laravel 12 + Stellar sablon</p>
            </header>

            <!-- Navigation -->
            <nav id="nav">
                <ul class="links">
                    <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Kezdőlap</a></li>

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li><a href="{{ route('admin') }}" class="{{ request()->is('admin') ? 'active' : '' }}">Admin</a></li>
                            <li><a href="{{ route('huzasok.index') }}" class="{{ request()->is('huzasok*') ? 'active' : '' }}">Húzások</a></li>
                        @endif

                        <li><a href="{{ route('diagram') }}" class="{{ request()->is('diagram') ? 'active' : '' }}">Diagram</a></li>
                        <li><a href="{{ route('contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Kapcsolat</a></li>
                        <li><a href="{{ route('messages') }}" class="{{ request()->is('messages') ? 'active' : '' }}">Üzenetek</a></li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form" style="margin: 0;">
                                @csrf
                                <a href="#" class="button primary small"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Kijelentkezés
                                </a>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
                        <li><a href="{{ route('register') }}">Regisztráció</a></li>
                    @endauth
                </ul>
            </nav>

            <!-- Main -->
            <div id="main">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer id="footer">
                <section>
                    <h2>Hatoslottó Laravel Projekt</h2>
                    <p>Webprogramozás 2 beadandó – Balázs & Tamás</p>
                </section>
                <p class="copyright">
                    &copy; {{ date('Y') }} Hatoslottó beadandó. Design: HTML5 UP (Stellar)
                </p>
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('theme/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('theme/assets/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ asset('theme/assets/js/jquery.scrolly.min.js') }}"></script>
        <script src="{{ asset('theme/assets/js/browser.min.js') }}"></script>
        <script src="{{ asset('theme/assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('theme/assets/js/util.js') }}"></script>
        <script src="{{ asset('theme/assets/js/main.js') }}"></script>
    </body>
</html>
