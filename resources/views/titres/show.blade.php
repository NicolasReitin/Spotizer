@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 50px"><b>{{ $titre->titre }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            

            <div class="d-flex justify-content-center mb-5">
                <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                <audio class="audioPlay" hidden="false" controls preload="none" style="background-color: whitesmoke">
                    <source src="{{ asset('storage/'.$titre->filepath) }}">
                </audio>
            </div>
            
            @auth
                @if (Auth::user()->role === 'admin')
                    <div class="boutonCentral mt-2 gap-4">
                        <a href="{{ route('titres.edit', ['titre' => $titre]) }}"><button class="btn btn-outline-light ">Modifier</button></a>
                        <form action="{{ route('titres.delete', ['titre' => $titre]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')" value="Supprimer">
                            {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')">Supprimer</button></a> --}}
                        </form>
                    </div>
                @endif
            @endauth 
            
            

            <div class="boutonCentral mt-2">
                <a href="{{ route('titres.index') }}"><button class="btn btn-outline-warning ">Retour aux titres</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>

@endsection