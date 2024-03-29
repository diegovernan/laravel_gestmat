<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'GestMat') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('home') }}">{{ config('app.name', 'GestMat') }}</a>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
            <div class="d-flex mx-2">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('login') }}">Acessar</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('register') }}">Registrar-se</a>
                </li>
                @endif
            </div>
            @else
            <div class="d-flex mx-2">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </div>
            @endguest
        </ul>
    </nav>

    <div class="container-fluid">
        @auth
        <div class="row pt-5">
            @include('layouts.sidebar')

            <main class="col-md-10 ml-sm-auto col-sm-9 px-4 main d-print-block">
                @yield('content')
            </main>
        </div>

        <div class="text-right border-top signature d-print-none">
            <span>Por <a href="http://www.diegovernan.com.br" target="_blank" class="text-primary">Diego Vernan</a></span>
        </div>
        @else
        <div class="pt-5">
            <main class="pt-5 home">
                @yield('content')
            </main>
        </div>
        @endauth
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    @yield('chartjs')
</body>

</html>