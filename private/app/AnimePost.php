<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimePost extends Model
{
    protected $table = 'post_anime';

    public function Download()
    {
    	return $this->hasMany('App\DownloadPost','id_post','id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User','createdBy');
    }

    public function Anime()
    {
    	return $this->belongsTo('App\Anime','id_anime');
    }
}
