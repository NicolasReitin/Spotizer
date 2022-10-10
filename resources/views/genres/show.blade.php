@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 50px"><b>{{ $genre->genre }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class=" d-flex justify-content-center mb-4">
                <div class="card cardHover cardGenre">
                    <h4><b>{{ $genre->genre }}</b></h4>
                </div>  
            </div>
            @auth
                @if (Auth::user()->role === 'admin')
                    <div class="boutonCentral mt-2 gap-4">
                        <a href="{{ route('genres.edit', ['genre' => $genre]) }}"><button class="btn btn-outline-light ">Modifier</button></a>
                        <form action="{{ route('genres.delete', ['genre' => $genre]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce genre?')" value="Supprimer">
                            {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce genre?')">Supprimer</button></a> --}}
                        </form>
                    </div>
                @endif
            @endauth 
            
            

            <div class="boutonCentral mt-2">
                <a href="{{ route('genres.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    
    


@endsection