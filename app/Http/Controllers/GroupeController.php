<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Groupe;
use App\Models\Artiste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoregroupeRequest;
use App\Http\Requests\UpdategroupeRequest;
use Exception;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groupes.index', ['groupes' => Groupe::all()]); //renvoi vers la page index avec tous les groupes récupérés de la bdd dans la function $groupe
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groupes.create'); // renvoi vers la page create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregroupeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregroupeRequest $request)
    {
        $all_params = []; //création d'une fonction array vide
        // ajout des valeurs rentrées dans le formulaire de création dans la fonction array $all_params
        $all_params['name'] = $request->name;
        $all_params['nationalite'] = $request->nationalite;
        $all_params['date_creation'] = $request->date_creation;
        if ($request->photo){ //condition pour vérifier qu'il y a une photo
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

        Groupe::create($all_params); // envoi des valeurs précédentes dans la BDD de la table Groupe
        return redirect('groupes/index'); // redirection vers la page index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(groupe $groupe)
    {
        $albums = $groupe->produitAlbums()->orderBy('date_de_sortie', 'asc')->get(); // recupère les albums du roupe via le model et la table d'association et les classes par date de sorti
        $artistes = $groupe->membreArtistes; // recupère des artistes du groupe via le model et la table d'association
        return view('groupes.show', compact('groupe', 'albums', 'artistes')); // renvoi vers la page show avec les fonction appelés au dessus afin de les réutiliser dans la view directement
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(groupe $groupe)
    {
        return view('groupes.edit', ['groupe' => $groupe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategroupeRequest  $request
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategroupeRequest $request, groupe $groupe)
    {
        //récupération des valeurs du formulaire pour les update dans la BDD
        $groupe->name = $request->get('name');
        $groupe->nationalite = $request->get('nationalite');
        $groupe->date_creation = $request->get('date_creation');
        if ($request->photo){ //condition pour vérifier qu'il y a une photo
            $groupe->photo = $request->get('photo');
        }
        if ($request->file('imageUpload')) { //condition pour vérifier qu'il y a une image upload
            $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
            $groupe->upload = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
                'photo', //nom du dossier de stockage
                $filename, // nom du fichier
                'public' // public ou local ou autre
            );
        }
        
        $groupe->save(); // sauvegarde dans la BDD
        return redirect('groupes/index');  // redirige vers la page index.groupes
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(groupe $groupe)
    {
        // fonction permettant de tester avant d'executer via un test de transaction. Tout est testé jusqu'au bon déroulement : si ca fonctionne alors ça save, sinon ça rollback
        DB::beginTransaction();

        try{
            $picture_path = $groupe->upload; //recupération du fichier existant
            if ($groupe->upload) { //condition pour vérifier s'il y a un fichier dans le storage
                Storage::disk('public')->delete($picture_path); //delete du fichier existant dans le storage
            }
            
            $groupe->delete(); //delete du fichier dans la BDD
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect(route('groupes.show', compact('groupe'))); // et redirige ver la page show
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('groupes/index');  //renvoi vers la page index
    }
}


