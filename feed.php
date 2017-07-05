<?php session_start();
if(!isset($_SESSION["User"])){
	header('Location: login.php');				
			}


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
		<?php include_once("nav.php") ?>
		
		<div class="col-xs-12 page">	
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<h1>Feed</h1>
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
</body>
</html> 
