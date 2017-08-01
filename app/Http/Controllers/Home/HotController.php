<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotController extends Controller
{
    //热点
    public function index()
    {
    	$list = \DB::table('list') -> get();
        $frinedship = \DB::table('frinedship') -> get();
        $config = \DB::table('config') -> get();

    	return view('home.hot.index',['title' => '热点','list'=>$list,'config'=>$config,'frinedship'=>$frinedship]);
    }
}
