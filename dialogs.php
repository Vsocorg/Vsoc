<?php session_start();
	if(!isset($_SESSION["User"]))
		header('Location: login.php');				

	include_once("db_queries.php");
	include_once("dialogs_api.php");

	$dm = new DialogManager(
		$_SESSION["User"]["id"],
		true,
		false);

	$dialogs = $dm->dialogs;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>VSOC | Dalogs</title> 

	<?php 
		include_once("common_resources.php"); 
	?>

	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/scroll.css">

	<link rel="stylesheet" type="text/css" href="css/dialogs.css">
 </head> 
<body> 	
	<div class="back"></div>
	
	<div class="pan center 
	col-xs-12 
	col-sm-10 
	col-md-8
	" style="overflow-y: scroll;">

		<?php 
			include_once("nav.php") 
		?>

		<div class="col-xs-12 page">	
		
		<!--
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
			-->
			

			<script type="text/javascript">
				$(".dialog-element").click(function(){
					alert("asd");
				});
			</script>
			<div class="row chat">
			<div class="col-xs-3 dialog-list">
				<div class='dialog-element-head'>
					Dialogs:
				</div>

				<?php					

					if($dm->hasDialogs())
						$dm->echoDialogs();		
					else{ 
						echo br().
						tag("p class='hcenter'",
							"No dialogs?".br(2)."Try to chat with:".br().
							user_link(getUser(31)).br().
							user_link(getUser(41))
							);
						
						;
						
						
					}


					//echo group_element("test");			
				?>				

			</div>	

			<div class="col-xs-9 chat-panel">
			<div class='dialog-element-head'>
				<span class="name">John Doe</span>
				
				<div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
			</div>
				
				<div class="panel">			
					<div class="msg-block" exp = "true">					
						<div class="msg-date expand">
							<div class="msg-expander">
								<i class="fa fa-chevron-up" aria-hidden="true"></i>
								<i class="fa fa-chevron-down" aria-hidden="true"></i>
							</div>28.06.17
							</div>	
						<div class="msg-container">
							<div class="message r">
							<small>28.06.17<span class="light">13:23</span></small>
							Hello!</div>
							<div class="message l">
							<small>28.06.17<span class="light">13:24</span></small>
							Hi :)</div>
							<div class="message r">
							<small>28.06.17<span class="light">13:28</span></small>	
							How ru?</div>						
						</div>						
					</div>	
					<div class="msg-block" exp = "false">				
						<div class="msg-date expand">
							<div class="msg-expander">
								<i class="fa fa-chevron-up" aria-hidden="true"></i>
								<i class="fa fa-chevron-down" aria-hidden="true"></i>
							</div>29.06.17
						</div>	
						<div class="msg-container">
							<div class="message l">
							<small>29.06.17<span class="light">13:40</span></small>
							Hello!</div>
							<div class="message l">
							<small>29.06.17<span class="light">13:40</span></small>
							Hi :)</div>
							<div class="message l">
							<small>29.06.17<span class="light">13:40</span></small>	
							How ru?</div>						
						</div>						
					</div>	
					<div class="msg-block" exp = "true">				
						<div class="msg-date expand">
							<div class="msg-expander">
								<i class="fa fa-chevron-up" aria-hidden="true"></i>
								<i class="fa fa-chevron-down" aria-hidden="true"></i>
							</div>30.06.17
						</div>	
						<div class="msg-container">
							<div class="message l">
							<small>30.06.17<span class="light">13:40</span></small>
							Hello!</div>
							<div class="message l">
							<small>30.06.17<span class="light">13:40</span></small>
							Hi :)</div>
							<div class="message l">
							<small>30.06.17<span class="light">13:40</span></small>	
							How ru?</div>						
						</div>						
					</div>	
				</div>
				<div class="msg-input">
					<textarea placeholder="Type message here..."></textarea>
					<button class="msg-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
				</div>
					
			</div>	
		</div>

		</div>

		<?php 
		echo "USER_ID: ".$_SESSION["User"]["id"].br(2);
		

		
		
		/*
		$dialogs = getDialogs($_SESSION["User"]["id"]);
		foreach ($dialogs as $dlg) {
			echo $dlg["name"].nbsp(2);
			$users = getDialogUsers($dlg["id"]);
			
			foreach ($users as $user) 
				echo br(1).nbsp(5)."ID: ".$user['id'].nbsp(2).$user['login'].
				br().nbsp(5)."IMG: ".$user['image'].
				br();
			
			echo br();
		}
		*/
		?>
		
	</div>

	<script type="text/javascript">
		$('.chat-panel .panel').scrollTop($('.chat-panel .panel')[0].scrollHeight);


		$(".expand").click(function(){
			$exp = true;
			if($(this).parent().attr("exp") == "true")
				$exp = false;

			exp($(this).parent().find(".msg-container"), $exp)
			$(this).parent().attr("exp",$exp)
			
		});

		
		function exp($el,$val){
			if($val){
				$el.stop();
				$el.animate({
					height: $el.get(0).scrollHeight
				},500,null);
			}
			else{
				$el.stop();
				$el.animate({
					height: 0
				},500,null);
			}
		}


		
	</script>
</body>
</html> 