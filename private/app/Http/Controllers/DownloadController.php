<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\DownloadPost;
use App\AnimePost;
class DownloadController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function buildDownload($id_post)
	{
		//$data = DownloadPost::where('id_post','=',$id_post);
		$data = AnimePost::where('id','=',$id_post)->first();
			
		return view('Admin\Episode\addDownload')->with('data_anime',$data);
	}

	public function getDownload($id_post)
	{
		$data = DownloadPost::where('id_post','=',$id_post)->get();
		foreach ($data as $d) {
			$d['action'] = "<div class=\"btn-group\">
		                      <button type=\"button\" class=\"btn btn-info btn-flat\">Action</button>
		                      <button type=\"button\" class=\"btn btn-info btn-flat dropdown-toggle\" data-toggle=\"dropdown\">
		                        <span class=\"caret\"></span>
		                        <span class=\"sr-only\">Toggle Dropdown</span>
		                      </button>
		                      <ul class=\"dropdown-menu\" role=\"menu\">
		                        <li><a data-id='$d->id' href=\"#\" data-toggle=\"modal\" class=\"edit-btn\" data-target=\"#edit-form\">Edit</a></li>
		                        <li class=\"divider\"></li>
		                        <li><a data-id='$d->id' href=\"#\" data-toggle=\"modal\" class=\"link-delete\" data-target=\"#delete-form\" >Delete</a></li>
		                      </ul>
		                    </div>";
		}
		$data = array('data' => $data);
		
		return response()->json($data);
	}

	public function insertDownload()
	{
		$newLink = new DownloadPost;
		$newLink->id_post = Input::get('id_post');
		$newLink->title = Input::get('title');
		$newLink->r480p = Input::get('r480p');
		$newLink->r720p = Input::get('r720p');
		$newLink->blueray = Input::get('blueray');
		$newLink->direct_link = Input::get('direct_link');
		$newLink->save();
	}

	public function updateDownload($id)
	{
		$editedLink = DownloadPost::where('id','=',$id)->first();
		$editedLink->title = Input::get('title');
		$editedLink->r480p = Input::get('r480p');
		$editedLink->r720p = Input::get('r720p');
		$editedLink->blueray = Input::get('blueray');
		$editedLink->direct_link = Input::get('direct_link');
		$editedLink->save();

	}

	public function selectedDownload()
	{
		$id = Input::get('id');
		$data = DownloadPost::where('id','=',$id)->first();
		
		return response()->json($data);
	}

	public function destroyDownload()
	{
		$id = Input::get('id');
		DownloadPost::destroy($id);
		exit();
	}
}
