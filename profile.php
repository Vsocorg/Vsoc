<?php session_start();
if(!isset($_SESSION["User"])){
	header('Location: login.php');				
			}


	include_once("db_queries.php");


	$user = $_SESSION["User"];
	if(isset($_GET["id"])){
		$user = getUser($_GET["id"]);

		

	}
	
	
			

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
		<?php 
				if(is_null($user)){
					echo tag(
						"h2 class='t_color hcenter'",
						"User not found. ");
					echo 
					tag("div class='hcenter'",
						tag(
							"a href='feed.php' class='hcenter'",
							"Feed").
						br().
						tag(
							"a href='profile.php' class='hcenter'",
							"My page")
						);
				}
			?>

			<div class="col-xs-5 main-photo">	
				<img src="<?=getAvatar($user["id"])["path"]?>" alt="">
			</div>
			<div class="col-xs-7 ">	

				<div class="profile-btns">
					<a href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
				</div>
				<h3 class="p0 m0" id="profile-head"><b id="profile-name">
				<?= $user["first_name"]." ".$user["last_name"] ?></b> <small>online</small></h3><br>	

					<div class="profile-info">
				<p> <b>Age:</b> 61 y.o.</p>
				<p> <b>Profession: </b>photographer</p>
				<p> <b>Location:</b> Odessa</p>
				<p> <b>About:</b> <?= $user["info"] ?></p>		

				</div>
			</div>		
		</div>

		</div>
		
	</div>
</body>
</html> 
