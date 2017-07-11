@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                订单管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">订单管理</a></li>
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
                            <h3 class="box-title">快速添加</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ url('/admin/indent/insert') }}" enctype="multipart/form-data" >
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
                                    <label for="exampleInputName">订单编号</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">影片编号</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">用户编号</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">订票张数</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">订购日期</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">订单状态</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputName" placeholder="">
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