<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="{{ asset ('/home/css/style.css') }}" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<!--//webfonts-->
</head>
<body>
	<div class="main">
		<div class="header" >
			<h1>半边天影院</h1>
			<form method="post" action="{{ url('/home/regist/insert') }}">
				<ul class="left-form">
					<h2>欢迎注册:</h2>
					<li>
						<input type="text" naem="name"  placeholder="用户名" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text" name="e-maile"   placeholder="邮箱" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="password" placeholder="密码" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="re_password" placeholder="确认密码" required/>
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