<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function genreVersions() {
        return $this->belongsToMany(Version_morcau::class, 'genre_version_morceau', 'genre_id', 'version_morceau_id');
    }

    public function genreAlbums() {
        return $this->belongsToMany(Album::class, 'genre_album', 'genre_id', 'album_id');
    }

    public function genreGroupes() {
        return $this->belongsToMany(Groupe::class, 'genre_groupe', 'genre_id', 'groupe_id');
    }

    public function genreArtistes() {
        return $this->belongsToMany(Artiste::class, 'genre_artiste', 'genre_id', 'artiste_id');
    }
}
