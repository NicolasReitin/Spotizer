@extends('layouts.appAdmin')

@section('content')
    <div class="main">
        <h1 class="text-center"><b>{{ ucfirst(Auth::user()->pseudo) }}</b></h1>
        <div class="myAccount">
            <div class="pseudo d-flex gap-5 mt-5">
                <h4><u><b>Pseudo</b></u> : {{ ucfirst(Auth::user()->pseudo) }} </h4>
            </div>
            <div class="mail d-flex gap-5 mt-5">
                <h4><u><b>Mail</b></u> : {{ Auth::user()->email }} </h4>
            </div>

            <div class="password mt-5">
                <h4><u><b>Mot de passe</b></u> : *****************</h4>
            </div>
            <div class="mt-5">
                <a href="{{ route('myAccount.edit', ['user' => Auth::user()]) }}"><button class="btn btn-warning ">Modifier les informations du compte</button></a>
            </div>
            @auth
                @if (Auth::user()->role !== 'admin')
                    <form action="{{ route('myAccount.delete', ['user' => Auth::user()]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes vous sûr de vouloir supprimer votre compte')" value="Supprimer mon compte">
                    </form>
                @endif
            @endauth 
        </div>
        
    </div>
@endsection   