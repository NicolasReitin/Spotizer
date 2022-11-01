<?php

namespace App\Http\Controllers;

use App\Models\AdminAlbum;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAdminAlbumRequest;
use App\Http\Requests\UpdateAdminAlbumRequest;

class AdminAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = DB::table('albums')->paginate(25); // paginate sur la table albums 
        return view('auth/Dashboard_Admin/Albums/index', compact('albums')); //afficher la view index albums du dashboard admin
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
     * @param  \App\Http\Requests\StoreAdminAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminAlbumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminAlbum  $adminAlbum
     * @return \Illuminate\Http\Response
     */
    public function show(AdminAlbum $adminAlbum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminAlbum  $adminAlbum
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminAlbum $adminAlbum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminAlbumRequest  $request
     * @param  \App\Models\AdminAlbum  $adminAlbum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminAlbumRequest $request, AdminAlbum $adminAlbum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminAlbum  $adminAlbum
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminAlbum $adminAlbum)
    {
        //
    }
}
