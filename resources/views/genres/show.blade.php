@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 50px"><b>{{ $genre->genre }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
                {{-- Affichage des titres du genre selectionné --}}
            @if (sizeof($titresGenres) >0)
                <h2 class="mb-4 mt-4"><u><b>Titres</b></u> </h2>
                <table class="artisteTable">
                    <thead>
                        <tr>
                            <th scope="col" class="hashtagThead">#</th>
                            <th scope="col" class="titleTableThead">Titre</th>
                            <th scope="col" class="albumTableThead">Album</th>
                            <th scope="col" class="dureeTableThead">Durée</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($titresGenres as $titre)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td> <!--  -->
                                <td>
                                    <div class="titleTableTbody d-flex gap-3 mt-3">
                                        <img src="
                                            @if($titre->appartientAlbums->count() !== 0)
                                                {{ $titre->appartientAlbums->first()->cover}}
                                            @else
                                                'N.C'
                                            @endif
                                        " alt="N.C">
                                        <div>
                                            <b><a href="{{ route('titres.show', ['titre' => $titre]) }}" style="color: whitesmoke">{{ $titre->titre }}</a></b>
                                            @if($titre->appartientAlbums()->first()?->produitGroupes()?->first()->id)
                                            <br><a href="{{ route('groupes.show', ['groupe' => $titre->appartientAlbums()->first()?->produitGroupes()?->first()->id ]) }}" style="color: whitesmoke"><span>{{ $titre->appartientAlbums()->first()?->produitGroupes()?->first()->name ?? 'N.C' }}</span></a>      
                                            @endif                     
                                        </div>
                                    </div>
                                </td>
                                <td class="titleTableTbody">
                                    @if($titre->appartientAlbums->count() !== 0) 
                                    <a href="{{ route('albums.show', ['album' => $titre->appartientAlbums->first()->id]) }}" style="color: whitesmoke">{{ $titre->appartientAlbums->first()->titre}}</a>
                                    @else
                                        N.C
                                    @endif
                                </td>
                                <td>{{ gmdate("i:s", $titre->duree_secondes) }}</td>
                                <td>
                                    <div >
                                        <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                                        <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                                        <audio class="audioPlay" hidden="false" controls preload="none" style="background-color: whitesmoke">
                                            <source src="{{ asset('app/public/'.$titre->filepath) }}">
                                        </audio>
                                    </div>
                                </td>
                            </tr>
                        @endforeach   
                    </tbody>
                </table>
                <hr>
            @else 
                Pas de titres trouvés...
                <hr>
            @endif

                {{-- Affichage des groupes du genre selectionné --}}
                @if (sizeof($groupesGenres) >0)
                    <h2 class="mb-4 mt-4"><u><b>Groupes</b></u> </h2>
                    <div class="cards">
                        @foreach ($groupesGenres as $groupe)
                        <a href="{{ route('groupes.show', ['groupe' => $groupe]) }}">
                            <div class="card cardHover">
                                <div class="imageCard">
                                    <img src="
                                    @if ($groupe->photo )
                                        {{ $groupe->photo }}
                                    @else
                                        {{ Storage::url($groupe->upload) }}
                                    @endif
                                    " alt="Photo de {{ $groupe->name }}">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><b>{{ $groupe->name }}</b></h4>
                                </div>
                            </div>  
                        </a>    
                        @endforeach
                    </div>
                @else 
                Pas de groupes trouvés...
                <hr>
                @endif

                {{-- Affichage des artistes du genre selectionné --}}
                @if (sizeof($artistesGenres) >0)
                    <h2 class="mb-4 mt-4"><u><b>Artistes</b></u> </h2>
                    <div class="cards">
                        @foreach ($artistesGenres as $artiste)
                        <a href="{{ route('artistes.show', ['artiste' => $artiste]) }}">
                            <div class="card cardHover">
                                <div class="imageCard">
                                    <img class="photoCircle" src="
                                    @if ($artiste->photo )
                                        {{ $artiste->photo }}
                                    @else
                                        {{ Storage::url($artiste->upload) }}
                                    @endif
                                    " alt="Photo de {{ $artiste->pseudo }}">
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
                @else 
                Pas d'artistes trouvés...
                <hr>
                @endif

                {{-- Affichage des albums du genre selectionné --}}
                @if (sizeof($albumsGenres) >0)
                    <h2 class="mb-4 mt-4"><u><b>Albums</b></u> </h2>
                    <div class="cards">
                        @foreach ($albumsGenres as $album)
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
                @else 
                Pas d'albums trouvés...
                <hr>
                @endif





        </div>
    </div>
    
    


@endsection