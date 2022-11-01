@extends('layouts.app')

@section('content')
<div class="titre">
    <h1><b>Enregistrement d'un nouvel album</b></h1>
</div>

    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('albums.store') }}" method="POST" style="width: 100%" class="d-flex justify-content-center" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="mt-2" for="titre">Titre de l'album</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" style="width: 400px">
                @error('titre')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror

                <label for="groupe_id">Nom du groupe</label>
                <select class="form-select" name="groupe_id" id="groupe_id">
                    <option selected disabled>Choisissez un groupe</option>
                    @foreach ($groupes as $groupe)
                        <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                    @endforeach
                </select>

                <label class="mt-2" for="date_de_sortie">Date de sortie</label>
                <input type="text" name="date_de_sortie" id="date_de_sortie" class="form-control" style="width: 400px">
    
                <label class="mt-2" for="photo">Url de l'image</label>
                <input type="url" name="photo" id="photo" class="form-control" style="width: 400px" placeholder="https://example.com">

                <label class="mt-2" for="imageUpload">Image à upload</label>
                <input type="file" class="form-control" name="imageUpload" id="imageUpload" style="width: 400px">
    
                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Enregistrement du groupe" >
            </div>
            
            
        </form>
    </div>

@endsection