<?php
	session_start();
	if(isset($_SESSION["user"])){
		header("Location: admin/");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to POS System</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="admin/css/login.css">
	<script type="text/javascript" src="admin/js/jquery.min.js"></script>
	<script type="text/javascript" src="admin/js/jquery.validate.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-lg-8" style="margin-top: 200px;">
			<div class="carousel slide" data-ride="carousel" id="slide">
	            <ol class="carousel-indicators" style="bottom: -50px;">
	                <li data-target="#slide" data-slide-to="0" class="active"></li>
	                <li data-target="#slide" data-slide-to="1"></li>
	                <li data-target="#slide" data-slide-to="2"></li>
	            </ol>
	            <div class="carousel-inner" role="listbox">
	                <div class="item active">
	                    <div class="carousel-caption" style="position: relative;left: 0px;">
	                    	<strong>
	                    		<h1>Welcome to My Shop</h1>
	                    	</strong>
	                    </div>
	                </div>
	                <div class="item">
	                    <div class="carousel-caption" style="position: relative;left: 0px;">
	                    	<strong>
	                    		<h1>Any model fashions in here</h1>
	                    	</strong>
	                    </div>
	                </div>
	                <div class="item">
	                    <div class="carousel-caption" style="position: relative;left: 0px;">
	                    	<strong>
	                    		<h1>Collection model for you.. !</h1>
	                    	</strong>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
		<div class="col-lg-4">
			<div class="box">
				<div class="box-head">
					<span>POS System</span>
				</div>
				<div class="box-body">
					<h3 class="text-center" style="color:#FFF;">Administrator</h3>
					<form action="admin/login.php" method="POST" id="formLogin">
						<div class="form-group">
							<input type="text" placeholder="Username" name="username" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-block" id="login" name="login" value="Login">Login</button>
						</div>
					</form>
				</div>
				<div class="box-footer"></div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="admin/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#formLogin").validate({
				rules:{
					username:{
						required: true,
						minlength: 2
					},
					password:{
						required: true,
						minlength: 6
					},
					agree:'required'
				},
				messages:{
					username:{
						required: 'Username is required !',
						minlength: 'Lenght of username must be more than 2.'
					},
					password:{
						required: "Password is required !",
						minlength: "Lenght of password must be more than and equal 6."
					}
				},
				errorElement: "em"
			})
		})
	</script>
</body>
</html>
