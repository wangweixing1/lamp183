@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			日期管理
			<small>添加</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
			<li><a href="#">日期管理</a></li>
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
					<form role="form" method="post" action="{{ url('/admin/date/insert') }}" enctype="multipart/form-data" >
						{{ csrf_field() }}
						<div class="box-body">

							<!-- @if(session('info'))
							<div class="alert alert-danger">
								{{ session('info') }}
							</div>
							@endif -->

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
								<label for="exampleInputName">日期</label>
								<input type="text" value="{{ old('date_name') }}" name="date_name" class="form-control" id="exampleInputName" placeholder="请输入日期名">
							</div>
							<label for="exampleInputName">星期</label>
								<select name="week_name" class="form-control">
								<option value="0">选择</option>	
										<option value="周一">周一</option>
										<option value="周二">周二</option>
										<option value="周三">周三</option>
										<option value="周四">周四</option>
										<option value="周五">周五</option>
										<option value="周六">周六</option>
										<option value="周日">周日</option>
								</select>      
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