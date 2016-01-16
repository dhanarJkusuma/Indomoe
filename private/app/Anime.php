<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $table = 'anime';

    public function Episode()
    {
    	return $this->hasMany('App\AnimePost','id_anime');
    }

    public function MostWatched()
    {
    	return $this->hasOne('App\Most_watched');
    }
}
