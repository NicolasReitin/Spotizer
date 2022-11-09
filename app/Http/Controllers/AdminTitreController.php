<?php

namespace App\Http\Controllers;

use App\Models\AdminTitre;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAdminTitreRequest;
use App\Http\Requests\UpdateAdminTitreRequest;

class AdminTitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titres = DB::table('version_morceaus')->paginate(20); // paginate sur la table artistes 
        return view('auth/Dashboard_Admin/Titres/index', compact('titres')); //afficher la view index titres du dashboard admin
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
     * @param  \App\Http\Requests\StoreAdminTitreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminTitreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminTitre  $adminTitre
     * @return \Illuminate\Http\Response
     */
    public function show(AdminTitre $adminTitre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminTitre  $adminTitre
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminTitre $adminTitre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminTitreRequest  $request
     * @param  \App\Models\AdminTitre  $adminTitre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminTitreRequest $request, AdminTitre $adminTitre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminTitre  $adminTitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminTitre $adminTitre)
    {
        //
    }
}
