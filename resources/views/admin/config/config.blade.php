@extends('admin.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        网站配置
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active"> 添加</li>
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
              <h3 class="box-title">新增网站配置</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ url('/admin/config/insert') }}" enctype="multipart/form-data" >
              {{ csrf_field() }}
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
                  <label for="exampleInputWebname">网站标题</label>
                  <input type="text" value="{{ old('webname') }}" name="webname" class="form-control" id="exampleInputWebname" placeholder="请输入网站标题">
                </div>
                <div class="form-group">
                  <label for="exampleInputCopy">网站版权</label>
                  <input type="text" value="{{ old('copy') }}" name="copy" class="form-control" id="exampleInputCopy" placeholder="请输入网站版权">
                </div>
                <div class="form-group">
                  <label for="exampleInputKeywords">网站关键字</label>
                  <input type="text"  value="{{ old('keywords') }}" name="keywords" class="form-control" id="exampleInputKeywords" placeholder="请输入关键字">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">网站logo</label>
                  <input type="file" name="logo" id="exampleInputFile">

                  <p class="help-block">请选择logo图片</p>
                </div>           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
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
  </div>

@endsection