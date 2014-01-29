<?php
	session_start();
	if(!(isset($_SESSION['user_id'])))
		{exit;}
	include("../../include/form_elements.php");
	include("../../include/misc.php");
	time::setZone();
	$complaint=new form_elements();
?>
<?php
	if(isset($_POST['complaint_submit']))
	{
		database::connect();
		$user_id=$_SESSION['user_id'];
		$content=$_POST['complaint_content'];
		$date=date('Y/m/d');
		$time=date('h:i:s');
		mysql_query("insert into complaints values(null,'$user_id','$content','$date','$time')");
		database::disconnect();
	}
?>
<html>
	<head>
		<title>IT Forum Complaints</title>
		<script type="text/javascript" src="../../js/size.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/complaint.css">
	</head>
	<body>
		<div id='wrapper'>
			<?php include("../../include/header.inc"); 	?>
			<div id='container'>
				<div id='complaint_form_container'>
					<h2>Register Your Complaint</h2>
					<form action='./index.php' method='post' class='form' >
						<textarea cols=50 rows=5 class='input textarea' name='complaint_content'></textarea>
						<br>
						<div class='btn_wrapper'><input type='submit' name='complaint_submit' class='btn complaint_submit'></div>
					</form>
				</div>
			</div>
			<?php include("../../include/footer.inc"); 	?>
		</div>
	</body>
</html>