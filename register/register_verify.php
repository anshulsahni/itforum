<?php
	include('../include/misc.php');
	time::setZone();
?>
<?php
	if(isset($_POST['register_submit']))
	{
		$reg_no=$_POST['reg_no'];
		$user1=$_POST['user1'];
		$user2=$_POST['user2'];
		$email=$_POST['email'];
		$name=$_POST['name'];
		$year=$_POST['year'];
		$section=$_POST['section'];
		$hometown=$_POST['hometown'];
		$number=$_POST['number'];
		if(strlen($reg_no)!=10 || strlen($user1)<6 || strlen($user2)>15 || strlen($email)>50 || strlen($name)>30 || strlen($hometown)>30 || strlen($number)!=10 || $user1!=$user2 || substr($reg_no,0,4)!='1081' || ($year!='1' && $year!='2' && $year!='3' && $year!='4'))
			echo "Wrong and corrupted data sent";
		else
		{
			database::connect();
			$verify_query_result=mysql_query("select * from members where reg_no='$reg_no'");
			if(mysql_num_rows($verify_query_result)>0)
			{
				$verify=mysql_fetch_assoc($verify_query_result);
				echo "The register number $reg_no is already registered with Email Address ".$verify['semail'];
				exit;
			}
			$verify_query_result=mysql_query("select * from members where snumber='$number'");
			if(mysql_num_rows($verify_query_result)>0)
				{echo "The mobile number $number is already associated with another account"; exit;}
			$verify_query_result=mysql_query("select * from members where semail='$email'");
			if(mysql_num_rows($verify_query_result)>0)
				{echo "The email address $email is already associated with another account"; exit;}
		}
	}
?>