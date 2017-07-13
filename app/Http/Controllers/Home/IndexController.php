<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
	{		
		$movie = \DB::table('movie') -> get();
		// dd($movie);
		
		$frinedship = \DB::table('frinedship') -> get();
		// dd($frinedship);
		return view('home.index.index',['title' => '前台主页','movie'=>$movie, 'frinedship'=>$frinedship]);
	}



}
