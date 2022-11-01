<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\myAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StoremyAccountRequest;
use App\Http\Requests\UpdatemyAccountRequest;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account/myAccount');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\myAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        // accès au formulaire permettant de modifier ses infos
        if ($request->getRequestUri() == '/myAccount/edit/'.Auth::user()->id) { //vérifier que l'id dans l'url correspond à l'id du user connecté sinon 403 car un user ne doit pas pouvoir modifier les infos d'un autre user
            return view('account/edit', compact('user'));
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemyAccountRequest  $request
     * @param  \App\Models\myAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemyAccountRequest $request, User $user)
    {
        //modifier ses info en tant que user
        $user->pseudo = $request->get('pseudo');
        $user->email = $request->get('email');
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password_confirmation'));
        }
        // dd($user);
        $user->save();
        return redirect('myAccount'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\myAccount  $myAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //delete son compte
        Auth::logout();
        $user->delete();
        
        return redirect('home'); //renvoi vers la page index
    }
}
