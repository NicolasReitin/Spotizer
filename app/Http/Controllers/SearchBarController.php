<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Groupe;
use App\Models\Artiste;
use App\Models\Version_morceau;
use Illuminate\Http\Request;

class SearchBarController extends Controller
{
    public function search()
    {
        $search = request('search');

        if (empty($search)) {
            return redirect()->back();
        }
        
        $results1 = Groupe::where('name', 'like', "%$search%")->get();

        $results2 = Artiste::where('pseudo', 'like', "%$search%")
        ->orWhere('name', 'like', "%$search%")
        ->orWhere('first_name', 'like', "%$search%")->get();

        $results3 = Album::where('titre', 'like', "%$search%")->get();

        $results4 = Version_morceau::where('titre', 'like', "%$search%")->get();

        return view('searchBar', compact('results1', 'results2', 'results3', 'results4'));
    }
}
