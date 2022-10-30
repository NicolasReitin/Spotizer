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
        return $this->belongsToMany(Version_morceau::class, 'genre_version_morceaus');
    }

    public function genreAlbums() { // association N/N avec table albums
        return $this->belongsToMany(Album::class, 'genre_albums');
    }

    public function genreGroupes() { // association N/N avec table genre_groupes
        return $this->belongsToMany(Groupe::class, 'genre_groupes');
    }

    public function genreArtistes() { // association N/N avec table artistes
        return $this->belongsToMany(Artiste::class, 'genre_artistes');
    }
}
