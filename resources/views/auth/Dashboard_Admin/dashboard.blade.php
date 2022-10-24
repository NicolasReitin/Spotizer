@extends('layouts.app')


@section('content')

    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')
        <div class="mainAdmin">
            <h2>Bienvenue <b>{{ ucfirst(Auth::user()->pseudo) }}</b></h2>                
            <hr>
            <div class="blocLastPosts d-flex gap-5">
                <div class="left">
                    <h3><u><b>5 derniers utilisateurs inscrits</b></u> : <br></h3>
                    @foreach ($users as $user)
                        <div class="lastUsers">
                            <a href="{{ route('show.user', ['user' => $user]) }}">{{ ucfirst($user->pseudo) }}</a>
                        </div>
                        <br>
                    @endforeach
                    <br>
                    <p><a href="{{ route('users') }}">(Voir tous)</a></p>
                </div>

                <div class="right">
                    <h3><u><b>5 derniers titres enregistrés</b></u> : <br></h3>
                    @foreach ($titres as $titre)
                        <div class="lastUsers d-flex">
                            <a href="{{ route('show.titre', ['titre' => $titre]) }}">{{ ucfirst($titre->titre) }}</a> 
                            @if ($titre->appartientAlbums()->first()->produitGroupes()->first()->id)
                                <a href="{{ route('groupes.show', ['groupe' => $titre->appartientAlbums()->first()->produitGroupes()->first()->id]) }}">&nbsp; - ({{ $titre->appartientAlbums()->first()->produitGroupes()->first()->name }})</a>
                            @endif
                        </div>
                        <br>
                    @endforeach
                    <br>
                    <p><a href="{{ route('adminTitres') }}">(Voir tous)</a></p>
                </div>    
            </div>
        </div>
    </div>

@endsection
