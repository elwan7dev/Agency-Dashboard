<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/logo.png" >


    <title>{{ config('app.name', 'DigiSay') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootsrap Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- css - fontawesome ---}}
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    {{-- Custom checkbox style --}}
    <link href="{{ asset('css/icheck-bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    {{ config('app.name', 'DigiSay') }}
                  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            {{-- <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}<span class="sr-only">(current)</span></a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('clients.index') }}">{{ __('Clients') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('services.index') }}">{{ __('Services') }}</a>
                            </li>
                        </ul>
                    @endauth
                    

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
                                    {{ Auth::user()->username }} <span class="caret"></span>
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
            @include('inc.message')
            @yield('content-header')
            @yield('content')
        </main>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" defer></script>
    {{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}" defer></script>
    <!-- bootstrap Script -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Custom-js file --}}
    <script src="{{ asset('js/main.js') }}" defer></script>
    <!-- JS - font awesome -->
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
</body>
</html>
