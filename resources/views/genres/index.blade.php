@extends('layouts.app')

@section('content')
    @isset($genres)
    <div class="titre">
        <h1><b>Genres</b></h1>
    </div>
    <div class="main">
        <div class="boutonCentral mt-5">
            <a href="{{ route('genres.create') }}"><button class="btn btn-outline-light ">Créer un nouveau genre</button></a>
        </div>
        <div class="cards">
            @foreach ($genres as $genre)
            <a href="{{ route('genres.show', ['genre' => $genre]) }}">
                <div class="card cardHover cardGenre" style="background-color: #{{ substr(str_shuffle('ABCDE0123456789'), 0, 6) }}">
                    <h4><b>{{ $genre->genre }}</b></h4>
                </div>  
            </a>
                          
            @endforeach
        </div>
    </div>
    @else
        <p class="alert-warning">Pas de genre</p>
    @endisset
    


@endsection