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
        return view('groupes.index', ['groupes' => Groupe::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groupes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregroupeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregroupeRequest $request)
    {
        // dd(Storage::disk('public')->exists($name));
        // die();
        $all_params = [];
        $all_params['name'] = $request->name;
        $all_params['nationalite'] = $request->nationalite;
        $all_params['date_creation'] = $request->date_creation;
        if ($request->photo){
            $all_params['photo'] = $request->photo;
        }
        if ($request->file('imageUpload')) {
            $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
            $all_params['upload'] = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
                'photo', //nom du dossier de stockage
                $filename, // nom du fichier
                'public' // public ou local ou autre
            );
        }

        

        // dd($all_params);
        Groupe::create($all_params);
        return redirect('groupes/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(groupe $groupe)
    {
        $albums = $groupe->produitAlbums()->orderBy('date_de_sortie', 'asc')->get();
        $artistes = $groupe->membreArtistes;
        return view('groupes.show', compact('groupe', 'albums', 'artistes'));
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
        $groupe->name = $request->get('name');
        $groupe->nationalite = $request->get('nationalite');
        $groupe->date_creation = $request->get('date_creation');
        if ($request->photo){
            $groupe->photo = $request->get('photo');
        }
        if ($request->file('imageUpload')) {
            $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
            $groupe->upload = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
                'photo', //nom du dossier de stockage
                $filename, // nom du fichier
                'public' // public ou local ou autre
            );
        }
        // dd($groupe);
        $groupe->save();
        return redirect('groupes/index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(groupe $groupe)
    {
        DB::beginTransaction();

        try{
            $picture_path = $groupe->upload;

            Storage::disk('public')->delete($picture_path);
            $groupe->delete();
        }
        catch(Exception $ex){
            DB::rollBack();
            return redirect(route('groupes.show', compact('groupe')));
        }
        DB::commit();
        return redirect('groupes/index');

    }
    
}


