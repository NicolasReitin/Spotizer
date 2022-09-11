<?php

namespace App\Http\Controllers;

use App\Models\genre_version_morceau;
use App\Http\Requests\Storegenre_version_morceauRequest;
use App\Http\Requests\Updategenre_version_morceauRequest;

class GenreVersion_MorceauController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storegenre_version_morceauRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storegenre_version_morceauRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre_version_morceau  $genre_version_morceau
     * @return \Illuminate\Http\Response
     */
    public function show(genre_version_morceau $genre_version_morceau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre_version_morceau  $genre_version_morceau
     * @return \Illuminate\Http\Response
     */
    public function edit(genre_version_morceau $genre_version_morceau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updategenre_version_morceauRequest  $request
     * @param  \App\Models\genre_version_morceau  $genre_version_morceau
     * @return \Illuminate\Http\Response
     */
    public function update(Updategenre_version_morceauRequest $request, genre_version_morceau $genre_version_morceau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre_version_morceau  $genre_version_morceau
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre_version_morceau $genre_version_morceau)
    {
        //
    }
}
