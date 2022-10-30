<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoregenreRequest;
use App\Http\Requests\UpdategenreRequest;
use Termwind\Components\Dd;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::inRandomOrder()->get();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregenreRequest $request)
    {
        $all_params = []; //création d'une fonction array vide
        // ajout des valeurs rentrées dans le formulaire de création dans la fonction array $all_params
        $all_params['genre'] = $request->genre;
        // dd($all_params);
        Genre::create($all_params); // envoi des valeurs précédentes dans la BDD de la table Genre
        return redirect('genres/index'); // redirection vers la page index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(genre $genre)
    {
        $titresGenres = $genre->genreVersions()->get(); //récupère les titres du genre séléctionné
        $groupesGenres = $genre->genreGroupes()->get(); //récupère les groueps du genre séléctionné
        $artistesGenres = $genre->genreArtistes()->get(); //récupère les artistes du genre séléctionné
        $albumsGenres = $genre->genreAlbums()->get(); //récupère les albums du genre séléctionné
        return view('genres.show', compact('genre', 'titresGenres', 'groupesGenres', 'artistesGenres', 'albumsGenres')); // renvoi vers la page show avec les fonction appelés au dessus afin de les réutiliser dans la view directement
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(genre $genre)
    {
        return view('genres.edit', compact('genre'));  // redirection vers la page edit et son formulaire
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategenreRequest  $request
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategenreRequest $request, genre $genre)
    {
        //récupération des valeurs du formulaire pour les update dans la BDD
        $genre->genre = $request->get('genre');
        $genre->save();
        return redirect('genres/index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre $genre)
    {
        //delete du genre en BDD puis redirection sur la page index
        $genre->delete();
        return redirect('genres/index');
    }

    public function rand_color() { //fonction permettant de random la couleur des card des genres
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

}
