<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
<<<<<<< HEAD
	{		
		$movie = \DB::table('movie') -> get();
		// dd($movie);
		
		$frinedship = \DB::table('frinedship') -> get();
		// dd($frinedship);
		return view('home.index.index',['title' => '前台主页','movie'=>$movie, 'frinedship'=>$frinedship]);
	}



=======
    {
    	// 查询数据
    	$movie = \DB::table('movie') ->get();
    	$showing = \DB::table('showing') -> get();
    	
    	return view('home.index.index',['title' => '首页','movie' => $movie,'showing' => $showing])->with(['info' => '22']);
    }
>>>>>>> 783ed4a14458552c85085ec9979689aacf6a2840
}
