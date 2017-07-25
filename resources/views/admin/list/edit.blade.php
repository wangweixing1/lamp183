@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        榜单管理
        <small>编辑</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">榜单管理</a></li>
        <li class="active"> 编辑</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column --> 
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">快速编辑</h3>
            </div>
  
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('/admin/list/update') }}" enctype="multipart/form-data" >
              {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data -> id }}">
              <div class="box-body">

           @if(session('info'))
            <div class="alert alert-danger">
                          {{ session('info') }}
                     </div>
                     @endif
                        <!-- 显示验证错误 配合验证规则使用--> 
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="form-group">
                <label for="exampleInputName">电影名</label>
                <input type="text" value="{{ $data ->list_name }}" name="list_name" class="form-control" id="exampleInputName" placeholder="请输入电影名">
              </div>              
              <div class="form-group">
                <label for="exampleInputFile">电影图片</label>
                <input type="file" name="list_img" id="exampleInputFile">

                <p class="help-block">请选择电影图片</p>
              </div>
              <div class="form-group">
                <label for="exampleInputName">描述</label>
                <input type="text" value="{{ $data ->list_depict }}" name="list_depict" class="form-control" id="exampleInputName" placeholder="描述">
              </div>         
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">更新</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>--> 

@endsection 


