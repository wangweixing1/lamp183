<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    // center
    public function center()
    {
    	$id = session('master')->id;
    	
    	$data= \DB::table('users')->where('users.id',$id)->first();
    	// dd($data);

    	return view('home.center.center',['title' => '个人中心','data'=>$data]);
    }

    public function dupdate(Request $request)
    {
    	
    	$data=$request->except('_token');
        // dd($data);
       	
       	$res=\DB::table('users')->where('id',session('master')->id)->update($data);
        if($res){
            return redirect('/home/center')->with(['info'=>'更新成功']);
        }else{
            return redirect('/home/center')->with(['info'=>'更新失败']);
        }
     
    }

    // mima
    public function mima()
	{
  		return view('home.center.mima',['title' => '个人中心']);
	}
 
	public function postReset(Request $request)
	{
	    $data = $request -> except('_token');
		// dd($data);

	    // 处理密码加密
		$data['password'] = encrypt($data['password']);

		// 添加
		$res = \DB::table('users') -> where('id',session('master')->id) -> update($data);

		// 判断
		if($res)
		{
			return redirect('/home/center') -> with(['info' => '更新成功']);
		}else
		{
			return back() -> with(['info' => '更新失败']);
		}
	}

    // touxiang
    public function touxiang(Request $request)
    {
    	return view('home.center.touxiang',['title' => '个人中心']);
    }

    public function update(Request $request)
    {
    	
    	$data=$request->except('_token');
    	// dd($data);
        //查询老图片
        $oldAvatar= \DB::table('users')->where('id',session('master')->id)->first()->avatar;
        // dd($oldAvatar);
        if($request->hasFile('avatar'))
        {
            if($request->file('avatar')->isValid())
            {
                //获取扩展名
                $ext=$request->file('avatar')->extension();

                //随机文件名
                $filename=time().mt_rand(10000,99999).'.'.$ext;

                $request->file('avatar')->move('./uploads/avatar',$filename);
                
                //删除老图片
                if(file_exists('./uploads/avatar/'.$oldAvatar) && $oldAvatar!='default.jpg')
                {
                        unlink('./uploads/avatar/'.$oldAvatar);
                }

                //添加data数据
                $data['avatar']=$filename;
            }
            // 判断
			if($res)
			{
				return redirect('/home/center') -> with(['info' => '更新成功']);
			}else
			{
				return back() -> with(['info' => '更新失败']);
			}
        }
        //处理更新时间字段
        $data['updated_at']=date('Y-m-d H:i:s');
        // dd($data);
        $res=\DB::table('users')->where('id',session('master')->id)->update($data);
        if($res){
            return redirect('/home/center/center')->with(['info'=>'更新成功']);
        }else{
            return back();
        }
     
    }
}
