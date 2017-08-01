<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="{{ asset ('/home/css/style.css') }}" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/bootstrap.min.css') }}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript" ></script>
		<!--webfonts-->
		<!--//webfonts-->
</head>
<body style="background:url('/home/images/111.jpg'); background-repeat: no-repeat;">
	<div class="main" >
		<div class="header" >
		<h1 style="font-size:50px;"><span class="label label-info">欢迎来到半边天影院</span></h1>
			
			<form method="post" action="{{ url('/home/insert') }}">
				{{ csrf_field() }}
				<ul class="left-form">
				
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
					<li><span class="label label-warning">请注册</span></li>
					
					<li>
						<input type="text" name="name"  placeholder="请输入用户名" required/>
						<div class="search-query"> </div>
					</li> 
					<li>
						<input type="text" name="email"   placeholder="请输入邮箱" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="password" placeholder="请输入密码" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="re_password" placeholder="请输入确认密码" required/>
						<div class="clear"> </div>
					</li> 
						<div class="clear"> 
							<button type="submit" class="btn btn-primary">注册</button>
					 	</div>
				</ul>
				<div class="clear"> </div>
			</form>
		</div>
</body>
</html> 