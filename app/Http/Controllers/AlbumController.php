<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Album;
use App\Models\Groupe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorealbumRequest;
use App\Http\Requests\UpdatealbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('albums.index', ['albums' => Album::all()] ); // affichage de tous les albums sur la page albums/index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::all(); //fonction regroupant tous les groupes
        return view('albums.create', ['groupes' => $groupes]); //affichage de la page de création d'un album avec la fonction de groupe pour choisir un groupe pour l'album
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorealbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorealbumRequest $request)
    {
        $all_params = []; //création d'une fonction array vide
        $all_params['titre'] = $request->titre; // ajout du titre de l'album via la valeur rentrée dans le formulaire de création
        $all_params['groupe_id'] = $request->groupe_id; // ajout de l'id du groupe via la valeur rentrée dans le formulaire de création
        $all_params['date_de_sortie'] = $request->date_de_sortie; // ajout de la date de sortie de l'album via la valeur rentrée dans le formulaire de création
        if ($request->cover) { //condition pour vérifier qu'il y a une cover
            $all_params['cover'] = $request->cover; // ajout de la couverture de la pochette de l'album via la valeur rentrée dans le formulaire de création
        }
        if ($request->file('imageUpload')) { //condition pour vérifier qu'il y a une image upload
            $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
            $all_params['upload'] = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
                'photo', //nom du dossier de stockage
                $filename, // nom du fichier
                'public' // public ou local ou autre
            );
        }
        
        // dd($all_params);
        Album::create($all_params); // envoi des valeurs précédentes dans la BDD de la table Album
        return redirect('albums/index'); // redirection vers la page index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(album $album)
    {
        $groupe = $album->produitGroupes; // recupère  du groupe de l'ablum via le model et la table d'association
        $artistes = $groupe->membreArtistes; //recupère les artistes du groupe de l'ablum via le model et les tables d'association
        return view('albums.show', compact('album', 'groupe', 'artistes')); // renvoi vers la page show avec les fonction appelés au dessus afin de les réutiliser dans la view directement
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(album $album)
    {
        $groupes = Groupe::all(); //fonction regroupant tous les groupes
        return view('albums.edit', ['album' => $album, 'groupes' => $groupes]); // redirection vers la page edit et son formulaire avec en parametre les valeurs des fonctions ci-dessus
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatealbumRequest  $request
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatealbumRequest $request, album $album)
    {
        //récupération des valeurs du formulaire pour les update dans la BDD
        $album->titre = $request->get('titre'); 
        $album->groupe_id = $request->get('groupe_id');
        $album->date_de_sortie = $request->get('date_de_sortie');
        if ($request->get('cover')) { //condition pour vérifier qu'il y a une cover
            $album->cover = $request->get('cover');
        }
        
        if ($request->file('imageUpload')) { //condition pour vérifier qu'il y a une image upload
            $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
            $album->upload  = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
            'photo', //nom du dossier de stockage
            $filename, // nom du fichier
            'public' // public ou local ou autre
        );
        }
        
        
        $album->save(); // sauvegarde dans la BDD
        return redirect('albums/index'); // redirige vers la page index.albums
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(album $album)
    {
        // fonction permettant de tester avant d'executer via un test de transaction. Tout est testé jusqu'au bon déroulement : si ca fonctionne alors ça save, sinon ça rollback
        DB::beginTransaction();

        try{
            $picture_path = $album->upload; //recupération du fichier existant
            if ($album->upload) {
                Storage::disk('public')->delete($picture_path); //delete du fichier existant dans le storage
            }
            
            $album->delete();  //delete du fichier dans la BDD
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect(route('albums.show', compact('album'))); // et redirige ver la page show
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('albums/index'); //renvoi vers la page index

    }
}
