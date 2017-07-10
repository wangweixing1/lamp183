<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

	class IndexController extends Controller
	{
		//
		public function index()
		{
			// echo 'niduiwo zongshi zheyang lengdan ';
			return view('admin.index.index',['title' => '后台主页']);
<<<<<<< HEAD
		}    
	}       
=======
		}
	}
>>>>>>> 67edc232c18e3132b0548e0a56c482293fb51cdd
