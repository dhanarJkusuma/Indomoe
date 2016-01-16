<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadPost extends Model
{
    protected $table= 'download_anime';
 	
 	public function Episode()
 	{
 		return $this->belongsTo('App\AnimePost','id_post','id');
 	}

}
