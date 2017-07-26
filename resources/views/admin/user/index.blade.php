@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				用户管理
				<small>列表</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
				<li><a href="#">用户管理</a></li>
				<li class="active">列表</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">快速查看用户列表</h3><h5>(注:双击用户名修改)</h5>
					</div>
					<!-- /.box-header -->
					<div class="box-body">

						@if(session('info'))
							<div class="alert alert-danger">
								{{ session('info') }}
							</div>
						@endif

						<form action="{{ url('/admin/user/index') }}" method="get">
							<div class="row">
								<div class="col-md-2">
									<!-- select --> 
									<div class="form-group">
										<select name="num" class="form-control">
											<option value="5"
												@if(!empty($request['num']) && $request['num'] == '10')
													selected="selected" 
												@endif
												>5
											</option> {{-- <!-- @if($request['num'] == '10')   selected="selected"    @endif    判断保持状态--> --}}
											<option value="10"
												@if(!empty($request['num']) && $request['num'] == '20')
													selected="selected" 
												@endif
												>10
											</option>
											<option value="15"
												@if(!empty($request['num']) && $request['num'] == '40')
													selected="selected" 
												@endif
												>15
											</option>
											<option value="20"
												@if(!empty($request['num']) && $request['num'] == '80')
													selected="selected" 
												@endif
												>20
											</option>
											<option value="25"
												@if(!empty($request['num']) && $request['num'] == '160')
													selected="selected" 
												@endif
												>25
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-6 ">
									<div class="input-group input-group">

										{{-- <!--  value="{{ $request['keywords'] }}"  保持状态--> --}}
										<input value="{{ $request['keywords'] or ' ' }}" name="keywords" type="text" class="form-control">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-info btn-flat">搜索</button>
										</span>
									</div>
								</div>
							</div>
						</form>

						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>用户名</th>
									<th>邮箱</th>
									<th>头像</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>

								@foreach($data as $key => $val)
									<tr class="parent">
										<td class="ids">{{ $val -> id }}</td>
										<td class="name">{{ $val -> name }}</td>
										<td>{{ $val -> email }}</td>
										<td><img  style="width:20px;height:20px;" src=" /uploads/avatar/{{ $val -> avatar }}"/></td>
										<td><a href="{{ url('/admin/user/edit') }}/{{ $val -> id }}">编辑</a> <a class="del" href="#" data-toggle="modal" data-target="#myModal">删除</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $data  -> appends($request) -> links() }}
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	</section>
	<!-- /.content -->
	</div>


@endsection
@section('js')
	<script type="text/javascript">

		// ajax token 设置使用
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});	

		// 绑定双击事件
		$(".name").one('dblclick',aaa);

		// 双击事件封装函数 解决双击bug
		function aaa(){

			// 把 $(this) 放到td里 避免修改用户名时 获取到不必要的值
			var td =  $(this);

			// 获取id
			var id = $(this).parent('.parent').find('.ids').html();
			// alert(id);
			// 获取原来的值
			var oldName = $(this).html();

			// 创建输入框
			var inp = $("<input type='text'>");

			// 写入创建的input框并显示出来
			inp.val(oldName);

			// 双击变成input框
			$(this).html(inp);

			// 双击后直接选中
			inp.select();

			// 添加失去焦点事件
			inp.on('blur',function(){
				// 获取新的名字
				var newName = inp.val();

				// 执行ajax
				$.ajax('/admin/user/ajaxrename',{
					type:'POST',
					data:{id:id,name:newName},
					success:function(data){
						if(data == '0' )
						{
							alert('用户名已经存在');
							td.html(oldName);
						}else if(data == '1')
						{
							alert('恭喜！修改成功');
							td.html(newName);
						}else
						{
							alert(' 抱歉！修改失败');
						}

						// alert(data);
					},
					error:function(data)
					{
						alert('数据异常');
					},
					dataType:'json'
				});

				// 再次双击修改用户名
				td.one('dblclick' , aaa);

			});
		}

		// 获取要设置模态框的变量
		// 全局变量
		id = 0;

		// 获取id保存到变量当中
		$(".del").on('click',function(){
			id = $(this).parents('.parent').find('.ids').html();
			// alert(id);
		});
	</script>
@endsection