<?php
	include('../include/misc.php');
	time::setzone();
?>

<?php
	if(isset($_POST['reg_no']))
	{
		$reg_no=$_POST['reg_no'];
		$user1=md5($_POST['user1']);
		$email=$_POST['email'];
		$name=$_POST['name'];
		$year=$_POST['year'];
		$section=$_POST['section'];
		$hometown=$_POST['hometown'];
		$number=$_POST['number'];
		$dp=$_POST['dp'];
		$date=date('Y/m/d');
		$time=date('h:i:s');
		database::connect();

		generate_user_id:	
		$key1=rand(10000,99999);
		$key2=rand(10000,99999);
		$user_id=$key1.$key2;
		$result=mysql_query("select * from members where user_id='$user_id'");
		if(mysql_num_rows($result)>0)
			goto generate_user_id;

		generate_ver_code:
		$key1=rand(1000000,9999999);
		$key2=rand(1000000,9999999);
		$ver_code=$key1.$key2;
		$ver_code=md5($ver_code);
		$result=mysql_query("select * from non_verified_member where secret_code='$ver_code'");
		if(mysql_num_rows($result)>0)
			goto generate_ver_code;

		mysql_query("insert into members values('','$reg_no','$user1','$email','$name','$section','$year','$hometown','$number',false,'',true,'$user_id','$date','$time','','','$dp')") or die(mysql_error());
		mysql_query("insert into non_verified_member values ('','$reg_no','$email','$ver_code','$date','$time')") or die(mysql_error());
		database::disconnect();

		$mail_content="This is an auto generated mail from the IT Association Forum,SRM University,Chennai Please click the following link to confirm your registration at IT Association Forum, SRM University";
		$mail_content.="connecting.hostingsiteforfree.com/itforum/register/email_verify.php?em_code=$ver_code";
		$mail_content.="If you have not registered on IT Association Forum then kindly please ignore this email<br><br><br>Regards Team IT Association";
		$headers="From: support@itassociation.in";
		mail($email,"Registration Verification",$mail_content,$headers);
		echo "<head><style type='text/css'>#register_form_holder{padding-left:10px; padding-right:10px;}</style></head>";
		echo "Your registered data has been recorded<br><br>Welcome to IT Association Forum<br><br>A verfication link has been sent to your email id <b>$email</b><br>Please verfiy your email id clicking the link sent to verify";
	}
	else
		{echo "Illegal Entry into the page";}
?>