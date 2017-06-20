<?php 
$data = [
"admin"=>"admin",
"user1"=>"user1",
"user2"=>"user2"
];
$str = "Вы не авторизированы!";
if(isset($_POST["log"]) and isset($_POST["pass"])){
	if(check($_POST["log"],$_POST["pass"])==true)
		$str =  "Вы авторизированы!";
}
if(isset($_GET["log"]) and isset($_GET["pass"])){
	if(check($_GET["log"],$_GET["pass"])==true)
		$str =  "Вы авторизированы!";
}
echo $str;
function check($log,$pass){
	global $data;
	$res = false;
	if(isset($data[$log]))
		if($data[$log] == $pass)
			$res = true;
	return $res;
}
?>