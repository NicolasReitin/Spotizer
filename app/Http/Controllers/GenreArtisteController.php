<?php

namespace App\Http\Controllers;

use App\Models\Genre_artiste;
use App\Http\Requests\Storegenre_artisteRequest;
use App\Http\Requests\Updategenre_artisteRequest;

class GenreArtisteController extends Controller
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
     * @param  \App\Http\Requests\Storegenre_artisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storegenre_artisteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre_artiste  $genre_artiste
     * @return \Illuminate\Http\Response
     */
    public function show(genre_artiste $genre_artiste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre_artiste  $genre_artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(genre_artiste $genre_artiste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updategenre_artisteRequest  $request
     * @param  \App\Models\genre_artiste  $genre_artiste
     * @return \Illuminate\Http\Response
     */
    public function update(Updategenre_artisteRequest $request, genre_artiste $genre_artiste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre_artiste  $genre_artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre_artiste $genre_artiste)
    {
        //
    }
}
