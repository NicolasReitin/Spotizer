@extends('layouts.app')

@section('content')
    @isset($albums)
    <div class="titre">
        <h1><b>Albums</b></h1>
    </div>
    <div class="main">
        <div class="boutonCentral mt-5">
            <a href="{{ route('albums.create') }}"><button class="btn btn-outline-light ">Créer un nouveau album</button></a>
        </div>
        <div class="cards gap-5 mt-5">
            @foreach ($albums as $album)
            <a href="{{ route('albums.show', ['album' => $album]) }}">
                <div class="card">
                    <div class="imageCard">
                        <img src="{{ $album->cover }}" alt="Photo de {{ $album->name }}">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><b>{{ $album->titre }}</b><br> <a href="{{ route('groupes.show', ['groupe' => $album->produitGroupes->id]) }}" style="text-decoration: none"><span style="font-size: 15px">({{ $album->produitGroupes->name }})</span></a></h3>
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