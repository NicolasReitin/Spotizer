<?php

namespace App\Http\Controllers;

use App\Models\AdminArtiste;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAdminArtisteRequest;
use App\Http\Requests\UpdateAdminArtisteRequest;

class AdminArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artistes = DB::table('artistes')->paginate(25);
        return view('auth/Dashboard_Admin/Artistes/index', compact('artistes'));
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
     * @param  \App\Http\Requests\StoreAdminArtisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminArtisteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminArtiste  $adminArtiste
     * @return \Illuminate\Http\Response
     */
    public function show(AdminArtiste $adminArtiste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminArtiste  $adminArtiste
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminArtiste $adminArtiste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminArtisteRequest  $request
     * @param  \App\Models\AdminArtiste  $adminArtiste
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminArtisteRequest $request, AdminArtiste $adminArtiste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminArtiste  $adminArtiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminArtiste $adminArtiste)
    {
        //
    }
}
