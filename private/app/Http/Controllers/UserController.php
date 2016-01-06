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

    public function profile()
    {
    	return view('Admin\User\profile');
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

    public function getAllUser()
    {
    	$data = User::all();
    	$data = array('data' => $data);
    	return response()->json($data);
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
