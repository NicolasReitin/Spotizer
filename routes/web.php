<?php

use App\Models\User;
use App\Models\Version_morceau;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\AdminTitreController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\Est_MembreController;
use App\Http\Controllers\AdminGroupeController;
use App\Http\Controllers\AdminArtisteController;
use App\Http\Controllers\Version_morceauController;
use App\Http\Controllers\SearchBarController;

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
    Route::get('/private', function () 
    {
        $users = User::orderBy('created_at', 'desc')->limit(5)->get();
        $titres = Version_morceau::orderBy('id', 'desc')->limit(5)->get();
        $users = User::orderBy('id', 'desc')->limit(5)->get();
        return view('Auth/Dashboard_Admin/dashboard', compact('users', 'titres'));
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// --------------------------------------- Routes SEARCHBAR ---------------------------------------------------
Route::get('/search', [SearchBarController::class, 'search'])->name('search');

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


//----------------------------------------------------------------ADMIN-------------------------------------------------------------
        //--------------------CRUD Route:: Admin Users-------------------------
Route::get('/private/users', [AdminUsersController::class, 'index'])->name('users')->middleware(['role:admin']);
Route::get('/private/users/create', [AdminUsersController::class, 'create'])->name('create.user')->middleware(['role:admin']);
Route::post('/private/users/create', [AdminUsersController::class, 'store'])->name('store.user')->middleware(['role:admin']);
Route::get('/private/users/show/{user}', [AdminUsersController::class, 'show'])->name('show.user')->middleware(['role:admin']);
Route::get('/private/users/edit/{user}', [AdminUsersController::class, 'edit'])->name('edit.user')->middleware(['role:admin']);
Route::put('/private/users/update/{user}', [AdminUsersController::class, 'update'])->name('update.user')->middleware(['role:admin']);
Route::delete('/private/users/delete/{user}', [AdminUsersController::class, 'destroy'])->name('delete.user')->middleware(['role:admin']);
        
        //--------------------CRUD Route:: Admin Groupe-------------------------
Route::get('/private/groupes', [AdminGroupeController::class, 'index'])->name('adminGroupes')->middleware(['role:admin']);
Route::get('/private/groupes/create', [AdminGroupeController::class, 'create'])->name('create.groupe')->middleware(['role:admin']);
Route::post('/private/groupes/create', [AdminGroupeController::class, 'store'])->name('store.groupe')->middleware(['role:admin']);
Route::get('/private/groupes/show/{groupe}', [AdminGroupeController::class, 'show'])->name('show.groupe')->middleware(['role:admin']);
Route::get('/private/groupes/edit/{groupe}', [AdminGroupeController::class, 'edit'])->name('edit.groupe')->middleware(['role:admin']);
Route::put('/private/groupes/update/{groupe}', [AdminGroupeController::class, 'update'])->name('update.groupe')->middleware(['role:admin']);
Route::delete('/private/groupes/delete/{groupe}', [AdminGroupeController::class, 'destroy'])->name('delete.groupe')->middleware(['role:admin']);
        
        //--------------------CRUD Route:: Admin Artiste-------------------------
Route::get('/private/artistes', [AdminArtisteController::class, 'index'])->name('adminArtistes')->middleware(['role:admin']);
Route::get('/private/artistes/create', [AdminArtisteController::class, 'create'])->name('create.artiste')->middleware(['role:admin']);
Route::post('/private/artistes/create', [AdminArtisteController::class, 'store'])->name('store.artiste')->middleware(['role:admin']);
Route::get('/private/artistes/show/{artiste}', [AdminArtisteController::class, 'show'])->name('show.artiste')->middleware(['role:admin']);
Route::get('/private/artistes/edit/{artiste}', [AdminArtisteController::class, 'edit'])->name('edit.artiste')->middleware(['role:admin']);
Route::put('/private/artistes/update/{artiste}', [AdminArtisteController::class, 'update'])->name('update.artiste')->middleware(['role:admin']);
Route::delete('/private/artistes/delete/{artiste}', [AdminArtisteController::class, 'destroy'])->name('delete.artiste')->middleware(['role:admin']);
        
        //--------------------CRUD Route:: Admin Titres-------------------------
Route::get('/private/titres', [AdminTitreController::class, 'index'])->name('adminTitres')->middleware(['role:admin']);
Route::get('/private/titres/create', [AdminTitreController::class, 'create'])->name('create.titre')->middleware(['role:admin']);
Route::post('/private/titres/create', [AdminTitreController::class, 'store'])->name('store.titre')->middleware(['role:admin']);
Route::get('/private/titres/show/{titre}', [AdminTitreController::class, 'show'])->name('show.titre')->middleware(['role:admin']);
Route::get('/private/titres/edit/{titre}', [AdminTitreController::class, 'edit'])->name('edit.titre')->middleware(['role:admin']);
Route::put('/private/titres/update/{titre}', [AdminTitreController::class, 'update'])->name('update.titre')->middleware(['role:admin']);
Route::delete('/private/titres/delete/{titre}', [AdminTitreController::class, 'destroy'])->name('delete.titre')->middleware(['role:admin']);
        

    