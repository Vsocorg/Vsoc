<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
function br($n = 1){
	return strN("<br>",$n);
}
function nbsp($n=1){
	return strN("&nbsp;",$n);
}
function tag($tag_name,$content){
	return 
	'<'.$tag_name.'>'.
	$content.
	'</'.$tag_name.'>';
}
function deb($str){
	echo tag("div class='debuglog'",$str);
}

function strN($str,$n = 1){
	$res = "";
	for ($i=0; $i < $n; $i++) { 
		$res.=$str;
	}

	return $res;

}

function user_link($user){
	return tag('a href = "profile.php?id='.$user["id"].'"','@'.$user["login"]);
}



?>
