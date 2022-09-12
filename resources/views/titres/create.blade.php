@extends('layouts.app')

@section('content')
<div class="titre">
    <h1><b>Ajout d'un nouveau morceau</b></h1>
</div>

    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('titres.store') }}" method="POST" style="width: 100%" class="d-flex justify-content-center">
            @csrf
            <div>
                <label class="mt-2" for="titre">Titre du morceau</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" style="width: 400px">
                @error('titre')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror

                <label for="artiste_id">Artiste</label>
                <div class="d-flex gap-2" >
                    <select name="artiste_id" id="artiste_id" class="form-select" style="width: 400px">
                        <option selected>Choisissez l'artiste ou créer un nouvel artiste =>></option>
                        @foreach ( $artistes as $artiste )
                            <option value="{{ $artiste->id }}">{{ $artiste->pseudo }}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('artistes.create') }}" class="btn btn-outline-light" style="width: 150px">Nouvel artiste</a>
                </div>

                <label class="mt-2" for="role">Rôle de l'artiste</label>
                <input type="text" name="role" id="role" class="form-control" style="width: 400px">

                {{-- <label for="groupe">Groupe</label>
                <div class="d-flex gap-2" >
                    <select name="groupe" id="groupe" class="form-select" style="width: 400px">
                        <option selected>Choisissez un groupe</option>
                        @foreach ( $groupes as $groupe )
                            <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('groupes.create') }}"><button class="btn btn-outline-light" style="width: 150px">Nouveau groupe</button></a>
                </div> --}}

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

                <label class="mt-2" for="duree_secondes">Durée (en secondes)</label>
                <input type="number" name="duree_secondes" id="duree_secondes" class="form-control" style="width: 400px">

                <label class="mt-2" for="upload">Upload du morceau</label>
                <input type="file" class="form-control" name="upload" id="upload" style="width: 400px">
    
                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Ajout du titre" >
            </div>           
        </form>
    </div>

@endsection