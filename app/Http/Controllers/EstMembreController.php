<?php

namespace App\Http\Controllers;

use App\Models\est_membre;
use App\Http\Requests\Storeest_membreRequest;
use App\Http\Requests\Updateest_membreRequest;

class EstMembreController extends Controller
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
     * @param  \App\Http\Requests\Storeest_membreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeest_membreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function show(est_membre $est_membre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function edit(est_membre $est_membre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateest_membreRequest  $request
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function update(Updateest_membreRequest $request, est_membre $est_membre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\est_membre  $est_membre
     * @return \Illuminate\Http\Response
     */
    public function destroy(est_membre $est_membre)
    {
        //
    }
}
