@extends('layouts.appAdmin')

@section('content')
    <div class="main">
        <div class="titre">
            <h1><b>Modification de votre compte {{ ucfirst(Auth::user()->pseudo) }}</b></h1>
        </div>
        <div class="mt-5 ms-5 d-flex justify-content-center">
            <form action="{{ route('myAccount.update', ['user' => $user]) }}" method="POST" style="width: 100%" class="d-flex flex-column align-items-center">
                @method('PUT')
                @csrf
                <div>
                    <h3 class="text-center">Pseudo</h3>
                    <input type="text" name="pseudo" class="form-control @error('pseudo') is-invalid @enderror" style="width: 400px" value="{{ $user->pseudo }}">
                    @error('pseudo')
                        <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <h3 class="text-center">Email</h3>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" style="width: 400px" value="{{ $user->email }}">
                    @error('email')
                        <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <h3 class="text-center">Mot de passe</h3>
                    <input type="text" name="password" id="password" class="form-control" style="width: 400px" placeholder="**********">
                </div>
                <div class="mt-3">
                    <h3 class="text-center">Confirmer le Mot de passe</h3>
                    <input type="text" name="password_confirmation"  class="form-control @error('password') is-invalid @enderror" style="width: 400px" placeholder="**********">
                    @error('password')
                        <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Enregistrer les modifications" >
            </form>
        </div>
    </div>
@endsection   