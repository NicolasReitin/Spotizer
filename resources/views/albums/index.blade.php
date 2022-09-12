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
        <div class="cards">
            @foreach ($albums as $album)
            <a href="{{ route('albums.show', ['album' => $album]) }}">
                <div class="card cardHover">
                    <div class="imageCard">
                        <img src="
                        @if ($album->cover )
                            {{ $album->cover }}
                        @else
                            {{ Storage::url($album->upload) }}
                        @endif
                        " alt="Photo de {{ $album->titre }}">                    
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $album->titre }}</b><br>
                            <span style="color: grey">{{ $album->produitGroupes->name }}</span>
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