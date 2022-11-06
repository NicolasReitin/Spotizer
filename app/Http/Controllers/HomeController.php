<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version_morceau;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $titres = Version_morceau::with('intervientArtiste')->with('intervientArtiste.membreGroupes')->inRandomOrder()->get(); //récupère tous les titres de la BDD dans une fonction avec une association des tables artiste et groupe via les fonctions présentes dans les models
        // return view('titres.index', compact('titres')); //renvoi vers la page index avec la fonction $titres
        
        return view('home');
    }
}
