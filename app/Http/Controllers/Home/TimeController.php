<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{

    public function index()
    {
    	//查询数据
    	$time = \DB::table('time') -> get();
    	$project = \DB::table('project') -> get();
    	$frinedship = \DB::table('frinedship') -> get();
    	$config = \DB::table('config') -> get();
    	// dd($frinedship);
    	return view('home.time.index',['title' => '电影时刻表','config'=>$config,'time'=>$time,'project'=>$project,'frinedship'=>$frinedship]);
    }
}
