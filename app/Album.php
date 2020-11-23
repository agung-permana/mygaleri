<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';

    public function photos() {
        return $this->hasMany('App\Galeri', 'album_id', 'id');
    }
}
