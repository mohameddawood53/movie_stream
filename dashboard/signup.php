<?php
	include("config.php");
	$statues="";  // in the database or not
	$pageTitle = "Sign Up";
	// check if there is a request method POST
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
			$name = ucwords($_POST['name']);
			$email= $_POST['email'];
			$pass = sha1($_POST['password']);
			// check if the user is exist
			$stmt = $connection->prepare("SELECT * from users WHERE email=? AND password = ? AND statues = 1 LIMIT 1");
			$stmt->execute(array($email,$pass));
			$row = $stmt->fetch();
			$count=$stmt->rowCount();
			// check if count > 0 then the user in the data base
			if ($count>0)
			{
				$statues = "You have an account, Please login!";
			}else{
				$stmt = $connection->prepare("SELECT email FROM users WHERE email = ?");
				$stmt->execute(array($email));
				$row = $stmt->fetch();
				$count=$stmt->rowCount();
				if ($count>0)
				{
					$statues = "Please, Enter another E-mail!";
				}else{
				$stmt = $connection->prepare("INSERT INTO users (username,password,email) VALUES(:zname,:zpass,:zemail)" );
				$stmt->execute(array(
				'zname' =>$name,
				'zpass' =>$pass,
				'zemail'=>$email ));
				header('location:login.php');
				}
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
<!--//charts-->
</head>
<body>	
<!--inner block start here-->
<div class="signup-page-main">
     <div class="signup-main">  	
    	 <div class="signup-head">
				<h1>Sign Up</h1>
			</div>
			<div class="signup-block">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
					<input type="text" name="name" placeholder="Full name" required="">
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
							<!--<ul>
								<li>
									<input type="checkbox" id="brand1" value="1">
									<label for="brand1"><span></span>I agree to the terms</label>
								</li>
							</ul>-->
						</div>
						
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign up" value="Sign up">														
				</form>
				<div class="sign-down">
				<h4>Already have an account? <a href="login.php"> Login here.</a></h4>
				  <h5><a href="index.html">Go Back to Home</a></h5>
				</div>
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


                      
						
