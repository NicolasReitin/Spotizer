@extends('layouts.app')

@section('content')
    @isset($artistes)
    <div class="titre">
        <h1><b>artistes</b></h1>
    </div>
    <div class="main">
        <div class="boutonCentral mt-5">
            <a href="{{ route('artistes.create') }}"><button class="btn btn-outline-light ">Créer un nouvel artiste</button></a>
        </div>
        <div class="cards">
            @foreach ($artistes as $artiste)
            <a href="{{ route('artistes.show', ['artiste' => $artiste]) }}">
                <div class="card cardHover">
                    <div class="imageCard">
                        <img class="photoCircle" src="{{ $artiste->photo }}" alt="Photo de {{ $artiste->pseudo }}">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $artiste->pseudo }}</b><br>
                            <span style="color: grey"></span>
                        </h4>
                    </div>
                </div>  
            </a>                     
            @endforeach
        </div>
    </div>
    @else
        <p class="alert-warning">Pas de album</p>
    @endisset
    


@endsection