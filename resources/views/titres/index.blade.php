@extends('layouts.app')

@section('content')
    @isset($titres)
    <div class="titre">
        <h1><b>Titres</b></h1>
    </div>
    <div class="main">
        <div class="boutonCentral mt-5">
            <a href="{{ route('titres.create') }}"><button class="btn btn-outline-light ">Créer un nouveau titre</button></a>
        </div>
        <table class="artisteTable">
            <thead>
                <tr>
                    <th scope="col" class="hashtagThead">#</th>
                    <th scope="col" class="titleTableThead">Titre</th>
                    <th scope="col" class="albumTableThead">Album</th>
                    <th scope="col" class="dureeTableThead">Durée</th>
                    <th></th>
                    <th></th>
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
                                    {{ asset('assets/icones/lecture.png') }}
                                @endif
                            " alt="cover">
                            <div>
                                <b>{{ $titre->titre }}</b>
                                <br><a href=""><span>{{ $titre->appartientAlbums()->first()?->produitGroupes()?->first()->name ?? 'N.C' }}</span></a>                           
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($titre->appartientAlbums->count() !== 0)
                            {{ $titre->appartientAlbums[0]->titre}}
                        @else
                            N.C
                        @endif
                    </td>
                    <td>{{ gmdate("i:s", $titre->duree_secondes) }}</td>
                    <td><a href=""><img src="{{ asset('assets/icones/lecture.png') }}" alt=""></a></td>
                    <td>
                        <form action="{{ route('titres.delete', ['titre' => $titre]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')" value="X">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="alert-warning">Pas de titre</p>
    @endisset
    


@endsection