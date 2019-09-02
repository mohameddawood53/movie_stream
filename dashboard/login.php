<?php
	session_start();
	$statues = "";
	$pageTitle = "Log in";
	include("config.php");
	
	if (isset($_SESSION['loggedin']))
	{
		header("location:index.php");
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$email = $_POST['email'];
		$pass  = sha1($_POST['password']);
		$stmt  = $connection->prepare("SELECT * FROM users WHERE email = ? AND password = ? AND statues = 1 LIMIT 1");
		$stmt->execute(array($email,$pass));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();
		if ($count>0)
		{
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['loggedin'] = $row['username'];
			header('location:index.php');
			exit();
		}else{
			$statues = "Wrong E-mail or Password";
		}
	}
?>
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $pageTitle; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Login</h1>
			</div>
			<div class="login-block">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "POST">
					<input type="text" name="email" placeholder="Email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<?php
						if ($statues != null)
						{
							?>
								<h4 class="alert alert-danger"><?php echo $statues; ?></h4>
							<?php 
						}
					?>
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<!--<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span>Remember me</label>
								</li>-->
							</ul>
						</div>
						<!--<div class="forgot">
							<a href="#">Forgot password?</a>
						</div>-->
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign In" value="Login">	
					<h3>Not a member?<a href="signup.php"> Sign up now</a></h3>				
					<h2>or login with</h2>
					<div class="login-icons">
						<ul>
							<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>						
						</ul>
					</div>
				</form>
				<h5><a href="index.html">Go Back to Home</a></h5>
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->

<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
