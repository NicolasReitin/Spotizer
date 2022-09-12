@extends('layouts.app')

@section('content')
<div class="titre">
    <h1><b>Modification de {{ $groupe->name }}</b></h1>
</div>

    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('groupes.update', ['groupe' => $groupe]) }}" method="POST" style="width: 100%" class="d-flex justify-content-center" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div>
                <label class="mt-2" for="name">Nom du groupe</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" style="width: 400px" value="{{ $groupe->name }}">
                @error('name')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror

                <label class="mt-2" for="nationalite">Nationalité</label>
                <input type="text" name="nationalite" id="nationalite" class="form-control" style="width: 400px" value="{{ $groupe->nationalite }}">
    
                <label class="mt-2" for="date_creation">Année de création</label>
                <input type="number" name="date_creation" id="date_creation" class="form-control" style="width: 400px" min="1900" max="2050" value="{{ $groupe->date_creation }}">

                <label class="mt-2" for="photo">Url de l'image</label>
                <input type="url" name="photo" id="photo" class="form-control" style="width: 400px" placeholder="https://example.com" value="{{ $groupe->photo }}">

                <label class="mt-2" for="imageUpload">Image à upload</label>
                <input type="file" class="form-control" name="imageUpload" id="imageUpload" style="width: 400px">
    
                <input type="submit" class="btn btn-outline-warning mt-3" style="width: 400px" name="Envoyer" value="Enregistrement du groupe" >
            </div>
            
            
        </form>
    </div>

@endsection