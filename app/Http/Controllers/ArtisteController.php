<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Groupe;
use App\Models\Artiste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreartisteRequest;
use App\Http\Requests\UpdateartisteRequest;

class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artistes.index', ['artistes' => Artiste::inRandomOrder()->get()] ); //renvoi vers la page index avec tous les artistes récupérés de la bdd dans la function $artiste
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::all(); //récupère tous les groupes de la BDD dans une fonction
        return view('artistes.create', ['groupes' => $groupes]); // et renvoi vers la page create avec les fonctions précédentes en paramètres
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreartisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreartisteRequest $request)
    {
        $all_params = []; //création d'une fonction array vide
        // ajout des valeurs rentrées dans le formulaire de création dans la fonction array $all_params
        $all_params['pseudo'] = $request->pseudo; 
        $all_params['name'] = $request->name;
        $all_params['first_name'] = $request->first_name;
        $all_params['date_naissance'] = $request->date_naissance;
        $all_params['date_deces'] = $request->date_deces;
        if ($request->photo) { //condition pour vérifier qu'il y a une photo
            $all_params['photo'] = $request->photo;
        }
        if ($request->file('imageUpload')) { //condition pour vérifier qu'il y a une image upload
            $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
            $all_params['upload'] = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
            'photo', //nom du dossier de stockage
            $filename, // nom du fichier
            'public' // public ou local ou autre
        );
        }

        Artiste::create($all_params); // envoi des valeurs précédentes dans la BDD de la table Album
        return redirect('artistes/index'); // redirection vers la page index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function show(artiste $artiste)
    {
        $groupe = $artiste->membreGroupes; // recupère du groupe de l'artiste via le model et la table d'association
        $titres = $artiste->intervient; //recupère les titres de l'artiste via le model et les tables d'association
        return view('artistes.show', compact('artiste', 'groupe', 'titres')); // renvoi vers la page show avec les fonction appelées au dessus afin de les réutiliser dans la view directement

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(artiste $artiste)
    {
        return view('artistes.edit', ['artiste' => $artiste]); // redirection vers la page edit et son formulaire
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateartisteRequest  $request
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateartisteRequest $request, artiste $artiste)
    {
        //récupération des valeurs du formulaire pour les update dans la BDD
        $artiste->pseudo = $request->get('pseudo');
        $artiste->name = $request->get('name');
        $artiste->first_name = $request->get('first_name');
        $artiste->date_naissance = $request->get('date_naissance');
        $artiste->date_deces = $request->get('date_deces');
        if ($request->get('photo')) { //condition pour vérifier qu'il y a une photo
            $artiste->photo = $request->get('photo');
        }
        
        if ($request->file('imageUpload')) { //condition pour vérifier qu'il y a une image upload
            $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
            $artiste->upload = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
            'photo', //nom du dossier de stockage
            $filename, // nom du fichier
            'public' // public ou local ou autre
        );
        }
        

        $artiste->save(); // sauvegarde dans la BDD
        return redirect('artistes/index'); // redirige vers la page index.albums
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(artiste $artiste)
    {
        // fonction permettant de tester avant d'executer via un test de transaction. Tout est testé jusqu'au bon déroulement : si ca fonctionne alors ça save, sinon ça rollback
        DB::beginTransaction();

        try{
            $picture_path = $artiste->upload; //recupération du fichier existant
            if ($artiste->upload) { //condition pour vérifier s'il y a un fichier dans le storage
                Storage::disk('public')->delete($picture_path); //delete du fichier existant dans le storage
            }
            
            $artiste->delete(); //delete du fichier dans la BDD
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect(route('artistes.show', compact('artiste'))); // et redirige ver la page show
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('artistes/index'); //renvoi vers la page index
    } 
}
