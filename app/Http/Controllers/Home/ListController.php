<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    // 电影榜单
    public function index()
    {   
    	$list = \DB::table('list') -> get();
    	$frinedship = \DB::table('frinedship') -> get();
    	$config = \DB::table('config') -> get();
    	// dd($frinedship);
        return view('home.list.index',['title' => '榜单','list'=>$list,'config'=>$config,'frinedship'=>$frinedship]);

    }
}
