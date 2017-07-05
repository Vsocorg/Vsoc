<?php session_start();

	include_once("db_queries.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>VSOC | Profile</title> 

	<?php include_once("common_resources.php"); ?>

	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/scroll.css">
 </head> 
<body> 	
	<div class="back"></div>
	
	<div class="pan center 
	col-xs-12 
	col-sm-10 
	col-md-8
	">
		<?php //include_once("nav.php") ?>
		
		<div class="col-xs-12 page">	
		<div>

			<div class="col-xs-10 col-xs-offset-1">

				<div class="col-xs-12">
					<a href="index.php">VSOC</a> | 
					<a href="login.php">Sign In</a>
				</div>

				
				
				<div class="col-xs-8">
				<div class="login" 
				style="transform: none; position: inherit; left: auto; top: auto;">

			<form method="GET" action="auth.php">

			<input type="hidden" name="action" value="reg">
			<h1>Registration</h1>
			
			
			<div class="col-xs-12 p0 m_bottom">
				<div class="col-xs-12 p0">
					<label>Full name</label>
				</div>
				<div class="col-xs-12 p0 m_bottom">
					<div class="col-xs-6 p0 ">					
						<input type="text" placeholder="First Name"
						name="first_name" required>					
					</div>
					<div class="col-xs-6 p0">					
						<input type="text" placeholder="Last Name"
						name="last_name" required>
						
					</div>
				</div>
				<div class="col-xs-12 p0">
					<label>Email</label>
				</div>
				<div class="col-xs-12 p0 m_bottom50">
					<input type="email" name="email" required>
				</div>

				<div class="col-xs-12 p0">
					<label>Login</label>
				</div>
				<div class="col-xs-12 p0 m_bottom">
					<input type="text" name="login" required>
				</div>
				

				<div class="col-xs-12 p0 ">
					<label>Image</label>
				</div>
				<div class="col-xs-12 p0 m_bottom25">
					<input type="text" name="image" required placeholder="URL: .jpg .png">
				</div>

				<div class="col-xs-12 p0 ">
					<label>Password</label>
				</div>
				<div class="col-xs-12 p0 m_bottom25">
					<input type="password" name="pass" required>
				</div>

				<div class="col-xs-12 p0 ">
					<label>Confirm Password</label>
				</div>
				<div class="col-xs-12 p0 m_bottom25">
					<input type="password" name="confirm" required>
				</div>
				<div class="col-xs-12 p0">
					<input type="submit" value="Register Me">
				</div>
			</div>

			

			</form>
		</div>
		</div>

			<div class="col-xs-4" style="padding-top: 25px;">
				<h4><i class="fa fa-user-circle-o" aria-hidden="true"></i> Recent Users:</h4>
				<?php
				$users = getUsers();
				while ($row = $users->fetch_assoc()) {		    
					echo nbsp(8).
					user_link($row).br();
				}	

				?>
			
			</div>
			</div>
		
			
		</div>

		</div>
		
	</div>
</body>
</html> 
