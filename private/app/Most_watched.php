<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Most_watched extends Model
{
    protected $table = 'most_watched';

    public function Anime()
    {
    	return $this->belongsTo('App\Anime','id_anime');
    }
}
