<?php session_start() ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>VSOC | Dalogs</title> 
	<?php include_once("common_resources.php"); ?>

	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/scroll.css">

	<style type="text/css">
		.dialog-list{
			font-size: 14pt;
		}
		.dialog-element,
		.dialog-element-head{
			height: 60px;
			line-height: 50px;
			margin-bottom: 10px;
			padding: 5px !important;	
			
		}
		.dialog-element{
			cursor: pointer;
		}
		.dialog-element-head{
			background-color: rgba(139, 171, 224,0.3);
			color:#264d8e;
			letter-spacing: 1px;
			text-align:center;
			margin-bottom: 	0px;
		}
		.dialog-element:hover{
			background-color: rgba(0,0,0,0.1);
		}
		.user-icon{
			width: 50px;
			height: 50px;
			background-size: cover;
			float: left;
			margin-right: 10px;

			border-radius: 50%;
			border:2px solid #8babe0;
		}

		.chat div{
			padding: 0;
		}
		.close{
			opacity: 0;
			transition: 1s;
			color:white;
		}
		div:hover > .close{
			opacity: 1;
			transition: .5s;
		}
		.close{
			position: absolute;
			right: 15px;
			top:10px;
		}

		.dialog-element-head .name{
			font-size: 18pt;
			font-weight: 900;
		}

		.message{
			font-size: 14pt;
			background-color: white;
			width: 200px;
			clear: both;
			padding: 15px !important;
		}

		.message small{
			display: block;
			color:gray;
			font-family: Arial;
			width: 100%;

		}

		.message.r{
			float: right;
			text-align: right;
			padding-right: 25px;
		}
		.message.r small{
			text-align: left;
		}
		.message.l{
			text-align: left;
			padding-left: 25px;
		}
		.message.l small{
			text-align: right;
		}

		.date{
			text-align: center;
			font-size: 12pt;
			
			margin-bottom: 10px;
			padding: 2px !important;
			color:gray;
		}

		.chat-panel .panel{
			background-color: rgba(0,0,0,0.04);
			padding: 10px !important; 
			padding-top: 0px !important;
			
			height: 300px;
			overflow-y: scroll !important;


		}


	</style>
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
			<?php
				function dialog_element(
					$name, 
					$url="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png"
				){
					return "
				<a>
				<div class='dialog-element'>
					<div class='user-icon' style='background-image:url($url);'>
					</div>
					<span>@$name</span>
				</div>
				</a>
					";

				}

			?>

			<script type="text/javascript">
				$(".dialog-element").click(function(){
					alert("asd");
				});
			</script>
			<div class="row chat">
			<div class="col-xs-3 dialog-list">
				<div class='dialog-element-head'>Dialogs:</div>
				<?php
					echo dialog_element("martinyy",
						"https://s-media-cache-ak0.pinimg.com/736x/ea/3e/b1/ea3eb1e85e6f83e8e50bbf4567689236--only-girl-a-girl.jpg");
					echo dialog_element("johndoe",
						"https://s-media-cache-ak0.pinimg.com/736x/30/5a/fb/305afbd8e6e36fd72283931f7db47708--girl-face-drawing-face-drawings.jpg");
					echo dialog_element("jamesd",
						"https://s-media-cache-ak0.pinimg.com/736x/b5/a6/3b/b5a63b0da8d66df3dd10f269be70ea88--always-smile-face-oil.jpg");
				?>				
			</div>	

			<div class="col-xs-9 chat-panel">
			<div class='dialog-element-head'>
				<span class="name">John Doe</span>
				
				<div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
			</div>
				<div class="panel">
					<div class="date">today</div>
					<div class="message r">
					<small>13:23</small>
					Hello!</div>
					<div class="message l">
					<small>13:24</small>
					Hi :)</div>
					<div class="message r">
					<small>13:28</small>
					How ru?</div>
					<div class="message l">
					<small>13:40</small>
					Lorem ipsum. Dolore az...
					</div>
					<div class="message l">
					<small>13:40</small>
					Lorem ipsum. Dolore az...
					</div>
					</div>
					
			</div>	
		</div>

		</div>
		
	</div>
</body>
</html> 