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
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($titres as $titre)
                <tr>
                    <th scope="row"></th>
                    {{-- <th>@for ($i = 1; $i < count($titres)+1; $i++)
                        {{ $i }}                       
                        @endfor</th> --}}
                    <td>
                        <div class="titleTableTbody d-flex gap-3 mt-3">
                            <img src="{{ $titre->intervientArtiste[0]->membreGroupes[0]->photo }}" alt="cover">
                            <div>
                                <b>{{ $titre->titre }}</b>
                                <br><a href=""><span>{{ $titre->intervientArtiste[0]->membreGroupes[0]->name }}</span></a>
                            </div>
                        </div>
                    </td>
                    <td>test</td>
                    {{-- <td>{{ $titre->appartientAlbums->titre }}</td> --}}
                    <td>{{ gmdate("i:s", $titre->duree_secondes) }}</td>
                    {{-- <td>{{ $titre->duree_secondes }}</td> --}}
                    <td><a href=""><img src="{{ asset('assets/icones/lecture.png') }}" alt=""></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="alert-warning">Pas de titre</p>
    @endisset
    


@endsection