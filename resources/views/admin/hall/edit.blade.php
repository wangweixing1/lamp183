@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				影院管理
				<small>添加</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
				<li><a href="#">影院管理</a></li>
				<li class="active"> 影厅添加</li>
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
							<h3 class="box-title">影厅添加</h3>
						</div>

						<!-- /.box-header -->
						<!-- form start -->
						<form role="form" method="post" action="{{ url('/admin/hall/update') }}" enctype="multipart/form-data" >
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
									<label for="exampleInputName">影厅</label>
									<input type="text" value="{{ $data -> hall_name }}" name="hall_name" class="form-control" id="exampleInputName" placeholder="请输入影厅">
								</div>
								<div class="form-group">
								<input type="hidden" name="id" value="{{ $data->id }}" >
									<label for="exampleInputName">所属影院</label>
									<select name="tid" class="form-control">
										<option value="0">选择</option>
											@foreach($res as $key => $val)
												<option value="{{ $val -> id }}">{{ $val -> cinema_name }}</option>
											@endforeach					
									</select>
								</div>
								           
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">修改</button>
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