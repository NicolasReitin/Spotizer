<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div>
        
        @if (Route::has('login'))
            <nav class="d-flex">
                
                <div class="navMenu mt-4">
                    <div class="navMenuLeft">
                        <a href="{{ url('/') }}"><img class="logo ms-5" src="{{ asset('assets/images/logo.png') }}" alt="logo spotizer"></a> 
                        <ul>
                            <li><a href="{{ route('titres.index') }}">Titres</a></li>
                            <li><a href="{{ route('groupes.index') }}">Groupes</a></li>
                            <li><a href="{{ route('albums.index') }}">Albums</a></li>
                            <li><a href="{{ route('artistes.index') }}">Artistes</a></li>
                            <li><a href="{{ route('genres.index') }}">Genres</a></li> 
                            <li><a href="">Playlist</a></li>
                        </ul>
                    </div>

                    <div class="navMenuRight">
                        <ul class="navbar-nav flex-row ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
    
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                @auth
                                    @if (Auth::user()->role === 'admin')
                                        <li class="mt-2"><a href="{{ route('dashboard') }}">Dashboard Admin</a></li>
                                    @endif
                                @endauth 
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{--  --}}
                                        {{ ucfirst(Auth::user()->pseudo) }} {{-- ucfirst = Make a string's first character uppercase  --}}

                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="">{{ __('Mon compte') }}</a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                
                <div class="navbarWelcome hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    
                        
                    
                </div>
            </nav>
            
            @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
