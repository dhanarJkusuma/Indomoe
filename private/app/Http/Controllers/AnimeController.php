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
		return view('Admin.Anime.anime');
	}

	public function getAllAnime()
	{
		$data = Anime::all();
		foreach ($data as $anime) 
		{
			$anime['rating'] = substr($anime->rating, 0,strpos($anime->rating, '('));
			$anime['action'] = "<a data-id='$anime->id' href=\"#\" data-toggle=\"modal\" class=\"action-btn\" data-target=\"#action-form\"><button type=\"button\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-pencil\"></span> Action</button></a>";
		}

		$anime_json = array('data' => $data);
		return response()->json($anime_json);
	}

	public function getCover($id)
	{
		$data = Anime::where('id','=',$id)->first();
		return $data->cover;
	}

	public function getAnime()
	{
		$id_anime = Input::get('id_anime');
		$data = Anime::find($id_anime);
		return response()->json($data);

	}

	public function getStatus()
	{
		$id = Input::get('id');
		$anime = Anime::where('id','=',$id)->first();
		return $anime->status;
	}


	public function addAnimeView()
	{
		return view('Admin.Anime.addAnime');
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

  		$anime->credit = Input::get('credit');
	    $anime->cover =  url('private/image_store/anime_cover') . "/" . $filename;
	    $anime->studio = Input::get('studio');
	    $anime->rating = Input::get('rating');
	    $anime->description = Input::get('description');
	    $anime->season = Input::get('season');
	    $anime->year = Input::get('year');
	    $anime->status = Input::get('status');

	    $anime->save();
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
  		$anime->credit = Input::get('credit');
	    $anime->year = Input::get('year');
	    $anime->status = Input::get('status');
  		$anime->save();
   	}

   	public function updateCover($id,Request $request)
   	{
   		$anime = Anime::where('id','=',$id)->first();
   		
   		//Delete Old Cover
   		$url = base_path() . "/image_store/anime_cover/";
   		$old_filename = substr($anime->cover, strpos($anime->cover, "anime_cover")+12);
   		unlink($url.$old_filename);
   		//End Delete Old Cover

   		//Move New Cover
   		$destination_path = base_path() . "/image_store/anime_cover";
      	$new_filename =$anime->title .'.'.$request->file('image')->getClientOriginalExtension();
		$new_filename = str_replace(' ', '_', $new_filename);
      	$request->file('image')->move($destination_path, $new_filename);
   		//End Move

   		$anime->cover = url('private/image_store/anime_cover') . "/" . $new_filename;
   		$anime->save();
   	}

   	public function updateStatus($id)
   	{
   		$anime = Anime::where('id','=',$id)->first();
   		$anime->status = Input::get('status');
   		$anime->save();
   	}

   	public function destroyAnime()
   	{
   		$id = Input::get('id_anime');
   		$destroyAnime = Anime::where('id','=',$id)->first();
   		$url = base_path() . "/image_store/anime_cover/";
   		$filename = substr($destroyAnime->cover, strpos($destroyAnime->cover, "anime_cover")+12);
   		unlink($url.$filename);
   		Anime::destroy($id);
   		exit();
   	}

}
