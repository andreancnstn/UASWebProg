<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="p-2" style="background-color: lightgrey;">
            <div class="d-flex align-items-center justify-content-sm-center">
                <p style="font-size: 40pt">Wonderful Journey</p>
            </div>
            <div class="d-flex align-items-center justify-content-sm-center">
                <p style="font-size: 20pt">Blog of Indonesia Tourism</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('home*') ? 'active' : ''}}">
                        <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home pr-2"></i><span>Home</span></a>
                    </li>
                    @guest
                    <li class="nav-item dropdown {{ request()->is('category*') ? 'active' : ''}}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (App\Category::all() as $c)
                                <a class="dropdown-item" href="{{ route('article.perCat', $c->id) }}">{{ $c->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is('aboutus*') ? 'active' : ''}}">
                        <a href="{{ route('aboutus') }}" class="nav-link">About Us</a>
                    </li>
                    @else
                        @if (Auth::user()->role == 'Admin')
                            <li class="nav-item {{ request()->is('allblog*') ? 'active' : ''}}">
                                <a href={{ route('allblog') }} class="nav-link">Admin</a>
                            </li>
                            <li class="nav-item {{ request()->is('view_user*') ? 'active' : ''}}">
                                <a href={{ route('view_user') }} class="nav-link">User</a>
                            </li>
                        @else
                            <li class="nav-item {{ request()->is('profile*') ? 'active' : ''}}">
                                <a href={{ route('profile') }} class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item {{ request()->is('blog*') ? 'active' : ''}}">
                                <a href={{ route('blog') }} class="nav-link">Blog</a>
                            </li>
                        @endif
                    @endguest
                </ul>
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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    </div>
</body>
</html>
