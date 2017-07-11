<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function movie()
	{
		return view('home.movie.movie',['title' => '电影详情',]);
	}
}