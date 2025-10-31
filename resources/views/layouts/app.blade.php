<!DOCTYPE HTML>
<html>
  <head>
    <title>@yield('title', 'Hatoslottó beadandó')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('theme/assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('theme/assets/css/noscript.css') }}" /></noscript>
  </head>
  <body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Header -->
      <header id="header">
        <h1><a href="{{ url('/') }}">Hatoslottó</a></h1>
        <nav>
          <ul>
            <li><a href="{{ route('diagram') }}">Diagram</a></li>
          </ul>
        </nav>
      </header>

      <!-- Main -->
      <div id="main">
        @yield('content')
      </div>

      <!-- Footer -->
      <footer id="footer">
        <p class="copyright">&copy; 2025 Hatoslottó beadandó | Design: <a href="https://html5up.net">HTML5 UP</a></p>
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
