<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimePost extends Model
{
    protected $table = 'post_anime';

    public function Download()
    {
    	return $this->hasMany('App\DownloadPost','id_post');
    }

}
