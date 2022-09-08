<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class morceau extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function versionMorceaus() {
        return $this->hasMany(Version_morceau::class, 'version_morceau_id', 'id');
    }
}
