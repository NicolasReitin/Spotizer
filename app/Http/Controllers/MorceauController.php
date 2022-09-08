<?php

namespace App\Http\Controllers;

use App\Models\morceau;
use App\Http\Requests\StoremorceauRequest;
use App\Http\Requests\UpdatemorceauRequest;

class MorceauController extends Controller
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
     * @param  \App\Http\Requests\StoremorceauRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremorceauRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\morceau  $morceau
     * @return \Illuminate\Http\Response
     */
    public function show(morceau $morceau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\morceau  $morceau
     * @return \Illuminate\Http\Response
     */
    public function edit(morceau $morceau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemorceauRequest  $request
     * @param  \App\Models\morceau  $morceau
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemorceauRequest $request, morceau $morceau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\morceau  $morceau
     * @return \Illuminate\Http\Response
     */
    public function destroy(morceau $morceau)
    {
        //
    }
}
