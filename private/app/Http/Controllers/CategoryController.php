<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\CategoryAnime;

class CategoryController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

    public function index()
    {
    	return view('Admin/dashboard');
    }

    public function category()
    {
    	return view('Admin/Category/category_anime');
    }

    public function insertCategory(Request $request)
    {
    	$newCategory = new CategoryAnime;
    	$newCategory->category = Input::get('category');
		
		$destination_path = base_path() . "/image_store/category_cover";
      	$filename =$newCategory->category .'.'.$request->file('cover')->getClientOriginalExtension();
      	
		$filename = str_replace(' ', '_', $filename);
      	$request->file('cover')->move($destination_path, $filename);

	    $newCategory->cover =  url('private/image_store/category_cover') . "/" . $filename;
		$newCategory->save();
	}

	public function getAllCategory()
	{
		$data = CategoryAnime::all();
		foreach ($data as $category) {
			$category['cover'] = " <a href=\" $category->cover \" target=\"__blank\"><button type=\"button\" class=\"btn btn-default\">
								<span class=\"glyphicon glyphicon-eye-open\" aria-hidden=\"true\"></span></button></a>";

			$category['action'] = "<div class=\"btn-group\">
		                      <button type=\"button\" class=\"btn btn-info btn-flat\">Action</button>
		                      <button type=\"button\" class=\"btn btn-info btn-flat dropdown-toggle\" data-toggle=\"dropdown\">
		                        <span class=\"caret\"></span>
		                        <span class=\"sr-only\">Toggle Dropdown</span>
		                      </button>
		                      <ul class=\"dropdown-menu\" role=\"menu\">
		                        <li><a data-id='$category->id' href=\"#\" data-toggle=\"modal\" class=\"edit-btn\" data-target=\"#edit-form\">Edit</a></li>
		                        <li class=\"divider\"></li>
		                        <li><a data-id='$category->id' href=\"#\" data-toggle=\"modal\" class=\"link-delete\" data-target=\"#delete-form\" >Delete</a></li>
		                      </ul>
		                    </div>";
		}
	
		$anime_json = array('data' => $data);
		return response()->json($anime_json);
	}

	public function getCategory()
	{
		$id = Input::get('id');
		$data = CategoryAnime::find($id);
		header("Content-type:text/x-json");
		return response()->json($data);
		exit();
	}

	public function getJSON()
	{
		$json=array();
		$data = CategoryAnime::all();
		
		return response()->json($data);
	}

	public function updateCategory($id)
	{
		$category = CategoryAnime::where('id', '=', $id)->first();
  		$category->category = Input::get('category');
    	$category->save();
	}

	public function destroyCategory()
	{
		$id = Input::get('id');
		CategoryAnime::destroy($id);
		exit();
	}


}
