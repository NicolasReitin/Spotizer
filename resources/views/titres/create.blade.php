@extends('layouts.app')

@section('content')
<div class="titre">
    <h1><b>Ajout d'un nouveau morceau</b></h1>
</div>

    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('titres.store') }}" method="POST" style="width: 100%" class="d-flex justify-content-center" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="mt-2" for="titre">Titre du morceau</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" style="width: 400px">
                @error('titre')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror

                <label for="album_id">Album</label>
                <div class="d-flex gap-2" >
                    <select name="album_id" id="album_id" class="form-select" style="width: 400px">
                        <option selected>Choisissez l'album ou créer un nouvel album =>></option>
                        @foreach ( $albums as $album )
                            <option value="{{ $album->id }}">{{ $album->titre }}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('albums.create') }}" class="btn btn-outline-light" style="width: 150px">Nouveau album</a>
                </div>      
                
                <label class="mt-2" for="numero_piste">Numéro de piste</label>
                <input type=" number" name="numero_piste" id="numero_piste" class="form-control" style="width: 400px">

                <label class="mt-2" for="duree_secondes">Durée (en secondes)</label>
                <input type="number" name="duree_secondes" id="duree_secondes" class="form-control" style="width: 400px">

                <label class="mt-2" for="filepath">Fichier à upload</label>
                <input type="file" class="form-control" name="filepath" id="filepath" style="width: 400px">
    
                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Ajout du titre" >
            </div>           
        </form>
    </div>

@endsection