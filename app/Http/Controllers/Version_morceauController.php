<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Groupe;
use App\Models\Artiste;
use wapmorgan\Mp3Info\Mp3Info;
use App\Models\version_morceau;
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
        return view('titres.index', [
            'titres' => Version_morceau::with('intervientArtiste')->with('intervientArtiste.membreGroupes')->inRandomOrder()->get(),
            'album' => Version_morceau::with('appartientAlbums')->with('appartientAlbums')->get()
         ]);
        // return view('titres.index', ['titres' => Version_morceau::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistes = Artiste::all();
        $groupes = Groupe::all();
        $albums = Album::all();
        return view('titres.create', compact('artistes', 'groupes', 'albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeversion_morceauRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeversion_morceauRequest $request)
    {
        $all_params = [];
        $all_params['titre'] = $request->titre;
        // $all_params['duree_secondes'] = $request->duree_secondes;

        $filename = time() . '.' . $request->file('filepath')->extension(); // nom du fichier upload dans le storage
        $all_params['filepath'] = $request->file('filepath')->storeAs( //upload du fichier dans le storage
            'musics', //nom du dossier de stockage
            $filename, // nom du fichier
            'public' // public ou local ou autre
        );
        $audio = new Mp3Info($request->file('filepath')); // recuperation de la durée via Mp3info
        // dd($audio);
        $all_params['duree_secondes'] = round($audio->duration);
        $all_params['extension'] = $request->file('filepath')->extension();
        dd($all_params);

        $lastMorceauId = Version_morceau::create($all_params);
        // dd($lastMorceauId);
        // $lastMorceauId = DB::table('version_morceaus')->latest('id')->first();
      
        $all_params2 = [];
        $all_params2['version_morceau_id'] = $lastMorceauId->id;
        $all_params2['album_id'] = $request->album_id;
        $all_params2['numero_piste'] = $request->numero_piste;
        Appartient_album::create($all_params2);
        
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
        return view('titres.show', compact('titre'));
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
        // dd($titre->appartientAlbums->first());
        return view('titres.edit', compact('titre', 'albums'));
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
        $titre->titre = $request->get('titre');
        
        $audio = new Mp3Info($request->file('filepath')); // recuperation de la durée via Mp3info
        $titre->duree_secondes = round($audio->duration);
        // dd($titre);

        Storage::disk('public')->delete($titre->filepath);

        $filename = time() . '.' . $request->file('filepath')->getClientOriginalExtension(); // nom du fichier upload dans le storage
        // dd($request->file('filepath')->getErrorMessage());

        $titre->filepath  = $request->file('filepath')->storeAs( //upload du fichier dans le storage
            'musics', //nom du dossier de stockage
            $filename, // nom du fichier
            'public' // public ou local ou autre
        );

        // dd($titre);
        // $titre->filepath = 
        $titre->save();
        

        $albumPivot = $titre->appartientAlbums->first()->pivot;
        $albumPivot->version_morceau_id = $titre->id;
        $albumPivot->album_id = $request->get('album_id');
        $albumPivot->numero_piste = $request->get('numero_piste');
        $albumPivot->save();
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
        Storage::disk('public')->delete($titre->filepath);
        $titre->delete();
        return redirect('titres/index');
    }
}
