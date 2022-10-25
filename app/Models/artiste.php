<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artiste extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function intervient() { // association N/N avec table intervient_vesion_morceaus
        return $this->belongsToMany(Version_morceau::class, 'intervient_version_morceaus', 'artiste_id', 'version_morceau_id')->withPivot('role');
    }

    public function artistesGenres() { // association N/N avec table genre_artiste
        return $this->belongsToMany(Genre::class, 'genre_artistes', 'artiste_id', 'genre_id');
    }

    public function membreGroupes() { // association N/N avec table groupe
        return $this->belongsToMany(Groupe::class, 'est_membres', 'artiste_id', 'groupe_id');
    }
}
