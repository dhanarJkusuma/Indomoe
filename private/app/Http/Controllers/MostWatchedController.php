<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Most_watched;
use App\Anime;

class MostWatchedController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $anime = Anime::all(array('id','title'));
        return view('Admin.MostWatched.most_watched')->with('anime',$anime);
    }

    public function addMW()
    {
        $mw = new Most_watched;
        $mw->id_anime = Input::get('id_anime');
        $mw->save();
    }

    public function getMW()
    {
        $mw = Most_watched::all();
        $z = array();
        foreach ($mw as $r) {
            $r['anime'] = $r->Anime;    

            $r['action'] = "<div class=\"btn-group\">
                              <button type=\"button\" class=\"btn btn-info btn-flat\">Action</button>
                              <button type=\"button\" class=\"btn btn-info btn-flat dropdown-toggle\" data-toggle=\"dropdown\">
                                <span class=\"caret\"></span>
                                <span class=\"sr-only\">Toggle Dropdown</span>
                              </button>
                              <ul class=\"dropdown-menu\" role=\"menu\">
                                <li><a data-id='$r->id' href=\"#\" data-toggle=\"modal\" class=\"link-delete\" data-target=\"#delete-form\" >Delete</a></li>
                              </ul>
                            </div>";

        }

        $data = array('data' => $mw);

        return response()->json($data);
    }

    public function destroyMW()
    {
        $id = Input::get('id');
        Most_watched::destroy($id); 
    }
}
