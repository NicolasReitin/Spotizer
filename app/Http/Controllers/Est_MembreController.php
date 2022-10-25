<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Artiste;
use App\Models\Est_Membre;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Storeest_membreRequest;
use App\Http\Requests\Updateest_membreRequest;

class Est_MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(groupe $groupe)
    {

        return view('groupes.addArtiste', ['groupe' => $groupe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeest_membreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeest_membreRequest $request, groupe $groupe)
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
        $lastArtiste = Artiste::create($all_params); // envoi des valeurs précédentes dans la BDD de la table Artiste + création d'une fonction enregistrant le dernier artiste créé afin de récupérer les valeurs de celui-ci

        $groupeIdParam = $groupe->id; 

        $all_params2 = []; //création d'une fonction array vide
        // ajout des valeurs rentrées dans le formulaire de création dans la fonction array $all_params2
        $all_params2['artiste_id'] = $lastArtiste->id;
        $all_params2['groupe_id'] = $groupeIdParam;
        // dd($all_params2);
        Est_Membre::create($all_params2); // envoi des valeurs précédentes dans la BDD de la table Est_membre

        $artistes = $groupe->membreArtistes; 
        $albums = $groupe->produitAlbums()->orderBy('date_de_sortie', 'asc')->get();
        return redirect('groupes/show/'.$groupeIdParam);
        // return redirect('groupes/show', ['groupe' => $groupe, 'artistes' => $artistes, 'albums' => $albums]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function show(est_membre $est_membre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function edit(est_membre $est_membre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateest_membreRequest  $request
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function update(Updateest_membreRequest $request, est_membre $est_membre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function destroy(est_membre $est_membre)
    {
        
    }
}
