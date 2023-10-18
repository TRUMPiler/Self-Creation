<?php 
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v8 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="image-holder">
				<img src="images/registration-form-8.jpg" alt="">
			</div>
			<div class="form-inner">
				<form action="">
					<div class="form-header">
						<h3>Login</h3>
						<img src="images/sign-up.png" alt="" class="sign-up-icon">
					</div>
					<!-- <div class="form-group">
						<label for="">Name:</label>
						<input type="text" name="Name" class="form-control" data-validation="length alphanumeric" data-validation-length="3-12">
					</div> -->
					<div class="form-group">
						<label for="">E-mail:</label>
						<input type="text" class="form-control" name="email" data-validation="email">
					</div>
					<div class="form-group" >
						<label for="">Password:</label>
						<input type="password" class="form-control" name="Password" data-validation="length" data-validation-length="min8">
					</div>
					<button>create my account</button>
					<!-- <div class="socials">
						<p>Sign up with social platforms</p>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-facebook"></i>
						</a>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-instagram"></i>
						</a>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-twitter"></i>
						</a>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-tumblr"></i>
						</a>
					</div> -->
					<script>
						$("form").on("submit",function(event){
							event.preventDefault();
							var formdata=$(this).serialize();
							$.post("checklogin.php",formdata,function(data){
								if(data=="false")
								{
									alert("Hey you don\'t  have a account");
									window.location='index.php';
								}
								else
								{
									alert("Your Account is logged in");
									window.location="home.php";
								}
							})
						})
					</script>
				</form>
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery.form-validator.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>