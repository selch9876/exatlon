<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('images/logo-deneme.png') }}" alt="" style="max-width: 150px;">  
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Exatlon Stats') }}
                </a>
                <a class="navbar-brand" href="{{ url('/index') }}">
                    Contestants 
                </a>
                <a class="navbar-brand" href="{{ url('/importExportView') }}">
                    Import-Export File
                </a>
                @if (!Auth::guest())
                <a class="navbar-brand" href="{{ url('/create') }}">
                    Add Contestant
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="section footer-classic" style="background: #227DC7; bottom: 0; width: 100%;">
            <div class="container">
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-4">
                  <h5 style="color: white">Exatlon Links</h5>
                  <ul class="nav-list" style="color: wheat">
                    <li><a href="https://www.exathlon.tv/" target="_blank">Global Site</a></li>
                    <li><a href="https://www.exatlon.com/" target="_blank">Estados Unidos</a></li>
                    <li><a href="https://www.exatlon.com.mx/" target="_blank">Mexico</a></li>
                  </ul>
                </div>
              </div>
              <div class="row-md-8">
                <div class="col-md-6">
                    <p>Copyright © <?php echo date("Y"); ?> Selçuk Oktay</p>
                </div>
             </div>
            </div>
          </footer>
    </div>
    
</body>
</html>
