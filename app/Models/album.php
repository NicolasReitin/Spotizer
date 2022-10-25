<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function appartientVersion_morceaus() { // association N/N avec table version_morceaus
        return $this->belongsToMany(Version_morceau::class, 'appartient_albums', 'album_id', 'version_morceau_id')->withPivot('numero_piste');
    }

    public function produitGroupes() { // association 1/N avec table groupe
        return $this->belongsTo(Groupe::class, 'groupe_id', 'id');
    }

    public function albumsGenres() { // association N/N avec table genre
        return $this->belongsToMany(Genre::class, 'genre_albums', 'album_id', 'genre_id');
    }
}
