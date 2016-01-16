<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('Admin.dashboard');
    }

    public function addUser()
    {
        if(Auth::user()->hak_akses=='superadmin')
        {
            return view("auth.register");
        }
        else
        {
            return view('errors.not_found');
        }
    }

    public function buildUser()
    {
        $newUser = new User;
        $newUser->name = Input::get('name');
        $newUser->email = Input::get('email');
        $newUser->password = bcrypt(Input::get('password'));
        $newUser->hak_akses = Input::get('role');
        $newUser->save();
        return redirect('admin/user/build');
    }


    public function profile()
    {
        return view('Admin.User.profile');
    }

    public function editProfile()
    {
        $me = Auth::user();
        $me->name=Input::get('name');
        $me->description=Input::get('bio');
        $me->save();
    }

    public function changePassword()
    {
        $me = Auth::user();

        if(Hash::check(Input::get('old_password'),$me->password))
        {
            $me->password=bcrypt(Input::get('password'));
            $me->save();
            return 1;
        }
        else
        {
            return 0;
        }
        
    }

    public function destroyUser()
    {
        $id = Input::get('id');
        User::destroy($id);
    }

    public function editUser($id)
    {
        $edittedUser = User::where('id','=',$id)->first();
        $edittedUser->hak_akses = Input::get('role');
        $edittedUser->save();
    }

    public function manageUser()
    {
        if(Auth::user()->hak_akses=='superadmin')
        {
            return view('Admin.User.user');
        }
        else
        {
            return view('errors.not_found');
        }
    }

    public function getAllUser()
    {
        $data = User::all();
        foreach ($data as $d)
        {
            $d['action'] = "<div class=\"btn-group\">
                  <button type=\"button\" class=\"btn btn-info btn-flat\">Action</button>
                  <button type=\"button\" class=\"btn btn-info btn-flat dropdown-toggle\" data-toggle=\"dropdown\">
                    <span class=\"caret\"></span>
                    <span class=\"sr-only\">Toggle Dropdown</span>
                  </button>
                  <ul class=\"dropdown-menu\" role=\"menu\">
                    <li><a data-id='$d->id' href=\"#\" data-toggle=\"modal\" class=\"edit-btn\" data-target=\"#edit-form\">Change Auth</a></li>
                    <li class=\"divider\"></li>
                    <li><a data-id='$d->id' href=\"#\" data-toggle=\"modal\" class=\"link-delete\" data-target=\"#delete-form\" >Destroy</a></li>
                  </ul>
                </div>";
        }
        $data = array('data' => $data);
        return response()->json($data);
    }

    public function getRole()
    {
        $id = Input::get('id');
        $selected = User::where('id','=',$id)->first();
        return response()->json($selected);
    }

    public function updateRole()
    {
        $id = Input::get('id');
        $selected = User::where('id','=',$id)->first();
        $selected->hak_akses = Input::get('role');
        $selected->save();

    }


    public function setDP(Request $request)
    {
        $me = Auth::user();
        $destination_path = base_path() . "/image_store/user_profile";
        $filename = $me->name .'.'. $request->file('dp')->getClientOriginalExtension();
        
        $filename = str_replace(' ', '_', $filename);
        $request->file('dp')->move($destination_path, $filename);


        $me->image =  url('private/image_store/user_profile') . "/" . $filename;
        $me->save();
    }

}
