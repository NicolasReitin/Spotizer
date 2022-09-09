<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Groupe;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoregroupeRequest;
use App\Http\Requests\UpdategroupeRequest;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groupes.index', ['groupes' => Groupe::all()]);
        dd('groupes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groupes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregroupeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregroupeRequest $request)
    {
        $all_params = [];
        $all_params['name'] = $request->name;
        $all_params['nationalite'] = $request->nationalite;
        $all_params['date_creation'] = $request->date_creation;
        $all_params['photo'] = $request->photo;
        // dd($all_params);
        Groupe::create($all_params);
        return redirect('groupes/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(groupe $groupe)
    {
        $albums = $groupe->produitAlbums()->orderBy('date_de_sortie', 'asc')->get();
        return view('groupes.show', ['groupe' => $groupe, 'albums' => $albums ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(groupe $groupe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategroupeRequest  $request
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategroupeRequest $request, groupe $groupe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(groupe $groupe)
    {
        //
    }
}
