<?php session_start() ?>

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
			<a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i></a>		
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
				<select name="sometext" size="5" style="width: 300px;height: 500px;">
  						<option>Dialog1</option>
 					    <option>Dialog2</option>
   						<option>Dialog3</option>
  						<option>Dialog4</option>
  						<option>Dialog5</option>
			</select>
			</div>
			<div class="col-xs-7 ">	
			 	 <form action="model.php" method="post">
  					 <p><textarea name="last_messeges" readonly style="width: 300px;height: 200px; resize: none;"></textarea>


  					 
  					 </p><input type="text" name="messege_send" style="width: 300px;"><p>
  					 <input type="submit" ></p>
  				</form>
			</div>		
		</div>

		</div>
		
	</div>
</body>
</html> 