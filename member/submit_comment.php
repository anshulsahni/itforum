<?php
	include('../include/misc.php');
	session_start();
	time::setZone();
?>


<?php
	$user_id=$_SESSION['user_id'];
	$session_key=$_SESSION['key'];
	$post_id=$_POST['post'];
	$comment=$_POST['comment'];
	$date=date('Y/m/d');
	$time=date('h:i:s');
	database::connect();
	mysql_query("insert into comments values ($user_id,$post_id,$session_key,'$date','$time','$comment','')") or die("cant insert");
	database::disconnect();

?>