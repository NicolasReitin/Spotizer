@extends('layouts.app')

@section('content')
<div class="titre">
    <h1><b>Nouvel artiste pour {{ strtoupper($groupe->name) }}</b></h1>
</div>

    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('addArtiste.store', ['groupe' => $groupe]) }}" method="POST" style="width: 100%" class="d-flex justify-content-center">
            @csrf
            <div>
                <label class="mt-2" for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control @error('pseudo') is-invalid @enderror" style="width: 400px">
                @error('pseudo')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror

                <label class="mt-2 for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" style="width: 400px">

                <label class="mt-2 for="first_name">Prénom</label>
                <input type="text" name="first_name" id="first_name" class="form-control" style="width: 400px">

                <label class="mt-2" for="date_naissance">Date de naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control" style="width: 400px">

                <label class="mt-2" for="date_deces">Date de décès (facultatif)</label>
                <input type="date" name="date_deces" id="date_deces" class="form-control" style="width: 400px">
    
                <label class="mt-2" for="photo">Url de l'image</label>
                <input type="url" name="photo" id="photo" class="form-control" style="width: 400px" placeholder="https://example.com">

                <label class="mt-2" for="">Image à upload</label>
                <input type="file" class="form-control" name="upload" id="name" style="width: 400px">
    
                
                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Ajout de l'artiste" >
            </div>
            
            
        </form>
    </div>

@endsection