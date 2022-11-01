@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 40px"><b>{{ $album->titre }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class="imageShow">
                <img src="
                        @if ($album->cover )
                            {{ $album->cover }}
                        @else
                            {{ Storage::url($album->upload) }}
                        @endif
                " alt="Photo de {{ $album->titre }}"> 
            </div>
            @if (isset($groupe))
                <div class="showText mt-3">
                    <p>
                    Groupe : <a href="{{ route('groupes.show', $album->groupe_id) }}">{{ $groupe->name }}</a>
                    <br><span>Date de sortie : {{ $album->date_de_sortie }}</span>
                </p>
            @endif
                    
            </div>
            @auth
                @if (Auth::user()->role === 'admin')
                    <div class="boutonCentral mt-2 gap-4">
                        <a href="{{ route('albums.edit', ['album' => $album]) }}"><button class="btn btn-outline-warning ">Modifier</button></a>
                        
                        <form action="{{ route('albums.delete', ['album' => $album]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce album?')" value="Supprimer">
                            {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce album?')">Supprimer</button></a> --}}
                        </form>
                    </div>
                @endif
            @endauth 

            @if (sizeof($album->appartientVersion_morceaus) > 0)
                <div class="blocTitres">
                    <h3><b>Titres</b></h3>
                    <table class="artisteTable">
                        <thead>
                            <tr>
                                <th scope="col" class="hashtagThead">#</th>
                                <th scope="col" class="titleTableThead">Titre</th>
                                <th scope="col" class="dureeTableThead">Durée</th>
                                <th scope="col" class=""></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($album->appartientVersion_morceaus as $titre)
                            <tr>
                                <th scope="row">{{ $titre->appartientAlbums->first()->pivot->numero_piste }}</th>
                                <td>
                            <div class="titleTableTbody d-flex gap-3 mt-3">
                                <img src="
                                    @if($titre->appartientAlbums->count() !== 0)
                                        {{ $titre->appartientAlbums[0]->cover}}
                                    @else
                                        'N.C'
                                    @endif
                                " alt="cover">
                                <div>
                                    <b><a href="{{ route('titres.show', ['titre' => $titre]) }}" style="color: whitesmoke">{{ $titre->titre }}</a></b>
                                    <br><a href="{{ route('groupes.show', ['groupe' =>$titre->appartientAlbums()->first()?->produitGroupes()?->first()->id ]) }}"><span>{{ $titre->appartientAlbums()->first()?->produitGroupes()?->first()->name ?? 'N.C' }}</span></a>                           
                                </div>
                            </div>
                        </td>
                                <td>{{ gmdate("i:s", $titre->duree_secondes) }}</td>
                                <td>
                                    <div >
                                        <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                                        <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                                        <audio class="audioPlay" hidden="true" controls preload="none" style="width: 70% !important; background-color: whitesmoke">
                                            <source src="{{ asset('app/public/'.$titre->filepath) }}">
                                        </audio>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
            
            @if (isset($artistes))
                <div class="blocArtiste mt-5">
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
            @endif
            

            

            <div class="boutonCentral mt-2">
                <a href="{{ route('albums.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    


@endsection