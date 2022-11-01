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
                            <li><a href="">Playlist</a></li>
                        </ul>
                    </div>
                    <div class="navMenuRight">
                        <ul>
                            @auth
                            <li><a href="{{ url('/home') }}">Accueil</a></li>
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
                <img src="{{ asset('assets/images/spotizer_accueil.jpg') }}" alt="fond_spotizer">
                <h5 class="mt-2">Le meilleur site de musique en ligne</h5>
            </div>

        </div>
    </body>
</html>
