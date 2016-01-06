<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class WeaboController extends Controller
{
    public function index()
    {
    	return view('Weabo\weabo_index');	
    }

    public function searchResult()
    {
    	$keyword = Input::get('keyword');
    	return $keyword;
    }
}
