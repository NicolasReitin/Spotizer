<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class version_morceau extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function Morceaus() {
        return $this->belongsTo(Morceau::class, 'morceau_id', 'id');
    }

    public function contientPlaylists() {
        return $this->belongsToMany(Playlist::class, 'contient_morceau', 'version_morceau_id', 'playlist_id')->withPivot('name','description');
    }

    public function appartientAlbums() {
        return $this->belongsToMany(Album::class, 'appartient_album', 'version_morceau_id', 'album_id')->withPivot('titre','date_sortie');
    }

    public function intervientArtiste() {
        return $this->belongsToMany(Artiste::class, 'intervient_version_morceau', 'version_morceau_id', 'artiste_id')->withPivot('pseudo','name','first_name','date_naissance','date_deces');
    }

    public function versionGenre() {
        return $this->belongsToMany(Genre::class, 'genre_version_morceau', 'version_morceau_id', 'genre_id')->withPivot('genre');
    }

}
