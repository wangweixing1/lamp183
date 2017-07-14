<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
    {
    // 电影介绍
     public function index()
    {   
        $movie = \DB::table('movie') -> get();
        // dd($movie);  
        $frinedship = \DB::table('frinedship') -> get();
        // dd($frinedship);
        return view('home.movie.index',['title' => '电影详情','movie'=>$movie,'frinedship'=>$frinedship]);
    }
}
