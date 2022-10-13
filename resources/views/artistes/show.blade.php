@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 40px"><b>{{ $artiste->pseudo }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class="imageShow">
                <img src="
                @if (isset($artiste->photo))
                    {{ $artiste->photo }}
                @else
                    {{ Storage::url($artiste->upload) }}
                @endif
                " alt="Photo de {{ $artiste->pseudo }}">            </div>
            <div class="showText mt-3">
                <p>Pseudo : {{ $artiste->pseudo }}</p>
                <p>Nom : {{ $artiste->name }}</p>
                <p>Prénom : 
                    @if (isset($artiste->first_name))
                        {{ $artiste->first_name }}
                    @else N.C
                    @endif
                </p>
                <p> Groupe : 
                    @if (isset($groupe->first()->name))
                    {{ $groupe->first()->name}}
                    @else
                    N.C
                    @endif
                </p>
                <p>Date de naissance : 
                    @if (isset($artiste->date_naissance))
                        {{ date('d.m.Y', strtotime($artiste->date_naissance)) }}
                    @else
                        N.C
                    @endif
                </p>
                @if (isset($artiste->date_deces))
                    <p>Décédé le : {{ date('d.m.Y', strtotime($artiste->date_deces)) }}</p>
                @endif
            </div>
            @auth
                @if (Auth::user()->role === 'admin')
                    <div class="boutonCentral mt-2 gap-4">
                        <a href="{{ route('artistes.edit', ['artiste' => $artiste]) }}"><button class="btn btn-outline-warning ">Modifier</button></a>
                        <form action="{{ route('artistes.delete', ['artiste' => $artiste]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce artiste?')" value="Supprimer">
                            {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce artiste?')">Supprimer</button></a> --}}
                        </form>
                    </div>
                @endif
            @endauth 
            

            <div class="blocTitres">
                <h3><b>Titres de l'artiste</b></h3>
                <table class="artisteTable">
                    <thead>
                        <tr>
                            <th scope="col" class="hashtagThead">#</th>
                            <th scope="col" class="titleTableThead">Titre</th>
                            <th scope="col" class="titleTableThead">Album</th>
                            <th scope="col" class="dureeTableThead">Durée</th>
                            <th scope="col" class=""></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($titres as $titre)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
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
                    <td>
                        @if($titre->appartientAlbums->count() !== 0)
                            {{ $titre->appartientAlbums->first()->titre}}
                        @else
                            N.C
                        @endif
                    </td>
                            <td>Durée</td>
                            <td>
                                <div >
                                    <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                                    <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                                    <audio class="audioPlay" hidden="true" controls preload="none" style="width: 70% !important; background-color: whitesmoke">
                                        <source src="{{ asset('storage/'.$titre->filepath) }}">
                                    </audio>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            

            <div class="boutonCentral mt-2">
                <a href="{{ route('artistes.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    
    


@endsection