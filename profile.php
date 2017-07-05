<?php session_start();
if(!isset($_SESSION["User"])){
	header('Location: login.php');				
			}


	include_once("db_queries.php");


	$user = $_SESSION["User"];
	$me = true;
	if(isset($_GET["id"])){
		$user = getUser($_GET["id"]);
		$me = false;

		if($user["id"]== $_SESSION["User"]["id"])
			$me = true;
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
	<link rel="stylesheet" href="css/btn-friend.css">
 </head> 
<body> 	
	<div class="back"></div>

	<!-- Modal -->
	<div class="modal fade" id="myModalSendMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <span class="modal-title" id="exampleModalLabel">
	        <?= $user["first_name"]." ".$user["last_name"] ?> | 
	        	<a href="profile.php">@ <?= $user["login"]?></a>
	        </span>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      <style>
	      #modalMessageTextarea{
	      	width: 100%;
	      	height: 140px;
	      }

	      	
	      </style>
	      	<form action="send_message.php" method="POST"  id="messageForm" style="width: 100%;">
	      		<div class="msg-input">
					<textarea placeholder="Type message here..." id="modalMessageTextarea" name="text"></textarea>
					<button class="msg-submit" 
					style="bottom: 30px;right: 20px;"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
				</div>
	        	<!--<textarea name="text" id="modalMessageTextarea" cols="30" rows="10" placeholder="Type message here..."></textarea>-->
	        </form>
	        <script type="text/javascript">
			    var frm = $('#messageForm');

			    frm.submit(function (e) {

			        e.preventDefault();

			        $.ajax({
			            type: frm.attr('method'),
			            url: frm.attr('action'),
			            data: frm.serialize(),
			            success: function (data) {
			                console.log('Submission was successful.');
			                console.log(data);
			                $('#myModalSendMessage').modal('hide');
			                alert("Successful send.");
			            },
			            error: function (data) {
			                console.log('An error occurred.');
			                console.log(data);
			                alert("Error occured.");
			            },
			        });
			    });
			</script>
	        <!--
	        <script>
	        	  $('#modalMessageTextarea').keydown(function(event) {
				    if (event.keyCode == 13) {
				        $(this.form).submit()
				        return false;
				     }
				})
	        </script>-->
	      </div>
	      <!--<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>-->
	    </div>
	  </div>
	</div>
	
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

<?php 

if($me)
	echo '<div class="btn-friend none">';
else{

	$friend = true;
	$waiting = true;

	$str = '<div class="btn-friend '; 
	if($friend)
		$str.='friend ';
	if($waiting)
		$str.='waiting ';

	$str.='">';
	echo $str;

}
?>
					<!--<div class="btn-friend none- friend- waiting-">-->
						<span id="f1">
							<a href="#" title="Friend request.">
								<i class="fa fa-user-plus" aria-hidden="true"></i>
							</a>
						</span>
						<span id="f2">
							<a href="#" title="Remove from friends.">
								<i class="fa fa-user-times" aria-hidden="true"></i>
							</a>
						</span>
						<span id="f3">
							<a href="#" title="Waiting for friend request.">
								<i class="fa fa-users" aria-hidden="true"></i>	
							</a>
						</span>
						<span id="f4">
							<a href="#" title="Waiting request. Undo friend request?">
								<i class="fa fa-users" aria-hidden="true"></i>	
							</a>
						</span>
					</div>
					
				
					
					<?php
					if(!$me){
						$_SESSION["target_user"] = $user;
						/*echo '<a href="dialogs.php" title="Send message."><i class="fa fa-comment" aria-hidden="true"></i></a>';*/
						echo '  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalSendMessage">
								  <i class="fa fa-comment" aria-hidden="true"></i>
								</button>';
					}
					else{
						echo '<a href="#" title="Edit profile."><i class="fa fa-pencil t_black" aria-hidden="true"></i></a>';

					}
					?>
					
				</div>
				<h3 class="p0 m0" id="profile-head"><b id="profile-name">
				<?= $user["first_name"]." ".$user["last_name"] ?></b> <small>online</small>
				<?php if($me)echo tag("small",", it's you");?></h3><br>


					<div class="profile-info">
					<?php
					 //if($me)
					 	//echo tag("p",nbsp(8)."This is your profile.");
					 	
					?>
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
