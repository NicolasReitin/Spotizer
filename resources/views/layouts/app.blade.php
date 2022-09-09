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
    @vite(['resources/sass/app.scss','resources/sass/login.scss', 'resources/js/app.js'])
</head>
<body>
    <div>
        
        @if (Route::has('login'))
            <nav class="d-flex">
                
                <div class="navMenu">
                    <div class="navMenuLeft">
                        <a href="{{ route('home') }}"><img class="logo ms-5" src="{{ asset('assets/images/logo.png') }}" alt="logo spotizer"></a> 
                        <ul>
                            <li><a href="">Groupes</a></li>
                            <li><a href="">Albums</a></li>
                            <li><a href="">Artistes</a></li>
                            <li><a href="">Playlist</a></li>
                        </ul>
                    </div>
                    <div class="navMenuRight">
                        <ul>
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
