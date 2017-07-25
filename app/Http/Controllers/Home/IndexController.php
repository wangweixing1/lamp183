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
        $coming = \DB::table('coming') -> get();
        $carousel = \DB::table('carousel') ->get();
    	$movie = \DB::table('movie') ->get();
    	$showing = \DB::table('showing') -> get();
        $frinedship = \DB::table('frinedship') -> get();
        $hall = \DB::table('hall') -> get();
        $carousel = \DB::table('carousel') -> get();
    	// dd($carousel);
    	return view('home.index.index',['title' => '首页','coming'=>$coming,'carousel'=>$carousel,'movie' => $movie,'frinedship'=>$frinedship,'hall'=>$hall,'showing' => $showing,'carousel' => $carousel])->with(['info' => '22']);
    }

}
