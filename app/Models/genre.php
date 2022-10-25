<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function genreVersions() { // association N/N avec table genre_versions
        return $this->belongsToMany(Version_morcau::class, 'genre_version_morceaus', 'genre_id', 'version_morceau_id');
    }

    public function genreAlbums() { // association N/N avec table albums
        return $this->belongsToMany(Album::class, 'genre_albums', 'genre_id', 'album_id');
    }

    public function genreGroupes() { // association N/N avec table genre_groupes
        return $this->belongsToMany(Groupe::class, 'genre_groupes', 'genre_id', 'groupe_id');
    }

    public function genreArtistes() { // association N/N avec table artistes
        return $this->belongsToMany(Artiste::class, 'genre_artistes', 'genre_id', 'artiste_id');
    }
}
