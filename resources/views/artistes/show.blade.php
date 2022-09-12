@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 40px"><b>{{ $artiste->pseudo }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class="imageShow">
                <img src="{{ $artiste->photo }}" alt="">
            </div>
            <div class="showText mt-3">
                <p>
                    Pseudo : {{ $artiste->pseudo }}
                </p>
                <p>
                    Nom : {{ $artiste->name }}
                </p>
                <p>
                    Prénom : 
                    @if ($artiste->first_name)
                        {{ $artiste->first_name }}
                    @else N.C
                    @endif
                </p>
                <p> @if (!$groupe->empty())
                    Groupe : {{ $groupe->first()->name}}
                    @else
                    Pas de groupe
                    @endif
                </p>
                <p>
                    Date de naissance : {{ \DateTime::createFromFormat('Y-m-d',$artiste->date_naissance)->format('d.m.Y') }}
                </p>
                @if ($artiste->date_deces)
                    <p>
                        Décédé le : {{ \DateTime::createFromFormat('Y-m-d',$artiste->date_deces)->format('d.m.Y') }}
                    </p>
                @endif
            </div>
            <div class="boutonCentral mt-2 gap-4">
                <a href="{{ route('artistes.edit', ['artiste' => $artiste]) }}"><button class="btn btn-outline-warning ">Modifier</button></a>
                
                <form action="{{ route('artistes.delete', ['artiste' => $artiste]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce artiste?')" value="Supprimer">
                    {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce artiste?')">Supprimer</button></a> --}}
                </form>
            </div>

            <div class="blocTitres">
                <h3><b>Titres de l'artiste</b></h3>
                {{-- <div class="casting gap-4">
                    @foreach ($artistes as $artiste)
                    <div class="artistes">
                        <a href="">
                            <div class="imageCentral">
                                <img class="photoCircle" src="{{ $artiste->photo }}" alt="">
                            </div>
                        </a>
                        <p><b>{{ $artiste->pseudo }}</b></p>
                    </div>
                    @endforeach
                </div> --}}
            </div>
            

            

            <div class="boutonCentral mt-2">
                <a href="{{ route('artistes.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    
    


@endsection