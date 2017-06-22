<?php 

	$mysqli = new mysqli("eu-cdbr-azure-north-e.cloudapp.net", 
		"bc1054a31f960e", "4cd2d283", "db_vsoc");
	
	if(isset($_GET["login"])){
		auth($_GET["login"],$_GET["pass"]);
	}



	function auth($log,$pass){
		global $mysqli;
		checkUser($log);
		/////////////
	}



		
	function checkUser($log){
		global $mysqli;
		$query = "SELECT * FROM users WHERE login =".$log; 
		$result = $mysqli->query($query); 
		return $result;
	}	



	//showUsers(getUsers());

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
?>