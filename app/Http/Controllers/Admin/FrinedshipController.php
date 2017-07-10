<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrinedshipController extends Controller
{
    //add
    public function add()
    {
        return view('admin.frinedship.add',['title' => '友情链接']);
    }

    // insert
    public function insert(Request $request)
    {
        // echo 111;
        $this->validate($request, [
            // 规则验证
            'name' => 'required|unique:frinedship',  
            'url' => 'required'           
        ],[
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已经存在',
            'url.required' => '链接地址不能为空'            
        ]);

        $data=$request->except('_token');
         // dd($data);

        // 执行添加（数据库）
        $res = \DB::table('frinedship')->insert(
            $data
        );     
        
        if($res)
        {
            return redirect('/admin/frinedship/index') -> with(['info' => '添加成功']);
        }else
        {
            return back() -> with(['info' => '添加失败']);
        }
        // dd(111);
    }  


    // index 用户的列表页
    public function index(Request $request)
    {   
        // 获取值
        $num = $request -> input('num', 10);
        $keywords = $request -> input('keywords', '');

        // return '用户列表';
        // 查询值数据库
        $data = \DB::table('frinedship') ->where('name','like','%'.$keywords.'%') -> paginate($num);     // (like 代表模糊查询 $num 代表一页的条数)
        // dd($data);
        // 发送数据过去
        return view('admin.frinedship.index',['request' => $request ->all(), 'title' => '链接列表','data' => $data]);
    }   

    // edit 编辑友情链接
    public function edit($id)
    {
        // 查询
        $res = \DB::table('frinedship') -> where('id', $id) -> first();

        // 发送数据
        return view('admin/frinedship/edit',['title'=>'修改友情链接','data'=>$res]);
    }

     public function update(Request $request)
    {   
        $this->validate($request, [
            // 规则验证
            'name' => 'required|unique:frinedship',  
            'url' => 'required'             
        ],[
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已经存在',
            'url.required' => '链接地址不能为空'            
        ]);

        $data=$request->except('_token');

        // 执行添加（数据库）
        $res = \DB::table('frinedship') -> where('id',$request -> id) -> update($data);

        // 判断
        if($res)
        {
            return redirect('/admin/frinedship/index') -> with(['info' => '更新成功']);
        }else
        {
            return back() -> with(['info' => '更新失败']);
        }
    }


    // 删除 
    public function delete(Request $request,$id)
    {
        if($id == $request->id)
        {
            //执行删除
            $res = \DB::table('frinedship')->where('id',$id)->delete();
            if($res)
            {
                return redirect('/admin/frinedship/index')->with('info','删除成功');
            }else{
                return back()->with('info','删除失败');
            }
        }else{
            return back()->with('info','删除失败');
        }
    }  
}
