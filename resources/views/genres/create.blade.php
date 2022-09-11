@extends('layouts.app')

@section('content')
<div class="titre">
    <h1><b>Ajout d'un nouveau genre</b></h1>
</div>

    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('genres.store') }}" method="POST" style="width: 100%" class="d-flex justify-content-center">
            @csrf
            <div>
                <label class="mt-2" for="genre">Nom</label>
                <input type="text" name="genre" id="genre" class="form-control @error('genre') is-invalid @enderror" style="width: 400px">
                @error('genre')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror
    
                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Ajouter" >
            </div>
        </form>
    </div>

@endsection