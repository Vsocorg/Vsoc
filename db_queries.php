<?php 
	//session_start();
	$mysqli = new mysqli("eu-cdbr-azure-north-e.cloudapp.net", 
		"bc1054a31f960e", "4cd2d283", "db_vsoc");




////////////////////////Checks//////////////////////////////
	function check_signin(){
		if(isset($_GET["login"]))
		{
			$user = auth($_GET["login"],$_GET["pass"]);
			if(
				 $user != null
				){
				setcookie('user', md5($_GET["login"].$_GET["pass"]) ,time()+2592000);

				$_SESSION["User"] = $user;

				header('Location: profile.php');
			}
			else header('Location: login.php');
			
		}
	}

	

	function check_logout(){
		if(isset($_GET["action"]) and $_GET["action"] == "logout")
		{
			if(isset($_SESSION["User"]))
			{
				$_SESSION["User"] = null;
				setcookie('user',"",time()-1000);
			}
		header('Location: login.php');
		}		
	}

////////////////////////AUTH//////////////////////////////

	function auth($log,$pass){
		global $mysqli;
		$user = checkUser($log);
		$res = null;
		if(count($user)==1 ){
			while ($row = $user->fetch_assoc()){
				if($row["password"] == $pass){
					$res = $row;	
				}
			}			
			
		}
		return $res;
	}





		
	function checkUser($log){
		global $mysqli;
		$query = "SELECT * FROM users WHERE login ="."'".$log."'"; 
		$result = $mysqli->query($query); 
		return $result;
	}	

////////////////////////PROFILE&IMAGES//////////////////////////////

	function getProfileImages($user_id){
		global $mysqli;
		$query = "SELECT * FROM images WHERE owner_id = ".$user_id; 
		$result = $mysqli->query($query); 
		
		//var_dump($result);

		$imgs = [];
		while ($row = $result->fetch_assoc()) {		    
			$imgs[] = $row;
		}
		return $imgs;
	}
	

	function getAvatar($user_id){
		$img_id = getUser($user_id)["image_id"];
		$imgs = getProfileImages($user_id);

		$res = null;

		foreach ($imgs as $img ) {

			if($img["id"] == $img_id){
				$res = $img;
				break;
			}
		}

		return $res;
		
	}


////////////////////////USERS//////////////////////////////
	function getUser($user_id){
		//echo "UserId: ".$user_id."<br>";
		global $mysqli;
		$query = "SELECT * FROM users WHERE id=".$user_id; 
		$result = $mysqli->query($query); 

		return $result->fetch_assoc(); 
		$res = null;
		while ($row = $result->fetch_assoc()) {		    
			$res = $row;
			break;
		}
		
		return $res;
	}	

	function getUsers(){
		global $mysqli;
		$query = "SELECT * FROM users"; 
		$result = $mysqli->query($query); 

		
		return $result;
	}
	function showUsers($prod){		

		

		while ($row = $prod->fetch_assoc()) {		    
			var_dump($row);
		    echo "<br>";

		}
	
	}


	//////////////////////////Dialogs////////////////////////////////////
	function getDialogs($user_id){
		global $mysqli;
		$query = "SELECT * FROM dialogs_users,dialogs WHERE dialogs.id = dialogs_users.dialogs_id and dialogs_users.users_id =".$user_id; 
		$result = $mysqli->query($query); 

		$res = [];
		while ($row = $result->fetch_assoc()) {		    			
		    $res[] = $row;
		}

		return $res;
	}



?>