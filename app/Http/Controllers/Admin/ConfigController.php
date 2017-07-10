<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //
    public function config()
    {
    	return view('admin.config.config',['title' => '网站配置']);
    }

    // insert
	public function insert(Request $request)
	{
		$this->validate($request, [
			// 规则验证
			'webname' => 'required|unique:config|min:6',
			'keywords' => 'required',
		],[
			'name.required' => '用户名不能为空',
			'name.unique' => '用户名已经存在',
			'name.min' => '用户名最小6个字符',
			'keywords.required' => '关键字不能为空'
		]);

		// 处理图片 
		if($request -> hasFile('logo'))
		{
			if($request -> file('logo') -> isValid())
			{
				// 获取扩展名
				$ext = $request -> file('logo') -> extension();

				// 随机文件名
				$filename = time().mt_rand(1000000,9999999).'.'.$ext;
				// dd($filename);
				// 移动
				$request -> file('logo') -> move('./uploads/logo',$filename);

				// 添加 dada 数据
				$data['logo'] = $filename;
 			}
		}

		$data=$request->except('_token');

        // 执行添加（数据库）
        $res = \DB::table('config') -> insert($data);

        // 判断
        if($res)
        {
            return redirect('/admin/config/config') -> with(['info' => '配置成功']);
        }else
        {
            return back() -> with(['info' => '配置失败']);
        }
	}
}
