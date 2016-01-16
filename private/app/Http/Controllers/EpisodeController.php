<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AnimePost;
use App\Anime;
use App\DownloadPost;
use Illuminate\Support\Facades\Input;
class EpisodeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function episode()
    {
        $data_anime = Anime::all();
        $title = Anime::all(array('id','title'));
        return view('Admin.Episode.episode')->with('anime',$data_anime)->with('title',$title);
    }

    public function addEpisode()
    {
        $title = Anime::all(array('id','title'));
        //return response()->json($title);
        return view('Admin.Episode.addEpisode')->with('title',$title);
    }

    public function insertEpisode(Request $request)
    {
        $newEpisode = new AnimePost;
        $newEpisode->id_anime = Input::get('id_anime');
        $newEpisode->title = Input::get('title');
        $newEpisode->description = Input::get('description');
        $destination_path = base_path() . "/image_store/anime_episode";
        if ($request->hasFile('image1')) 
        {
            
            $filename1 =$newEpisode->title .'_1.'.$request->file('image1')->getClientOriginalExtension();
            $filename1 = str_replace(' ', '_', $filename1);
            $request->file('image1')->move($destination_path, $filename1);
            $newEpisode->screenshot1 =  url('private/image_store/anime_episode') . "/" . $filename1;
        }

        if ($request->hasFile('image2')) 
        {
            $filename2 =$newEpisode->title .'_2.'.$request->file('image2')->getClientOriginalExtension();
            $filename2 = str_replace(' ', '_', $filename2);
            $request->file('image2')->move($destination_path, $filename2);
            $newEpisode->screenshot2 =  url('private/image_store/anime_episode') . "/" . $filename2;
        }

        if ($request->hasFile('image3')) 
        {
            $filename3 =$newEpisode->title .'_3.'.$request->file('image3')->getClientOriginalExtension();
            $filename3 = str_replace(' ', '_', $filename3);
            $request->file('image3')->move($destination_path, $filename3);
            $newEpisode->screenshot3 =  url('private/image_store/anime_episode') . "/" . $filename3;
        }
        $newEpisode->createdBy = Auth::user()->id;
        $newEpisode->save();
        return redirect()->route('redirectDownload',$newEpisode->id);
    }

    public function getTitle($id)
    {
        $data = AnimePost::where('id','=',$id)->first();
        $data['anime_title'] = $data->Anime->title;
        return $data;
    }

    public function getEpisode($id_anime)
    {
        $data = AnimePost::where('id_anime','=',$id_anime)->get();
        foreach ($data as $eps) {
            $eps['action'] = "<div class=\"btn-group\">
                              <button type=\"button\" class=\"btn btn-info btn-flat\">Action</button>
                              <button type=\"button\" class=\"btn btn-info btn-flat dropdown-toggle\" data-toggle=\"dropdown\">
                                <span class=\"caret\"></span>
                                <span class=\"sr-only\">Toggle Dropdown</span>
                              </button>
                              <ul class=\"dropdown-menu\" role=\"menu\">
                                <li><a data-id='$eps->id' href=\"#\" data-toggle=\"modal\" class=\"title-btn\" data-target=\"#title-form\">Edit Title</a></li>
                                <li><a data-id='$eps->id' href=\"#\" data-toggle=\"modal\" class=\"ss-btn\" data-target=\"#ss-form\">Edit ScreenShot</a></li>
                                <li class=\"divider\"></li>
                                <li><a data-id='$eps->id' href=\"#\" data-toggle=\"modal\" class=\"link-delete\" data-target=\"#delete-form\">Delete</a></li>
                              </ul>
                            </div>
                            <a data-id='$eps->id' href=\"". url('admin/episode/readmore') . "/$eps->id \" ><button type=\"button\" class=\"btn btn-info\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Open Episode\"> <span class=\"glyphicon glyphicon-folder-open\"></span></button></a>
                            ";
        }
        $data = array('data' => $data);
        return response()->json($data);
    }

    public function openedEpisode($id_eps)
    {
        $data = AnimePost::where('id','=',$id_eps)->first();
        $download = DownloadPost::where('id_post','=',$id_eps)->get();
        return view('Admin.Episode.moreEpisode')->with('data',$data)->with('download',$download);
    }

    public function updateEpisodeV($id_eps)
    {
        $data = AnimePost::where('id','=',$id_eps)->first();
        $anime = Anime::all();
        return view('Admin.Episode.updateEpisode')->with('data',$data)->with('anime',$anime);
    }

    public function updateEpisode($id_eps,Request $request)
    {
        $newEpisode = AnimePost::where('id','=',$id_eps)->first();
        $newEpisode->title = Input::get('title');
        $newEpisode->id_anime = Input::get('id_anime');
        
        $newEpisode->save();
        return redirect()->route('afterUpdate',$id_eps);
    }

    public function updateScreenShot($id_eps,Request $request)
    {
        $newEpisode = AnimePost::where('id','=',$id_eps)->first();
        $destination_path = base_path() . "/image_store/anime_episode";
        if ($request->hasFile('image1')) 
        {
            
            $filename1 =$newEpisode->title .'_1.'.$request->file('image1')->getClientOriginalExtension();
            $filename1 = str_replace(' ', '_', $filename1);
            $request->file('image1')->move($destination_path, $filename1);
            $newEpisode->screenshot1 =  url('private/image_store/anime_episode') . "/" . $filename1;
        }

        if ($request->hasFile('image2')) 
        {
            $filename2 =$newEpisode->title .'_2.'.$request->file('image2')->getClientOriginalExtension();
            $filename2 = str_replace(' ', '_', $filename2);
            $request->file('image2')->move($destination_path, $filename2);
            $newEpisode->screenshot2 =  url('private/image_store/anime_episode') . "/" . $filename2;
        }

        if ($request->hasFile('image3')) 
        {
            $filename3 =$newEpisode->title .'_3.'.$request->file('image3')->getClientOriginalExtension();
            $filename3 = str_replace(' ', '_', $filename3);
            $request->file('image3')->move($destination_path, $filename3);
            $newEpisode->screenshot3 =  url('private/image_store/anime_episode') . "/" . $filename3;
        }
        
        $newEpisode->save();
    }

    public function destroyEpisode()
    {
        $id = Input::get('id');

        $destroyEpisode = AnimePost::where('id','=',$id)->first();
        $url = base_path() . "/image_store/anime_episode";
        

        if($destroyEpisode->screenshot1!=null||$destroyEpisode->screenshot1!='')
        {
            $ss1 = substr($destroyEpisode->screenshot1, strpos($destroyEpisode->screenshot1, "anime_episode")+13);
            unlink($url.$ss1);
        }
        
        if($destroyEpisode->screenshot2!=null||$destroyEpisode->screenshot2!='')
        {
            $ss2 = substr($destroyEpisode->screenshot2, strpos($destroyEpisode->screenshot2, "anime_episode")+13);
            unlink($url.$ss2);
        }
        
        if($destroyEpisode->screenshot3!=null||$destroyEpisode->screenshot3!='')
        {
            $ss3 = substr($destroyEpisode->screenshot3, strpos($destroyEpisode->screenshot3, "anime_episode")+13);
            unlink($url.$ss3);
        }

        AnimePost::destroy($id);
        return redirect()->route('afterDelete');

    }

    

}
