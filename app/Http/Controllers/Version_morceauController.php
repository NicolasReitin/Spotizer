<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Groupe;
use App\Models\Artiste;
use App\Models\version_morceau;
use App\Models\Intervient_version_morceau;
use App\Models\Appartient_album;
use Illuminate\Support\Facades\DB;
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
        return view('titres.create', ['artistes' => $artistes, 'groupes' => $groupes, 'albums' => $albums]);
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
        $all_params['duree_secondes'] = $request->duree_secondes;
        // dd($all_params);
        Version_morceau::create($all_params);

        $lastMorceauId = DB::table('version_morceaus')->latest('id')->first();

        $all_params2 = [];
        $all_params2['version_morceau_id'] = $lastMorceauId->id;
        $all_params2['role'] = $request->role;;
        $all_params2['artiste_id'] = $request->artiste_id;
        // dd($all_params2);
        Intervient_version_morceau::create($all_params2);
        
        $all_params3 = [];
        $all_params3['version_morceau_id'] = $lastMorceauId->id;
        $all_params3['album_id'] = $request->album_id;
        // Appartient_album::create($all_params3);
        
        return redirect('titres/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function show(version_morceau $version_morceau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function edit(version_morceau $version_morceau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateversion_morceauRequest  $request
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function update(Updateversion_morceauRequest $request, version_morceau $version_morceau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\version_morceau  $version_morceau
     * @return \Illuminate\Http\Response
     */
    public function destroy(version_morceau $titre)
    {
        $titre->delete();
        return redirect('titres/index');
    }
}
