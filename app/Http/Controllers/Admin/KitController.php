<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Session;

class KitController extends Controller
{
	//
	public function captcha($tmp)
    	{
    		// 清除缓冲区内容
    		ob_get_clean();

                	//生成验证码图片的Builder对象，配置相应属性
        		$builder = new CaptchaBuilder;
        		//可以设置图片宽高及字体
        		$builder->build($width = 100, $height = 40, $font = null);
        		//获取验证码的内容
        		$phrase = $builder->getPhrase();

        		//把内容闪存入session
        		Session::flash('code', $phrase);
        		//生成图片
        		header("Cache-Control: no-cache, must-revalidate");
        		header('Content-Type: image/jpeg');
        		$builder->output();
    	}	
}
