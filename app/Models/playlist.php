<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function contientVersion_morceaus() {
        return $this->belongsToMany(Playlist::class, 'contient_morceau', 'playlist_id', 'version_morceau_id')->withPivot('titre','duree_secondes','filepath','extension' );
    }


}
