<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artiste extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function intervientVersion_morceaus() {
        return $this->belongsToMany(Version_morceau::class, 'intervient_version_morceau', 'artiste_id', 'version_morceau_id')->withPivot('role');
    }

    public function artistesGenres() {
        return $this->belongsToMany(Genre::class, 'genre_artiste', 'artiste_id', 'genre_id');
    }

    public function membreGroupes() {
        return $this->belongsToMany(Groupe::class, 'est_membres', 'artiste_id', 'groupe_id');
    }
}
