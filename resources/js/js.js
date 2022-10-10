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
