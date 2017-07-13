@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				放映管理
				<small>添加</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
				<li><a href="#">放映管理</a></li>
				<li class="active"> 放映添加</li>
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
							<h3 class="box-title">放映添加</h3>
						</div>

						<!-- /.box-header -->
						<!-- form start -->
						<form role="form" method="post" action="{{ url('/admin/project/insert') }}" enctype="multipart/form-data" >
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
									<label for="exampleInputName">影院</label>
									<select name="cinema_id" class="form-control">
										<option value="0">选择</option>
											@foreach($cinema as $key => $val)
												<option value="{{ $val -> cinema_name }}">{{ $val -> cinema_name }}</option>
											@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputName">影厅</label>
									<select name="hall_id" class="form-control">
										<option value="0">选择</option>
											@foreach($hall as $key => $val)
												<option value="{{ $val -> hall_name }}">{{ $val -> hall_name }}</option>													
											@endforeach			
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputName">电影</label>
									<select name="movie_id" class="form-control">
										<option value="0">选择</option>
											@foreach($movie as $key => $val)
												<option value="{{ $val -> movie_name }}">{{ $val -> movie_name }}</option>
											@endforeach				
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputName">日期</label>
									<select name="date_id" class="form-control">
										<option value="0">选择</option>
											@foreach($date as $key => $val)
												<option value="{{ $val -> date_name }}">{{ $val -> date_name }}</option>
											@endforeach			
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputName">放映时间</label>
									<select name="time_id" class="form-control">
										<option value="0">选择</option>
											@foreach($time as $key => $val)
												<option value="{{ $val -> time_name }}">{{ $val -> time_name }}</option>
											@endforeach				
									</select>
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

@section('js')
	<script type="text/javascript">

		
	</script>


@endsection