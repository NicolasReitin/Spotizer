<?php

namespace App\Http\Controllers;

use App\Models\genre_groupe;
use App\Http\Requests\Storegenre_groupeRequest;
use App\Http\Requests\Updategenre_groupeRequest;

class GenreGroupeController extends Controller
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
     * @param  \App\Http\Requests\Storegenre_groupeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storegenre_groupeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre_groupe  $genre_groupe
     * @return \Illuminate\Http\Response
     */
    public function show(genre_groupe $genre_groupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre_groupe  $genre_groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(genre_groupe $genre_groupe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updategenre_groupeRequest  $request
     * @param  \App\Models\genre_groupe  $genre_groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Updategenre_groupeRequest $request, genre_groupe $genre_groupe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre_groupe  $genre_groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre_groupe $genre_groupe)
    {
        //
    }
}
