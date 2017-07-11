<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndentController extends Controller
{
    // add
	public function add()
	{
		return view('admin.indent.add',['title' => '订单添加']);
	}
}
