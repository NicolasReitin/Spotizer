<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\Groupe;
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
        return view('albums.index', ['albums' => Album::all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::all();
        return view('albums.create', ['groupes' => $groupes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorealbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorealbumRequest $request)
    {
        $all_params = [];
        $all_params['titre'] = $request->titre;
        $all_params['groupe_id'] = $request->groupe_id;
        $all_params['date_de_sortie'] = $request->date_de_sortie;
        $all_params['cover'] = $request->cover;
        // dd($all_params);
        Album::create($all_params);
        return redirect('albums/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(album $album)
    {
        return view('albums.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(album $album)
    {
        $groupes = Groupe::all();
        return view('albums.edit', ['album' => $album, 'groupes' => $groupes]);
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
        $album->titre = $request->get('titre');
        $album->groupe_id = $request->get('groupe_id');
        $album->date_de_sortie = $request->get('date_de_sortie');
        $album->cover = $request->get('cover');
        $album->save();
        return redirect('albums/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(album $album)
    {
        $album->delete();
        return redirect('albums/index');
    }
}
