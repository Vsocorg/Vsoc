<?php 
	session_start();

	include_once("db_queries.php");
		
	check_signin();
	check_logout();
?>