<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
    	// 查询数据
    	$movie = \DB::table('movie') ->get();
    	$showing = \DB::table('showing') -> get();
    	
    	return view('home.index.index',['title' => '首页','movie' => $movie,'showing' => $showing])->with(['info' => '22']);
    }
}
