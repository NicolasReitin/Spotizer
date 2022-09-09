@extends('layouts.app')

@section('content')
    @isset($groupes)
    <div class="titre">
        <h1><b>Groupes</b></h1>
    </div>
    <div class="main">
        <div class="boutonCentral mt-5">
            <a href="{{ route('groupes.create') }}"><button class="btn btn-outline-light ">Créer un nouveau groupe</button></a>
        </div>
        <div class="cards gap-5 mt-5">
            @foreach ($groupes as $groupe)
            <a href="{{ route('groupes.show', ['groupe' => $groupe]) }}">
                <div class="card cardHover">
                    <div class="imageCard">
                        <img src="{{ $groupe->photo }}" alt="Photo de {{ $groupe->name }}">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><b>{{ $groupe->name }}</b></h3>
                    </div>
                </div>  
            </a>
                    {{-- <div class="boutonCentral">
                        <a href="{{ route('groupes.show', ['groupe' => $groupe]) }}"><button class="btn btn-outline-warning">Plus d'infos</button></a>
                    </div> --}}
                          
            @endforeach
        </div>
    </div>
    @else
        <p class="alert-warning">Pas de groupe</p>
    @endisset
    


@endsection