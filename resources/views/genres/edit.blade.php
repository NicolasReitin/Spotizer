@extends('layouts.app')

@section('content')
<div class="titre">
    <h1><b>Modification du genre {{ $genre->genre }}</b></h1>
</div>

    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('genres.update', ['genre' => $genre]) }}" method="POST" style="width: 100%" class="d-flex justify-content-center">
            @method('PUT')
            @csrf
            <div>
                <label class="mt-2" for="genre">Nom du genre</label>
                <input type="text" name="genre" id="genre" class="form-control @error('genre') is-invalid @enderror" style="width: 400px" value="{{ $genre->genre }}">
                @error('genre')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror
    
                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Modification du genre" >
            </div>
            
            
        </form>
    </div>

@endsection