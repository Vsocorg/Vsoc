<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>VSOC | Login</title> 
	
	<?php include_once("common_resources.php"); ?>

	<link rel="stylesheet" type="text/css" href="css/layout.css">
 </head> 
<body> 	
	<div class="back"></div>
	<div class="pan left"></div>
	<div class="pan right">
		<div class="login">
			<form method="GET" action="auth.php">
			<a href="index.php" class="link"><h1>VSOC</h1></a>
			
			<div class="col-xs-12 p0">
				<div class="col-xs-12 p0">
					<label>Login</label>
				</div>
				<div class="col-xs-12 p0 m_bottom">
					<input type="login" name="login" required>
				</div>
				<div class="col-xs-12 p0 ">
					<label>Pass</label>
				</div>
				<div class="col-xs-12 p0 m_bottom25">
					<input type="password" name="pass" required>
				</div>
				<div class="col-xs-12 p0">
					<input type="submit" value="Sign In">
				</div>
			</div>
				

			</form>
		</div>
	</div>
</body>
</html> 
