@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1><b>{{ $groupe->name }}</b></h1>
    </div>
    <div class="main">
        <div class="boutonCentral mt-5">
            <a href=""><button class="btn btn-outline-secondary ">Créer un nouveau groupe</button></a>
        </div>
        <div class="cards gap-5 mt-5">
            
        </div>
    </div>
    


@endsection