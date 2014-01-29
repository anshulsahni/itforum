<?php
	session_start();
	if(!(isset($_SESSION['user_id'])))
		{exit;}
	include("../../include/form_elements.php");
	include("../../include/misc.php");
	time::setZone();
	$feedback=new form_elements();
?>
<?php
	if(isset($_POST['feedback_submit']))
	{
		database::connect();
		$user_id=$_SESSION['user_id'];
		$content=$_POST['feedback_content'];
		$date=date('Y/m/d');
		$time=date('h:i:s');
		mysql_query("insert into feedback values(null,'$user_id','$content','$date','$time')");
		database::disconnect();
	}

?>
<html>
	<head>
		<title>IT Forum Feedback</title>
		<script type="text/javascript" src="../../js/size.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/feedback.css">
	</head>
	<body>
		<div id='wrapper'>
			<?php include("../../include/header.inc"); 	?>
			<div id='container'>
				<div id='feedback_form_container'>
					<h2>Feedback</h2>
					<form action='./index.php' method='post' class='form' >
						<textarea cols=50 rows=5 class='input textarea' name='feedback_content'></textarea>
						<br>
						<div class='btn_wrapper'><input type='submit' name='feedback_submit' class='btn feedback_submit'></div>
					</form>
				</div>
			</div>
			<?php include("../../include/footer.inc"); 	?>
		</div>
	</body>
</html>