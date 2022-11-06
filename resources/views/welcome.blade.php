<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <div>
            @if (Route::has('login'))
            <nav class="d-flex">
                
                <div class="navMenu mt-4">
                    <div class="navMenuLeft">
                        <a href=""><img class="logo ms-5" src="{{ asset('assets/images/logo.png') }}" alt="logo spotizer"></a> 
                        <ul>
                            <li><a href="{{ route('titres.index') }}">Titres</a></li>
                            <li><a href="{{ route('albums.index') }}">Albums</a></li>
                            <li><a href="{{ route('artistes.index') }}">Artistes</a></li>
                            <li><a href="{{ route('groupes.index') }}">Groupes</a></li>
                            <li><a href="{{ route('genres.index') }}">Genres</a></li> 
                            {{-- <li><a href="">Playlists</a></li> --}}
                        </ul>
                    </div>
                    <div class="navMenuRight">
                        <ul class="navbar-nav flex-row ms-auto">
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <li class="mt-2"><a href="{{ route('dashboard') }}">Dashboard Admin</a></li>
                                @endif
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
                            @else
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
        
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                            @endif
                        @endauth
                        </ul>
                    </div>
                </div>
                
                <div class="navbarWelcome hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    
                        
                    
                </div>
            </nav>
            
            @endif

            <div class="imageWelcome">
                <img src="{{ asset('assets/images/logo.png') }}" alt="fond_spotizer" style="width: 70%">
                <h1>SPOTIZER</h1>
                <h5 class="mt-5">Le meilleur site de musique en ligne</h5>
            </div>

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
