<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Anime;
use Illuminate\Support\Facades\Input;
class AnimeController extends Controller
{
	
	public function __construct()
	{


		return $this->middleware('auth');
	}

	public function anime()
	{
		return view('Admin/anime/anime');
	}

	public function getAllAnime()
	{
		$data = Anime::all();
		foreach ($data as $anime) 
		{
			$anime['cover'] = " <a href=\" $anime->cover \" target=\"__blank\"><button type=\"button\" class=\"btn btn-default\">
								<span class=\"glyphicon glyphicon-eye-open\" aria-hidden=\"true\"></span></button></a>";

			$anime['action'] = "<div class=\"btn-group\">
		                      <button type=\"button\" class=\"btn btn-info btn-flat\">Action</button>
		                      <button type=\"button\" class=\"btn btn-info btn-flat dropdown-toggle\" data-toggle=\"dropdown\">
		                        <span class=\"caret\"></span>
		                        <span class=\"sr-only\">Toggle Dropdown</span>
		                      </button>
		                      <ul class=\"dropdown-menu\" role=\"menu\">
		                        <li><a data-id='$anime->id' href=\"#\" data-toggle=\"modal\" class=\"edit-btn\" data-target=\"#edit-form\">Edit</a></li>
		                        <li class=\"divider\"></li>
		                        <li><a data-id='$anime->id' data-title='$anime->title' href=\"#\" data-toggle=\"modal\" class=\"link-delete\" data-target=\"#delete-form\" >Delete</a></li>
		                      </ul>
		                    </div>";
		}

		$anime_json = array('data' => $data);
		return response()->json($anime_json);
	}

	public function getAnime()
	{
		$id_anime = Input::get('id_anime');
		$data = Anime::find($id_anime);
		return response()->json($data);

	}


	public function addAnimeView()
	{
		return view('Admin/Anime/addAnime');

	}

	public function insertAnime(Request $request)
	{

		$anime = new Anime;		
		$anime->title = Input::get('title');
		$anime->category = Input::get('category');		

		$destination_path = base_path() . "/image_store/anime_cover";
      	$filename =$anime->title .'.'.$request->file('image')->getClientOriginalExtension();
      	
		$filename = str_replace(' ', '_', $filename);
      	$request->file('image')->move($destination_path, $filename);


	    $anime->cover =  url('private/image_store/anime_cover') . "/" . $filename;
	    $anime->studio = Input::get('studio');
	    $anime->rating = Input::get('rating');
	    $anime->description = Input::get('description');
	    $anime->season = Input::get('season');
	    $anime->publisher = Input::get('publisher');
	    $anime->year = Input::get('year');
	    $anime->status = Input::get('status');
	    $anime->save();
		return Input::get('category');
	}

	public function updateAnime($id)
	{
		$anime = Anime::where('id', '=', $id)->first();
  		$anime->title = Input::get('title');
  		$anime->category = Input::get('category');
  		$anime->studio = Input::get('studio');
  		$anime->rating = Input::get('rating');
  		$anime->description = Input::get('description');
  		$anime->season = Input::get('season');
  		$anime->publisher = Input::get('publisher');
	    $anime->year = Input::get('year');
	    $anime->status = Input::get('status');
  		$anime->save();
  		return $_POST['title'];
   	}

   	public function destroyAnime()
   	{
   		$id = Input::get('id_anime');
   		Anime::destroy($id);
   		exit();
   	}

}
