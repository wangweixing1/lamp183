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
        $carousel = \DB::table('carousel') ->get();
    	$movie = \DB::table('movie') ->get();
    	$showing = \DB::table('showing') -> get();
        $frinedship = \DB::table('frinedship') -> get();
    	// dd($frinedship);
    	return view('home.index.index',['title' => '首页','carousel'=>$carousel,'movie' => $movie,'frinedship'=>$frinedship,'showing' => $showing])->with(['info' => '22']);
    }

}
