@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 40px"><b>{{ $album->titre }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            <div class="imageShow">
                <img src="
                        @if ($album->cover )
                            {{ $album->cover }}
                        @else
                            {{ Storage::url($album->upload) }}
                        @endif
                " alt="Photo de {{ $album->titre }}"> 
            </div>
            <div class="showText mt-3">
                <p>
                    Groupe : <a href="{{ route('groupes.show', $album->groupe_id) }}">{{ $album->produitGroupes->name }}</a>
                    <br><span>Date de sortie : {{ $album->date_de_sortie }}</span>
                </p>
            </div>
            @auth
                @if (Auth::user()->role === 'admin')
                    <div class="boutonCentral mt-2 gap-4">
                        <a href="{{ route('albums.edit', ['album' => $album]) }}"><button class="btn btn-outline-warning ">Modifier</button></a>
                        
                        <form action="{{ route('albums.delete', ['album' => $album]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce album?')" value="Supprimer">
                            {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce album?')">Supprimer</button></a> --}}
                        </form>
                    </div>
                @endif
            @endauth 
            

            <div class="blocTitres">
                <h3><b>Titres</b></h3>
                <table class="artisteTable">
                    <thead>
                        <tr>
                            <th scope="col" class="hashtagThead">#</th>
                            <th scope="col" class="titleTableThead">Titre</th>
                            <th scope="col" class="dureeTableThead">Durée</th>
                            <th scope="col" class=""></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($album->appartientVersion_morceaus as $titre)
                        <tr>
                            <th scope="row">{{ $titre->appartientAlbums->first()->pivot->numero_piste }}</th>
                            <td>
                        <div class="titleTableTbody d-flex gap-3 mt-3">
                            <img src="
                                @if($titre->appartientAlbums->count() !== 0)
                                    {{ $titre->appartientAlbums[0]->cover}}
                                @else
                                    'N.C'
                                @endif
                            " alt="cover">
                            <div>
                                <b><a href="{{ route('titres.show', ['titre' => $titre]) }}" style="color: whitesmoke">{{ $titre->titre }}</a></b>
                                <br><a href="{{ route('groupes.show', ['groupe' =>$titre->appartientAlbums()->first()?->produitGroupes()?->first()->id ]) }}"><span>{{ $titre->appartientAlbums()->first()?->produitGroupes()?->first()->name ?? 'N.C' }}</span></a>                           
                            </div>
                        </div>
                    </td>
                            <td>Durée</td>
                            <td>
                                <div >
                                    <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                                    <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                                    <audio class="audioPlay" hidden="true" controls preload="none" style="width: 70% !important; background-color: whitesmoke">
                                        <source src="{{ asset('storage/'.$titre->filepath) }}">
                                    </audio>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            

            

            <div class="boutonCentral mt-2">
                <a href="{{ route('albums.index') }}"><button class="btn btn-outline-warning ">Retour à l'accueil</button></a>
            </div>
            <div class="cards gap-5 mt-5">
                
            </div>
        </div>
    </div>
    
    


    <script>

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
    
    </script>


@endsection