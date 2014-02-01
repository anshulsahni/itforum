<?php
	if(!(isset($_SESSION['key'])))
		exit;
?>

<?php
	include("../include/misc.php");
	time::setZone();
	session_start();
?>
<?php
	$session_id=$_SESSION['key'];
	$date=date("Y/m/d");
	$time=date("h:i:s");
	database::connect();
	mysql_query("update sessions set session_time_end='$time', session_date_end='$date' where session_key='$session_id'") or die(mysql_error());
	database::disconnect();
	session_destroy();
?>
<html>
	<head>
		<title>IT Forum Logout</title>
		<style type="text/css">
			*{padding:0px; margin:0px;}
			#wrapper{position: relative; height: 100%; width:100%;}
			#container{position: relative;}
			p {color:#2c3747; font-size: 25px; display: table; margin:0px auto; top:40px; position: relative;}

		</style>
		<script type="text/javascript" src="../js/size.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php  include("../include/header.inc")	?>		
				<div id="container">
					<p>
						You have been Logged out from your account to Login again Click <a href="../login.php">Login Again</a>
					</p>
				</div>		
			<?php include("../include/footer.inc");	?>
		</div>
	</body>
</html>