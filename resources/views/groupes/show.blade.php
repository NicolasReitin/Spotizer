@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1><b>{{ $groupe->name }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class="imageShow">
                <img src="{{ $groupe->photo }}" alt="">
            </div>
            <div class="showText mt-3">
                <p>
                    Date de création du groupe : {{ $groupe->date_creation }}
                    <br>Nationalité : {{ $groupe->nationalite }}
                </p>
            </div>

            <h3><b>Discographie</b></h3>
            <div class="discographie d-flex gap-4">
                @foreach ($albums as $album)
                <div class="album">
                    <div class="imageCentral cover">
                        <img src="{{ $album->cover }}" alt="">
                    </div>
                    <p><b>{{ $album->titre }}</b> ({{ $album->date_de_sortie }})</p>
                </div>
                @endforeach
            </div>
            <div class="boutonCentral mt-2">
                <a href="{{ route('groupes.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    
    


@endsection