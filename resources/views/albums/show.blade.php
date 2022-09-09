@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 50px"><b>{{ $album->name }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class="imageShow">
                <img src="{{ $album->cover }}" alt="">
            </div>
            <div class="showText mt-3">
                <p>
                    Date de création du album : {{ $album->date_creation }}
                    <br>Nationalité : {{ $album->nationalite }}
                </p>
            </div>
            <div class="boutonCentral mt-2 gap-4">
                <a href="{{ route('albums.edit', ['album' => $album]) }}"><button class="btn btn-outline-warning ">Modifier</button></a>
                
                <form action="{{ route('albums.delete', ['album' => $album]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce album?')" value="Supprimer">
                    {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce album?')">Supprimer</button></a> --}}
                </form>
            </div>

            

            <div class="boutonCentral mt-2">
                <a href="{{ route('albums.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    
    


@endsection