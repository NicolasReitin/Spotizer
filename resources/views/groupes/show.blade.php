@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 50px"><b>{{ $groupe->name }}</b></h1>
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
            <div class="boutonCentral mt-2 gap-4">
                <a href="{{ route('groupes.edit', ['groupe' => $groupe]) }}"><button class="btn btn-outline-warning ">Modifier</button></a>
                
                <form action="{{ route('groupes.delete', ['groupe' => $groupe]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce groupe?')" value="Supprimer">
                    {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce groupe?')">Supprimer</button></a> --}}
                </form>
            </div>

            <h3><b>Artistes</b></h3>
            <div class="casting gap-4">
                @foreach ($artistes as $artiste)
                <div class="artistes">
                    <div class="imageCentral">
                        <img src="{{ $artiste->photo }}" alt="">
                    </div>
                    <p><b>{{ $artiste->pseudo }}</b></p>
                </div>
                @endforeach
            </div>


            <h3><b>Discographie</b></h3>
            <div class="discographie gap-4">
                @foreach ($albums as $album)
                <div class="albums">
                    <div class="imageCentral">
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