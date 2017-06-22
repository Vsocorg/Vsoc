<?php 
session_start();

	$mysqli = new mysqli("eu-cdbr-azure-north-e.cloudapp.net", 
		"bc1054a31f960e", "4cd2d283", "db_vsoc");
	
	if(isset($_GET["login"])){
		$user = auth($_GET["login"],$_GET["pass"]);
		if(
			 $user != null
			){
			setcookie('user', md5($_GET["login"].$_GET["pass"]) ,time()+2592000);

			$_SESSION["User"] = $user;

			var_dump($_SESSION["User"]);
			echo "auth";
		}
		else echo "no auth ";
		var_dump($user);
	}



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
		//var_dump($res);
		
		
		
		return $res;
	}



		
	function checkUser($log){
		global $mysqli;
		$query = "SELECT * FROM users WHERE login ="."'".$log."'"; 
		$result = $mysqli->query($query); 

		

		return $result;
	}	


echo "<br><br><br>";
	//showUsers(getUsers());

	function getUsers(){
		global $mysqli;
		$query = "SELECT * FROM users"; 
		$result = $mysqli->query($query); 

		//var_dump($result);
		return $result;
	}
	function showUsers($prod){		

		

		while ($row = $prod->fetch_assoc()) {		    
			var_dump($row);
		    echo "<br>";

		}
	
	}
?>