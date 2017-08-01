<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ConfigController extends Controller
{
    //网站添加   
    public function add()
    {	
    	return view('admin.config.add',['title' => '网站配置']);


    }


    // 网站列表
     public  function index()
    {
    	$config = \DB::table('config')->get();
    	// dd($config);    	
    	return view('admin.config.index',['title' => '网站配置','config'=>$config]);
    }


     public function insert(Request $request)
    {	
    	
    	$data=$request->except('_token');
    	
    	 if($request->hasFile('logo'))
        {
            if($request->file('logo')->isValid())
            {
                //获取扩展名
                $ext=$request->file('logo')->extension();


                //随机文件名
                $filename=time().mt_rand(10000,99999).'.'.$ext;


                $request->file('logo')->move('./uploads/logo_img',$filename);
                
               


                //添加data数据
                $data['logo']=$filename;
            }
        }
       
    	$res = \DB::table('config')->where('id',1)->update($data);
    	 if($res){
           return redirect('admin/config/index');
        }else{
            return back();
        }
	}






}