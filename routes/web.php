<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\Est_MembreController;
use App\Http\Controllers\Version_morceauController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --------------------------------------- Routes Groupes ---------------------------------------------------
Route::get('groupes/index', [GroupeController::class, "index"])->name('groupes.index');

Route::get('groupes/create', [GroupeController::class, "create"])->name('groupes.create');

Route::post('groupes/store', [GroupeController::class, "store"])->name('groupes.store');

Route::get('groupes/show/{groupe}', [GroupeController::class, "show"])->name('groupes.show');

Route::get('groupes/edit/{groupe}', [GroupeController::class, "edit"])->name('groupes.edit');

Route::put('groupes/update/{groupe}', [GroupeController::class, "update"])->name('groupes.update');

Route::delete('groupes/delete/{groupe}', [GroupeController::class, "destroy"])->name('groupes.delete');

// Route::get('groupes.addArtiste/{groupe}', [GroupeController::class, "addArtiste"])->name('groupes.addArtiste');


// --------------------------------------- Routes Albums ---------------------------------------------------
Route::get('albums/index', [AlbumController::class, "index"])->name('albums.index');

Route::get('albums/create', [AlbumController::class, "create"])->name('albums.create');

Route::post('albums/store', [AlbumController::class, "store"])->name('albums.store');

Route::get('albums/show/{album}', [AlbumController::class, "show"])->name('albums.show');

Route::get('albums/edit/{album}', [AlbumController::class, "edit"])->name('albums.edit');

Route::put('albums/update/{album}', [AlbumController::class, "update"])->name('albums.update');

Route::delete('albums/delete/{album}', [AlbumController::class, "destroy"])->name('albums.delete');


// --------------------------------------- Routes Artistes ---------------------------------------------------
Route::get('artistes/index', [ArtisteController::class, "index"])->name('artistes.index');

Route::get('artistes/create', [ArtisteController::class, "create"])->name('artistes.create');

Route::post('artistes/store', [ArtisteController::class, "store"])->name('artistes.store');

Route::get('artistes/show/{artiste}', [ArtisteController::class, "show"])->name('artistes.show');

Route::get('artistes/edit/{artiste}', [ArtisteController::class, "edit"])->name('artistes.edit');

Route::put('artistes/update/{artiste}', [ArtisteController::class, "update"])->name('artistes.update');

Route::delete('artistes/delete/{artiste}', [ArtisteController::class, "destroy"])->name('artistes.delete');


// --------------------------------------- Routes Titres ---------------------------------------------------
Route::get('titres/index', [Version_morceauController::class, "index"])->name('titres.index');

Route::get('titres/create', [Version_morceauController::class, "create"])->name('titres.create');

Route::post('titres/store', [Version_morceauController::class, "store"])->name('titres.store');

Route::get('titres/show/{titre}', [Version_morceauController::class, "show"])->name('titres.show');

Route::get('titres/edit/{titre}', [Version_morceauController::class, "edit"])->name('titres.edit');

Route::put('titres/update/{titre}', [Version_morceauController::class, "update"])->name('titres.update');

Route::delete('titres/delete/{titre}', [Version_morceauController::class, "destroy"])->name('titres.delete');


// --------------------------------------- Routes ajout artiste à un groupe ---------------------------------------------------
Route::get('groupes/addArtiste/create/{groupe}', [Est_MembreController::class, "create"])->name('addArtiste.create');

Route::post('groupes/addArtiste/store/{groupe}', [Est_MembreController::class, "store"])->name('addArtiste.store');

// --------------------------------------- Routes Genres ---------------------------------------------------
Route::get('genres/index', [GenreController::class, "index"])->name('genres.index');

Route::get('genres/create', [GenreController::class, "create"])->name('genres.create');

Route::post('genres/store', [GenreController::class, "store"])->name('genres.store');

Route::get('genres/show/{genre}', [GenreController::class, "show"])->name('genres.show');

Route::get('genres/edit/{genre}', [GenreController::class, "edit"])->name('genres.edit');

Route::put('genres/update/{genre}', [GenreController::class, "update"])->name('genres.update');

Route::delete('genres/delete/{genre}', [GenreController::class, "destroy"])->name('genres.delete');
