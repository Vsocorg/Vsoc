<?php 
	//session_start();
	$mysqli = new mysqli("eu-cdbr-azure-north-e.cloudapp.net", 
		"bc1054a31f960e", "4cd2d283", "db_vsoc");
////////////////////////Checks//////////////////////////////
	function check_signin(){
		if(isset($_GET["action"]) and $_GET["action"] == "login"){

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
	function check_img(){
		if(isset($_GET["action"]) and $_GET["action"] == "img"){
			getImages();
		}
	}
	function check_reg(){
		if(isset($_GET["action"]) and $_GET["action"] == "reg"){

			//Совпадение паролей
			if(
				isset($_GET["pass"]) and
				isset($_GET["confirm"])				
				)
				if($_GET["pass"] != $_GET["confirm"])
					echo "header('Location: reg.php')";


			//Все параметры
			if(
				isset($_GET["first_name"]) and
				isset($_GET["last_name"]) and
				isset($_GET["login"]) and
				isset($_GET["image"]) and
				isset($_GET["email"]) and
				isset($_GET["pass"])
				){
				echo "isset all<br>";
				regUser(
					$_GET["first_name"],
					$_GET["last_name"],
					$_GET["login"],
					$_GET["image"],
					$_GET["email"],
					$_GET["pass"]
				);
				echo "header('Location: profile.php')";
			}

			echo "header('Location: reg.php') 2";
		}
		echo "header('Location: reg.php') 3";

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

	function regUser($f_name,$l_name,$login,$img_url,$email,$pass){
		getImages();
		//return;

		//Добавляем кратинку, получайм id
		$img_id = null;

		if(validImageUrl($img_url)){
			echo "adding image<br>";
			$img_id = addImage($img_url);
		}
/*
		//Добавляем пользователя
		$user_id = addUser($f_name,$l_name,$login,$img_id,$email,$pass,"No info.");

		$user = getUser($user_id);


		setcookie('user', md5($_GET["login"].$_GET["pass"]) ,time()+2592000);
		$_SESSION["User"] = $user;

		echo "Reged: ".$user["id"];*/
		//header('Location: profile.php');

	}

////////////////////////PROFILE&IMAGES//////////////////////////////

	function getImages(){
		$d = get("SELECT * FROM images");
		echo "Images: <br>";

		foreach ($d as $el ) {
			echo "id ".$el['id']." ".$el["path"]."<br>";
		}
		//var_dump($d);
		

	}

	function addImageWithOwner($url,$owner_id){		
		$query = "INSERT INTO `images` (`path`, `security`, `owner_id`) VALUES ('$url', '0', '$owner_id');";
		return insert($query);
	}
	function addImage($url){
		$query = "INSERT INTO `images` (`path`, `security`) VALUES ('$url', '0');";
		return insert($query);
	}


	function getImage($id){
		global $mysqli;
		$query = "SELECT * FROM images WHERE id = ".$id; 
		$result = $mysqli->query($query); 
		
		//var_dump($result);

		$img = null;
		while ($row = $result->fetch_assoc()) {		    
			$img = $row;
			break;
		}

		return $img;
	}

	//jpg png
	function validImageUrl($url){
		return true;
	}

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

	function addUser($f_name,$l_name,$login,$img_id,$email,$pass,$info){
		//insert id
		return insert(
			"INSERT INTO `users` (`login`, `first_name`, `last_name`, `email`, `password`, `salt`, `image_id`, `info`) 
			VALUES (
			'$login',
			'$f_name',
			'$l_name',
			'$email',
			'$pass',
			'$pass',
			'$img_id',
			'$info');");

	}
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
		$query = "
		SELECT * 
		FROM dialogs_users,dialogs 
		WHERE dialogs.id = dialogs_users.dialogs_id 
		and dialogs_users.users_id =".$user_id;

		$result = $mysqli->query($query); 

		$res = [];
		while ($row = $result->fetch_assoc()) {		    			
		    $res[] = $row;
		}

		return $res;
	}

	//Переданный пользователь будет по индексу 0
	function getDialogUsers($dialog_id,$except_id = null){
		global $mysqli;
		$query = "
		SELECT 
		dialogs_users.users_id as 'id', 
		users.login as 'login',
		users.email, images.path as 'image'
		FROM dialogs_users,dialogs,users,images
		WHERE 
		users.id =  dialogs_users.users_id and
		images.id = users.image_id and
		dialogs.id = dialogs_users.dialogs_id and dialogs_users.dialogs_id =".$dialog_id; 
		$result = $mysqli->query($query); 

		$res = [];
		
		while ($row = $result->fetch_assoc()) {		    	
			if($row["id"]!= $except_id)		
		    	$res[] = $row;
		    // Нас в начало
		    else 
		    	array_unshift($res,$row);
		}
		
		

		return $res;
	}



//////////////////////////////////////////////////////
	function insert($query){
		global $mysqli;		

		$result = $mysqli->query($query); 
		
		echo "insert: id ".$mysqli->insert_id.".<br>";
		return $mysqli->insert_id;
	}
	function get($query){
		global $mysqli;		
		$result = $mysqli->query($query); 		

		$res = [];
		while ($row = $result->fetch_assoc()) {		    			
		    $res[] = $row;
		}

		return $res;
	}

?>