<?php
	if(isset($_GET['fld']) && !(isset($_GET['submit_change'])))
	{
		include("../../include/misc.php");
		time::setZone();
		session_start();
		$user_id=$_SESSION['user_id'];
		$fld=$_GET['fld'];
		database::connect();
		$change_member=mysql_query("select $fld from members where user_id='$user_id'");
		database::disconnect();
		$change_member=mysql_fetch_array($change_member);
		echo $change_member[0];
	}
?>
<?php
	if(isset($_GET['submit_change']))
	{
		include("../../include/misc.php");
		session_start();
		$user_id=$_SESSION['user_id'];
		$fld=$_GET['fld'];
		$vlu=$_GET['vlu'];
		database::connect();
		echo "update members set $fld='$vlu' where user_id='$user_id'";
		mysql_query("update members set $fld='$vlu' where user_id='$user_id'") or die("cant change");
		database::disconnect();
	}

?>