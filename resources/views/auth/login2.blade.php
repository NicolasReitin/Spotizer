@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="blocLogin"> 
                <a href="../index.php"><img class="logoLogin" src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                <div class="connexion mt-5">
                    <h2 style="text-align: center">Déjà inscrit ?</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="formmulaire mt-4">
                            <label class="d-flex justify-content-center" for="email">{{ __('Adresse Email') }}</label>
                            <div class="mail">
                                <img class="icon" src="{{ asset('assets/icones/enveloppe.png') }}" alt="">
                                <input id="email" type="email" class="form-control inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label class="d-flex justify-content-center" for="password">{{ __('Mot de passe') }}</label>
                            <div class="password">
                                <img class="icon" src="{{ asset('assets/icones/cadenas.png') }}" alt="">
                                <input id="password" type="password" class="form-control inputLogin @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label " for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>

                            <div class="d-flex justify-content-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: whitesmoke">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
                            </div>
                        </div>                        
                    </form>
                </div>
                <hr>
                <div class="newClient">
                    <h2>Nouvel utilisateur ?</h2>
                    <a href="" class="btn btn-outline-warning d-flex justify-content-center">Créer un compte</a>
                </div>
            </div>
        </div>
    </div>
@endsection
