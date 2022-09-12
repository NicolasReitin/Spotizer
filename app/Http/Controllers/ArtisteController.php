<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Groupe;
use App\Models\artiste;
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
        return view('artistes.index', ['artistes' => Artiste::all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::all();
        return view('artistes.create', ['groupes' => $groupes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreartisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreartisteRequest $request)
    {
        $all_params = [];
        $all_params['pseudo'] = $request->pseudo;
        $all_params['name'] = $request->name;
        $all_params['first_name'] = $request->first_name;
        $all_params['date_naissance'] = $request->date_naissance;
        $all_params['date_deces'] = $request->date_deces;
        $all_params['photo'] = $request->photo;

        $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
        $all_params['upload'] = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
            'photo', //nom du dossier de stockage
            $filename, // nom du fichier
            'public' // public ou local ou autre
        );
        
        // dd($all_params);
        Artiste::create($all_params);
        return redirect('artistes/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function show(artiste $artiste)
    {
        $groupe = $artiste->membreGroupes;
        // dd($groupe);
        return view('artistes.show', ['artiste' => $artiste, 'groupe' => $groupe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(artiste $artiste)
    {
        return view('artistes.edit', ['artiste' => $artiste]);
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
        $artiste->pseudo = $request->get('pseudo');
        $artiste->name = $request->get('name');
        $artiste->first_name = $request->get('first_name');
        $artiste->date_naissance = $request->get('date_naissance');
        $artiste->date_deces = $request->get('date_deces');
        $artiste->photo = $request->get('photo');

        $filename = time() . '.' . $request->file('imageUpload')->extension(); // nom du fichier upload dans le storage
        $artiste->upload = $request->file('imageUpload')->storeAs( //upload du fichier dans le storage
            'photo', //nom du dossier de stockage
            $filename, // nom du fichier
            'public' // public ou local ou autre
        );

        $artiste->save();
        return redirect('artistes/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(artiste $artiste)
    {
        DB::beginTransaction();

        try{
            $picture_path = $artiste->upload;

            Storage::disk('public')->delete($picture_path);
            $artiste->delete();
        }
        catch(Exception $ex){
            DB::rollBack();
            return redirect(route('artistes.show', compact('artiste')));
        }
        DB::commit();
        return redirect('artistes/index');
    }
}
