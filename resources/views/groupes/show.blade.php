@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 50px"><b>{{ $groupe->name }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class="imageShow">
                <img src="
                    @if ($groupe->photo )
                        {{ $groupe->photo }}
                    @else
                        {{ Storage::url($groupe->upload) }}
                    @endif
                    " alt="Photo de {{ $groupe->name }}">
            </div>
            <div class="showText mt-3">
                <p>
                    Date de création du groupe : {{ $groupe->date_creation }}
                    <br>Nationalité : {{ $groupe->nationalite }}
                </p>
            </div>
            <div class="boutonCentral mt-2 gap-4">
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('groupes.edit', ['groupe' => $groupe]) }}"><button class="btn btn-outline-light ">Modifier</button></a>
                        <a href="{{ route('addArtiste.create', ['groupe' => $groupe]) }}"><button class="btn btn-outline-light ">Ajouter un artiste</button></a>
                        
                        <form action="{{ route('groupes.delete', ['groupe' => $groupe]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce groupe?')" value="Supprimer">
                        </form>
                    @endif
                @endauth 
                
            </div>

            <div class="blocArtiste">
                <h3><b>Artistes</b></h3>
                <div class="casting gap-4">
                    @foreach ($artistes as $artiste)
                    <div class="artistes">
                        <a href="{{ route('artistes.show', ['artiste' =>$artiste]) }}">
                            <div class="imageCentral">
                                <img class="photoCircle" src="{{ $artiste->photo }}" alt="">
                            </div>
                        </a>
                        <p><b>{{ $artiste->pseudo }}</b></p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="blocDisco mt-5">
                <h3><b>Discographie</b></h3>
                <div class="discographie gap-4">
                    @foreach ($albums as $album)
                    <div class="albums">
                        <div class="cardHover">
                        <a href="{{ route('albums.show', ['album' =>$album]) }}">
                            <div class="imageCentral">
                                <img src="{{ $album->cover }}" alt="{{ $album->titre }}">
                            </div>
                        </a>
                        <p><b>{{ $album->titre }}</b><br> {{ $album->date_de_sortie }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            

            <div class="boutonCentral mt-2">
                <a href="{{ route('groupes.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    
    


@endsection