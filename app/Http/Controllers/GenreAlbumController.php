<?php

namespace App\Http\Controllers;

use App\Models\genre_album;
use App\Http\Requests\Storegenre_albumRequest;
use App\Http\Requests\Updategenre_albumRequest;

class GenreAlbumController extends Controller
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
     * @param  \App\Http\Requests\Storegenre_albumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storegenre_albumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre_album  $genre_album
     * @return \Illuminate\Http\Response
     */
    public function show(genre_album $genre_album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre_album  $genre_album
     * @return \Illuminate\Http\Response
     */
    public function edit(genre_album $genre_album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updategenre_albumRequest  $request
     * @param  \App\Models\genre_album  $genre_album
     * @return \Illuminate\Http\Response
     */
    public function update(Updategenre_albumRequest $request, genre_album $genre_album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre_album  $genre_album
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre_album $genre_album)
    {
        //
    }
}
