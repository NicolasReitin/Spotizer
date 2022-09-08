<?php

namespace App\Http\Controllers;

use App\Models\est_orchestre;
use App\Http\Requests\Storeest_orchestreRequest;
use App\Http\Requests\Updateest_orchestreRequest;

class EstOrchestreController extends Controller
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
     * @param  \App\Http\Requests\Storeest_orchestreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeest_orchestreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\est_orchestre  $est_orchestre
     * @return \Illuminate\Http\Response
     */
    public function show(est_orchestre $est_orchestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\est_orchestre  $est_orchestre
     * @return \Illuminate\Http\Response
     */
    public function edit(est_orchestre $est_orchestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateest_orchestreRequest  $request
     * @param  \App\Models\est_orchestre  $est_orchestre
     * @return \Illuminate\Http\Response
     */
    public function update(Updateest_orchestreRequest $request, est_orchestre $est_orchestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\est_orchestre  $est_orchestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(est_orchestre $est_orchestre)
    {
        //
    }
}
