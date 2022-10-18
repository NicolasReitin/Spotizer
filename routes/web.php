<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

Route::middleware(['auth', 'role:admin'])->name('dashboard')->group(function (){
    Route::get('/private', function () {
        return view('auth/dashboard');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --------------------------------------- Routes Groupes ---------------------------------------------------
Route::get('groupes/index', [GroupeController::class, "index"])->name('groupes.index');

Route::get('groupes/create', [GroupeController::class, "create"])->name('groupes.create')->middleware(['role:admin']);

Route::post('groupes/store', [GroupeController::class, "store"])->name('groupes.store')->middleware(['role:admin']);

Route::get('groupes/show/{groupe}', [GroupeController::class, "show"])->name('groupes.show');

Route::get('groupes/edit/{groupe}', [GroupeController::class, "edit"])->name('groupes.edit')->middleware(['role:admin']);

Route::put('groupes/update/{groupe}', [GroupeController::class, "update"])->name('groupes.update')->middleware(['role:admin']);

Route::delete('groupes/delete/{groupe}', [GroupeController::class, "destroy"])->name('groupes.delete')->middleware(['role:admin']);

// Route::get('groupes.addArtiste/{groupe}', [GroupeController::class, "addArtiste"])->name('groupes.addArtiste');


// --------------------------------------- Routes Albums ---------------------------------------------------
Route::get('albums/index', [AlbumController::class, "index"])->name('albums.index');

Route::get('albums/create', [AlbumController::class, "create"])->name('albums.create')->middleware(['role:admin']);

Route::post('albums/store', [AlbumController::class, "store"])->name('albums.store')->middleware(['role:admin']);

Route::get('albums/show/{album}', [AlbumController::class, "show"])->name('albums.show');

Route::get('albums/edit/{album}', [AlbumController::class, "edit"])->name('albums.edit')->middleware(['role:admin']);

Route::put('albums/update/{album}', [AlbumController::class, "update"])->name('albums.update')->middleware(['role:admin']);

Route::delete('albums/delete/{album}', [AlbumController::class, "destroy"])->name('albums.delete')->middleware(['role:admin']);


// --------------------------------------- Routes Artistes ---------------------------------------------------
Route::get('artistes/index', [ArtisteController::class, "index"])->name('artistes.index');

Route::get('artistes/create', [ArtisteController::class, "create"])->name('artistes.create')->middleware(['role:admin']);

Route::post('artistes/store', [ArtisteController::class, "store"])->name('artistes.store')->middleware(['role:admin']);

Route::get('artistes/show/{artiste}', [ArtisteController::class, "show"])->name('artistes.show');

Route::get('artistes/edit/{artiste}', [ArtisteController::class, "edit"])->name('artistes.edit')->middleware(['role:admin']);

Route::put('artistes/update/{artiste}', [ArtisteController::class, "update"])->name('artistes.update')->middleware(['role:admin']);

Route::delete('artistes/delete/{artiste}', [ArtisteController::class, "destroy"])->name('artistes.delete')->middleware(['role:admin']);


// --------------------------------------- Routes Titres ---------------------------------------------------
Route::get('titres/index', [Version_morceauController::class, "index"])->name('titres.index');

Route::get('titres/create', [Version_morceauController::class, "create"])->name('titres.create')->middleware(['role:admin']);

Route::post('titres/store', [Version_morceauController::class, "store"])->name('titres.store')->middleware(['role:admin']);

Route::get('titres/show/{titre}', [Version_morceauController::class, "show"])->name('titres.show');

Route::get('titres/edit/{titre}', [Version_morceauController::class, "edit"])->name('titres.edit')->middleware(['role:admin']);

Route::put('titres/update/{titre}', [Version_morceauController::class, "update"])->name('titres.update')->middleware(['role:admin']);

Route::delete('titres/delete/{titre}', [Version_morceauController::class, "destroy"])->name('titres.delete')->middleware(['role:admin']);


// --------------------------------------- Routes ajout artiste à un groupe ---------------------------------------------------
Route::get('groupes/addArtiste/create/{groupe}', [Est_MembreController::class, "create"])->name('addArtiste.create')->middleware(['role:admin']);

Route::post('groupes/addArtiste/store/{groupe}', [Est_MembreController::class, "store"])->name('addArtiste.store')->middleware(['role:admin']);

// --------------------------------------- Routes Genres ---------------------------------------------------
Route::get('genres/index', [GenreController::class, "index"])->name('genres.index');

Route::get('genres/create', [GenreController::class, "create"])->name('genres.create')->middleware(['role:admin']);

Route::post('genres/store', [GenreController::class, "store"])->name('genres.store')->middleware(['role:admin']);

Route::get('genres/show/{genre}', [GenreController::class, "show"])->name('genres.show');

Route::get('genres/edit/{genre}', [GenreController::class, "edit"])->name('genres.edit')->middleware(['role:admin']);

Route::put('genres/update/{genre}', [GenreController::class, "update"])->name('genres.update')->middleware(['role:admin']);

Route::delete('genres/delete/{genre}', [GenreController::class, "destroy"])->name('genres.delete')->middleware(['role:admin']);


// --------------------------------------- Routes Autres ---------------------------------------------------

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
