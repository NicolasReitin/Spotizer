<?php

namespace App\Http\Controllers;

use App\Models\AdminGroupe;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAdminGroupeRequest;
use App\Http\Requests\UpdateAdminGroupeRequest;

class AdminGroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes = DB::table('groupes')->paginate(25);// paginate sur la table groupes
        return view('auth/Dashboard_Admin/Groupes/index', compact('groupes')); //afficher la view index groupe du dashboard admin
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
     * @param  \App\Http\Requests\StoreAdminGroupeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminGroupeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminGroupe  $adminGroupe
     * @return \Illuminate\Http\Response
     */
    public function show(AdminGroupe $adminGroupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminGroupe  $adminGroupe
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminGroupe $adminGroupe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminGroupeRequest  $request
     * @param  \App\Models\AdminGroupe  $adminGroupe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminGroupeRequest $request, AdminGroupe $adminGroupe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminGroupe  $adminGroupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminGroupe $adminGroupe)
    {
        //
    }
}
