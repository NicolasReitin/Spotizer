@extends('layouts.app')

@section('content')
    <div class="titre">
        <h1 style="font-size: 50px"><b>{{ $titre->titre }}</b></h1>
    </div>
    <div class="showPage mt-5">
        <div class="main">
            

            <div class="d-flex justify-content-center mb-5">
                <img id="btnPlay" class="buttonPlay" src="{{ asset('assets/icones/Play.png') }}" alt="Play"> 
                <img id="btnPlay" class="buttonPause" hidden="true" src="{{ asset('assets/icones/Pause.png') }}" alt="Pause">
                <audio class="audioPlay" hidden="false" controls preload="none" style="background-color: whitesmoke">
                    <source src="{{ asset('storage/'.$titre->filepath) }}">
                </audio>
            </div>
            
            <div class="boutonCentral mt-2 gap-4">
                <a href="{{ route('titres.edit', ['titre' => $titre]) }}"><button class="btn btn-outline-light ">Modifier</button></a>
                <form action="{{ route('titres.delete', ['titre' => $titre]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')" value="Supprimer">
                    {{-- <a href=""><button class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')">Supprimer</button></a> --}}
                </form>
            </div>
            

            <div class="boutonCentral mt-2">
                <a href="{{ route('titres.index') }}"><button class="btn btn-outline-warning ">Retour aux titres</button></a>
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