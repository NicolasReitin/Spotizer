@extends('layouts.app')

@section('content')
    @isset($groupes)
    <div class="titre">
        <h1><b>Groupes</b></h1>
    </div>
    <div class="main">
        <div class="boutonCentral mt-5">
            <a href="{{ route('groupes.create') }}"><button class="btn btn-outline-secondary ">Créer un nouveau groupe</button></a>
        </div>
        <div class="cards gap-5 mt-5">
            @foreach ($groupes as $groupe)
            <div class="card" style="width: 280px; background-color: #151515">
                <div class="imageCard">
                    <img src="{{ $groupe->photo }}" alt="Photo de {{ $groupe->name }}">
                </div>
                <div class="card-body">
                    <h3 class="card-title"><b>{{ $groupe->name }}</b></h3>
                    {{-- <p class="card-text mt-2">Date de création : {{ $groupe->date_creation }} 
                        <br>Nationalité : {{ $groupe->nationalite }} 
                    </p> --}}
                </div>
                <div class="boutonCentral">
                    <a href="{{ route('groupes.show', ['groupe' => $groupe]) }}"><button class="btn btn-outline-warning">Plus d'infos</button></a>
                </div>
            </div>            
            @endforeach
        </div>
    </div>
    @else
        <p class="alert-warning">Pas de groupe</p>
    @endisset
    


@endsection