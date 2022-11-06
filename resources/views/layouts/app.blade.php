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
            <nav>
                
                <div class="navMenu mt-4">
                    <div class="navMenuLeft">
                        <a href="{{ url('/') }}"><img class="logo ms-5" src="{{ asset('assets/images/logo.png') }}" alt="logo spotizer"></a> 
                        {{-- <ul>
                            <li><a href="{{ route('titres.index') }}">Titres</a></li>
                            <li><a href="{{ route('albums.index') }}">Albums</a></li>
                            <li><a href="{{ route('artistes.index') }}">Artistes</a></li>
                            <li><a href="{{ route('groupes.index') }}">Groupes</a></li>
                            <li><a href="{{ route('genres.index') }}">Genres</a></li> 
                            <li><a href="">Playlists</a></li>
                        </ul> --}}
                    </div>

                    <div class="burger">
                        <input id="burger" type="checkbox" class="checkboxBurger" />
                        <label for="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>
                        <div class="navburger">    
                          <ul class="d-flex">
                            <li><a href="{{ route('titres.index') }}">Titres</a></li>
                            <li><a href="{{ route('albums.index') }}">Albums</a></li>
                            <li><a href="{{ route('artistes.index') }}">Artistes</a></li>
                            <li><a href="{{ route('groupes.index') }}">Groupes</a></li>
                            <li><a href="{{ route('genres.index') }}">Genres</a></li> 
                            {{-- <li><a href="">Playlists</a></li> --}}
                          </ul>  
                        </div>
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
                                        <a class="dropdown-item" href="{{ route('myAccount') }}">{{ __('Mon compte') }}</a>
    
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
            
            @endif

        <main class="py-4">
            {{-- barre de recherche --}}
            <div class="searchbar mb-5 d-flex justify-content-center">
                <form action="{{ route('search') }}" method="GET" class="d-flex gap-2">
                    <input type="search" class="form-control searchBarInput" name="search" placeholder="Chercher un titre, un artiste, un album, un groupe, ..." id="">
                    <input type="submit" class="form-control btn btn-outline-light" name="envoyer" value="Chercher" style="width: 100px">
                </form>
            </div>
            
            @yield('content')
        </main>
    </div>
    <div class="container">
        <footer class="py-3 my-4">
          <div class="social">
            <a href="https://www.instagram.com/nicolasreitin/" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="https://www.facebook.com/nicolas.reitin.3" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="https://www.linkedin.com/in/nicolasreitin/" target="_blank"><ion-icon name="logo-linkedin"></ion-icon></a>
            <a href="https://github.com/NicolasReitin" target="_blank"><ion-icon name="logo-github"></ion-icon></a>
          </div>
          {{-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" >Home</a></li> 
            <li class="nav-item"><a href="#" >Services</a></li>
            <li class="nav-item"><a href="#" >About</a></li>
            <li class="nav-item"><a href="#" >Terms</a></li>
            <li class="nav-item"><a href="#" >Privacy Policy</a></li>
          </ul> --}}
          <hr>
          <p class="text-center text-muted">&copy; 2022 Made by NR. All rights reserved.</p>
        </footer>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
