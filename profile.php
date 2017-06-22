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
	<title>Title Goes Here</title> 


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
		<nav class="col-xs-12 nav m_bottom25">
			<a href="index.php" class="link link-main">VSOC</a>

			<div class="sep"></div>		

			<div class="link-container">
			<a href="profile.php" class="link link-menu">
				<i class="fa fa-user" aria-hidden="true"></i>				
			</a>
			<div class="nav-menu">
					<a href="profile.php">My Profile</a>
					<a href="auth.php?action=logout">Log Out</a>
				</div>		
			</div>
				
			<div class="sep"></div>		
			
			
			<a href="#" class="link">
				<i class="fa fa-comment" aria-hidden="true"></i>
				<sub>3</sub>
			</a>
			<a href="#" class="link">
				<i class="fa fa-bell" aria-hidden="true"></i>
				<sub>52</sub>
			</a>			
		</nav>
		<div class="col-xs-12 page">	
		<div class="row">
			<div class="col-xs-5 main-photo">	
				<img src="<?=getAvatar($_SESSION["User"]["id"])["path"]?>" alt="">
			</div>
			<div class="col-xs-7 ">	
				<div class="profile-btns">
					<a href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
				</div>
				<h3 class="p0 m0" id="profile-head"><b id="profile-name">
				<?= $_SESSION["User"]["first_name"]." ".$_SESSION["User"]["last_name"] ?></b> <small>online</small></h3><br>	

					<div class="profile-info">
				<p> <b>Age:</b> 61 y.o.</p>
				<p> <b>Profession: </b>photographer</p>
				<p>  <b>Location:</b> Odessa</p>
				<p> <b>About:</b> <?= $_SESSION["User"]["info"] ?></p>		
				</div>
			</div>		
		</div>

		</div>
		
	</div>
</body>
</html> 
