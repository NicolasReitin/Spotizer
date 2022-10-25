<?php

namespace App\Http\Controllers;

use App\Models\AdminUsers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAdminUsersRequest;
use App\Http\Requests\UpdateAdminUsersRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(25); // paginate sur la users artistes 
        return view('auth/Dashboard_Admin/Users/index', compact('users'));//afficher la view index users du dashboard admin
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
     * @param  \App\Http\Requests\StoreAdminUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminUsersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUsers $adminUsers)
    {
        return view('auth/Dashboard_Admin/Users/show', compact('adminUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUsers $adminUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminUsersRequest  $request
     * @param  \App\Models\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminUsersRequest $request, AdminUsers $adminUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminUsers $adminUsers)
    {
        //
    }
}
