<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version_morceau extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function contientPlaylists() { // association N/N avec table palylist
        return $this->belongsToMany(Playlist::class, 'contient_morceaus', 'version_morceau_id', 'playlist_id');
    }

    public function appartientAlbums() { // association N/N avec table appartient album
        return $this->belongsToMany(Album::class, 'appartient_albums', 'version_morceau_id', 'album_id')->withPivot('numero_piste');
    }

    public function intervientArtiste() { // association N/N avec intervientArtiste 
        return $this->belongsToMany(Artiste::class, 'intervient_version_morceaus', 'version_morceau_id', 'artiste_id')->withPivot('role');
    }

    public function versionGenre() { // association N/N avec table genre version_morceau
        return $this->belongsToMany(Genre::class, 'genre_version_morceaus', 'version_morceau_id', 'genre_id');
    }

}
