<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Album;
use App\Models\Groupe;
use App\Models\Artiste;
use wapmorgan\Mp3Info\Mp3Info;
use App\Models\Version_morceau;
use App\Models\Appartient_album;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Intervient_version_morceau;
use App\Http\Requests\Storeversion_morceauRequest;
use App\Http\Requests\Updateversion_morceauRequest;

class Version_morceauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //renvoi vers la page index avec tous les titres récupérés de la bdd dans la function $titres
        $titres = Version_morceau::with('intervientArtiste')->with('intervientArtiste.membreGroupes')->inRandomOrder()->get();
        return view('titres.index', compact('titres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistes = Artiste::all(); //récupère tous les artistes de la BDD dans une fonction
        $groupes = Groupe::all(); //récupère tous les groupes de la BDD dans une fonction
        $albums = Album::all(); //récupère tous les albums de la BDD dans une fonction
        return view('titres.create', compact('artistes', 'groupes', 'albums')); // et renvoi vers la page create avec les fonctions précédentes en paramètres
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeversion_morceauRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeversion_morceauRequest $request)
    {
        $all_params = [];//création d'une fonction array vide
        // ajout des valeurs rentrées dans le formulaire de création dans la fonction array $all_params
        $all_params['titre'] = $request->titre;
        if ($request->file('filepath')) {
            $filename = time() .'.'. $request->titre .'.'. $request->file('filepath')->extension(); // nom du fichier upload dans le storage
            $all_params['filepath'] = $request->file('filepath')->storeAs( //upload du fichier dans le storage
                'musics', //nom du dossier de stockage
                $filename, // nom du fichier
                'public' // public ou local ou autre
            );
        $audio = new Mp3Info($request->file('filepath')); // recuperation de la durée via Mp3info (module de laravel)
        $all_params['duree_secondes'] = round($audio->duration);//recupération durée du titre uploaded via mp3Info
        $all_params['extension'] = $request->file('filepath')->extension();
        }

        $lastMorceauId = Version_morceau::create($all_params); // envoi des valeurs précédentes dans la BDD de la table Artiste + création d'une fonction enregistrant le dernier titre créé afin de récupérer les valeurs de celui-ci
      
        $all_params2 = []; //création d'une 2eme fonction array vide
        $all_params2['version_morceau_id'] = $lastMorceauId->id;
        $all_params2['album_id'] = $request->album_id;
        $all_params2['numero_piste'] = $request->numero_piste;
        Appartient_album::create($all_params2); // envoi des valeurs précédentes dans la BDD de la table Appartient_album
        
        return redirect('titres/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function show(version_morceau $titre)
    {
        return view('titres.show', compact('titre')); // renvoi vers la page show 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function edit(version_morceau $titre)
    {
        $albums = Album::all();
        return view('titres.edit', compact('titre', 'albums')); // redirection vers la page edit et son formulaire
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateversion_morceauRequest  $request
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function update(Updateversion_morceauRequest $request, version_morceau $titre)
    {
        //récupération des valeurs du formulaire pour les update dans la BDD
        $titre->titre = $request->get('titre');
        if ($request->file('filepath')) {
            $audio = new Mp3Info($request->file('filepath')); // recuperation de la durée via Mp3info
            $titre->duree_secondes = round($audio->duration);
    
            Storage::disk('public')->delete($titre->filepath); //delete de l'ancien fichier du storage
    
            $filename = time() .'.'. $request->titre .'.'. $request->file('filepath')->getClientOriginalExtension(); // nom du fichier upload dans le storage
    
            $titre->filepath  = $request->file('filepath')->storeAs( //upload du fichier dans le storage
                'musics', //nom du dossier de stockage
                $filename, // nom du fichier
                'public' // public ou local ou autre
            );
        }
        
        $titre->save(); // sauvegarde dans la BDD

        $albumPivot = $titre->appartientAlbums->first()->pivot;
        $albumPivot->version_morceau_id = $titre->id;
        $albumPivot->album_id = $request->get('album_id');
        $albumPivot->numero_piste = $request->get('numero_piste');
        $albumPivot->save(); // sauvegarde dans la BDD
        return redirect('titres/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function destroy(version_morceau $titre)
    {
        // fonction permettant de tester avant d'executer via un test de transaction. Tout est testé jusqu'au bon déroulement : si ca fonctionne alors ça save, sinon ça rollback
        DB::beginTransaction();

        try{
            $titre_path = $titre->filepath; //recupération du fichier existant
            if ($titre->filepath) { //condition pour vérifier s'il y a un fichier dans le storage
                Storage::disk('public')->delete($titre_path); //delete du fichier existant dans le storage
            }
            $titre->delete(); //delete du fichier dans la BDD
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect('titres/index'); // et redirige ver la page index
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('titres/index'); //renvoi vers la page index
    }
}