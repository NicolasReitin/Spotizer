@extends('layouts.app')

@section('content')
    @isset($titres)
    <div class="titre">
        <h1><b>Titres</b></h1>
    </div>
    <div class="main">
        @auth
            @if (Auth::user()->role === 'admin')
                <div class="boutonCentral mt-5">
                    <a href="{{ route('titres.create') }}"><button class="btn btn-outline-light ">Créer un nouveau titre</button></a>
                </div>
            @endif
        @endauth 
        
        <table class="artisteTable">
            <thead>
                <tr>
                    <th scope="col" class="hashtagThead">#</th>
                    <th scope="col" class="titleTableThead">Titre</th>
                    <th scope="col" class="albumTableThead">Album</th>
                    <th scope="col" class="dureeTableThead">Durée</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($titres as $titre)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>
                        <div class="titleTableTbody d-flex gap-3 mt-3">
                            <img src="
                                @if($titre->appartientAlbums->count() !== 0)
                                    {{ $titre->appartientAlbums[0]->cover}}
                                @else
                                    'N.C'
                                @endif
                            " alt="N.C">
                            <div>
                                <b><a href="{{ route('titres.show', ['titre' => $titre]) }}" style="color: whitesmoke">{{ $titre->titre }}</a></b>
                                @if($titre->appartientAlbums()->first()?->produitGroupes()?->first()->id)
                                <br><a href="{{ route('groupes.show', ['groupe' => $titre->appartientAlbums()->first()?->produitGroupes()?->first()->id ]) }}" style="color: whitesmoke"><span>{{ $titre->appartientAlbums()->first()?->produitGroupes()?->first()->name ?? 'N.C' }}</span></a>      
                                @endif                     
                            </div>
                        </div>
                    </td>
                    <td class="titleTableTbody">
                        @if($titre->appartientAlbums->count() !== 0) 
                        <a href="{{ route('albums.show', ['album' => $titre->appartientAlbums->first()->id]) }}" style="color: whitesmoke">{{ $titre->appartientAlbums->first()->titre}}</a>
                        @else
                            N.C
                        @endif
                    </td>
                    <td>{{ gmdate("i:s", $titre->duree_secondes) }}</td>

                    <td>
                        <div >
                            <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                            <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                            <audio class="audioPlay" hidden="false" controls preload="none" style="background-color: whitesmoke">
                                <source src="{{ asset('app/public/'.$titre->filepath) }}">
                            </audio>
                        </div>
                    </td>
                    @auth
                        @if (Auth::user()->role === 'admin')
                        <td>
                            <a href="{{ route('titres.edit', ['titre' => $titre]) }}"><button class="btn btn-outline-light ">Edit</button></a>
                        </td>
                        <td>
                            <form action="{{ route('titres.delete', ['titre' => $titre]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')" value="X">
                            </form>
                        </td>
                        @endif
                    @endauth 
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="alert-warning">Pas de titre</p>
    @endisset
    



{{-- <script> // dans le dossier JS

    function lectureAudio(event) { //fonction d'affichage d'un bouton de lecture + hidden du controls du audio
        let div_audio =  event.target.parentElement; //retour a la div parent de audio
        let audio = div_audio.querySelector('.audioPlay'); // select de la class audioPlay de la div audio

        let btnPlay = div_audio.querySelector('.buttonPlay'); //select de l'img du bouton play
        let btnPause = div_audio.querySelector('.buttonPause'); //select de l'img du bouton pause

        if(audio.paused){ // si audio en pause :
            audio.play(); // commande play
            
            btnPlay.hidden = true;  // + cache du bouton play
            btnPause.hidden = false; // et affichage du bouton pause!

        }else{
            audio.pause(); //si audio en lecture -> commande pause
            btnPlay.hidden = false; // + affichage du bouton play
            btnPause.hidden = true; // et cache du bouton pause
        }
    }

    let buttons = document.querySelectorAll('#btnPlay'); //select de la id #btnPlay

    buttons.forEach(element => {
        element.addEventListener('click',
        lectureAudio)
    });

</script> --}}



@endsection