<?php session_start();
	include_once("db_queries.php");

	if(isset($_POST["text"])){
		$user = $_SESSION["User"];
		$other = $_SESSION["target_user"];
		$date = date("Y-m-d H:i:s");
		$text = $_POST["text"];
		echo "other: ".$other["id"]." ".$date."<br>";
		sendMessage(
			$user["id"],
			$other["id"],
			$text,
			$date
			);
	}
?>