<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupe extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function produitAlbums() {
        return $this->hasMany(Album::class, 'groupe_id', 'id');
    }

    public function albumsGenres() {
        return $this->belongsToMany(Genre::class, 'genre_groupe', 'groupe_id', 'genre_id');
    }

    public function membreArtistes() {
        return $this->belongsToMany(Artiste::class, 'est_membre', 'groupe_id', 'artiste_id');
    }
}
