<?php


namespace App\Http\Controllers;
use \stdClass;
use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Anime;
use App\CategoryAnime;
use App\AnimePost;
use App\Most_watched;
class WeaboController extends Controller
{
    public function index()
    {
        $on_anime = Anime::where('status','=','ongoing')->get();
        $category = CategoryAnime::all(); 
        $postsRAW = AnimePost::orderBy('created_at', 'DESC');

        
        $posts = $postsRAW->paginate(10);
        $now = new DateTime();
        foreach ($posts as $p) {    
                $p['now'] = date_diff(date_create($p->created_at),$now)->format('%R%a');
        };

        $Most_watched = Most_watched::all();
        foreach ($Most_watched as $key) {
            $key['title'] = $key->Anime->title;
            $key['cover'] = $key->anime->cover;
        }

        return view('Weabo.weabo_index')->with('on_anime',$on_anime)->with('category',$category)->with('posts',$posts)->with('most',$Most_watched); 
    }

    public function detail($id)
    {
        $details = Anime::find($id);
        $episode = AnimePost::where('id_anime','=',$id)->get();


        return view('Weabo.weabo_detail_anime')->with('detail',$details)->with('episode',$episode);
    }

    public function searchResult()
    {
        $keyword = Input::get('keyword');
        $data = Anime::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $result_card = array();
        foreach ($data as $card) {
            $obj = new stdClass();
            $obj->card = "<article class=\"general-card\">
                        <div class=\"general-header on-header\">
                            <img src=\"$card->cover\" class=\"img-header lazyOwl\" alt=\"\">
                        </div>
                        <div class=\"general-content\">
                            <div class=\"general-title\">
                                $card->title
                            </div>
                        </div>
                            <div class=\"general-bottom\">
                                 <button onclick=\"location.href='".url('anime')."/$card->id';\" class=\"ripple-button ripple\" data-ripple-color=\"#ffca28\" style=\"background:white; color: #ff5722; font-size:13px;\">READ MORE</button>
                            </div>                
                        </article>";
            array_push($result_card, $obj);
        }
        return response()->json($result_card);
    }

    public function detailEpisode($title)
    {
        $title = str_replace('_', ' ', $title);
        $episode = AnimePost::where('title','=',$title)->first();
        if($episode != null){
        $details = $episode->Anime;
        $download = $episode->Download;
            
            return view('Weabo.weabo_detail_episode')->with('episode',$episode)->with('detail',$details)->with('download',$download);
        }
        else
        {
            return view('errors.not_found');
        }
      }

    public function animeList()
    {
        $Animes = Anime::orderBy('title', 'ASC')->paginate(27);

        return view('Weabo.weabo_anime_list')->with('animes',$Animes);
    }

    public function alphalist($alpha)
    {
        if($alpha=='number')
        {
            $Animes = Anime::where('title','REGEXP','[0-9]');   
        }
        else
        {
            $Animes = Anime::where('title','LIKE',$alpha.'%');
        }
        
        $data = $Animes->paginate(27);
        return view('Weabo.weabo_anime_list')->with('animes',$data);   
    }

    public function categorylist($category)
    {
        $Animes = Anime::where('category','LIKE','%' . $category . '%')->paginate(20);
        
        return view('Weabo.weabo_anime_category')->with('animes',$Animes)->with('category',$category);
        //return response()->json($result_card)
    }

    public function community()
    {
        return view('Weabo.weabo_community');
    }

    public function about_us()
    {
        return view('Weabo.weabo_about_us');
    }

    public function vocaloid()
    {
        return view('errors.under_construction');
    }
        public function getCategory()
    {
        $json=array();
        $data = CategoryAnime::all();
        
        return response()->json($data);
    }
}
