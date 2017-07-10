@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				友情链接
				<small>添加</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
				<li><a href="#">添加管理</a></li>
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
						<br>
						<!-- /.box-header -->
						<!-- form start -->
						<form role="form" method="post" action="{{ url('/admin/frinedship/insert') }}" enctype="multipart/form-data" >
							{{ csrf_field() }}
							<div class="box-body">
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
									<label for="exampleInputName">链接名称：</label>
									<input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputName" placeholder="请输入链接名称">
								</div>
								<div class="form-group">
									<label for="exampleInputurl">链接地址：</label>
									<input type="text" value="{{ old('url') }}" name="url" class="form-control" id="exampleInputurl" placeholder="请输入链接地址">
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