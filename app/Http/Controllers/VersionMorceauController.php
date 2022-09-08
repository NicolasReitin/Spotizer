<?php

namespace App\Http\Controllers;

use App\Models\version_morceau;
use App\Http\Requests\Storeversion_morceauRequest;
use App\Http\Requests\Updateversion_morceauRequest;

class VersionMorceauController extends Controller
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
     * @param  \App\Http\Requests\Storeversion_morceauRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeversion_morceauRequest $request)
    {
        //
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
    public function destroy(version_morceau $version_morceau)
    {
        //
    }
}
