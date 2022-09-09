<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupeController;

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


// --------------------------------------- Routes Albums ---------------------------------------------------



// --------------------------------------- Routes Artistes ---------------------------------------------------



// --------------------------------------- Routes Playlists ---------------------------------------------------
