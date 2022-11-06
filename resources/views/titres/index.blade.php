@extends('layouts.app')

@section('content')
    @isset($titres)
    <div class="titre">
        <h1><b>Titres</b></h1>
    </div>
    <div class="main">
        @auth
            @if (Auth::user()->role === 'admin')
                <div class="boutonCentral mt-5">
                    <a href="{{ route('titres.create') }}"><button class="btn btn-outline-light ">Créer un nouveau titre</button></a>
                </div>
            @endif
        @endauth 
        
        <table class="artisteTable">
            <thead>
                <tr>
                    <th scope="col" class="hashtagThead">#</th>
                    <th scope="col" class="titleTableThead">Titre</th>
                    <th scope="col" class="albumTableThead">Album</th>
                    <th scope="col" class="dureeTableThead">Durée</th>
                    <th class="playTableThead"></th>
                    <th class="editTableThead"></th>
                    <th class="deleteTableThead"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($titres as $titre)
                
                    <th class="hashtagTbody" scope="row">{{$loop->iteration}}</th>
                    <td class="titleTableTbody d-flex gap-3 mt-3">
                            <img src="
                                @if($titre->appartientAlbums->count() !== 0)
                                    {{ $titre->appartientAlbums[0]->cover}}
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
                    </td>
                    <td class="albumTableTbody">
                        @if($titre->appartientAlbums->count() !== 0) 
                        <a href="{{ route('albums.show', ['album' => $titre->appartientAlbums->first()->id]) }}" style="color: whitesmoke">{{ $titre->appartientAlbums->first()->titre}}</a>
                        @else
                            N.C
                        @endif
                    </td>
                    <td class="dureeTableTbody">{{ gmdate("i:s", $titre->duree_secondes) }}</td>

                    <td>
                        <div >
                            <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                            <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                            <audio class="audioPlay" hidden="false" controls preload="none" style="background-color: whitesmoke">
                                <source src="{{ asset('app/public/'.$titre->filepath) }}">
                            </audio>
                        </div>
                    </td>
                    @auth
                        @if (Auth::user()->role === 'admin')
                        <td class="editTableTbody">
                            <a href="{{ route('titres.edit', ['titre' => $titre]) }}"><button class="btn btn-outline-light ">Edit</button></a>
                        </td>
                        <td class="deleteTableTbody">
                            <form action="{{ route('titres.delete', ['titre' => $titre]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')" value="X">
                            </form>
                        </td>
                        @endif
                    @endauth 
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="alert-warning">Pas de titre</p>
    @endisset
    
    <div class="imageCentral mt-4">
        <div class="paginate">
            {{ $titres->links() }} 
        </div>
    </div>
    
    


@endsection