<?php
	require_once('./include/misc.php');
	database::connect();
	$register=htmlentities($_POST['register']);
	$user1=md5(htmlentities($_POST['user1']));

	$login_query="select * from members where reg_no='$register' and user1='$user1'";
	$login_query_result=mysql_query($login_query);
	$login_query_result=mysql_fetch_array($login_query_result);
	if($login_query_result)
	{
		if($login_query_result['enabled']==0)
			header('Location: ./error?err=account_disabled');
		else if($login_query_result['email_verified']==0)
			header('Location: ./error?err=email_not_verified');
		//code to generate the random key for sessions
		else 			
		{
			generate_key:							
			$key=rand(); 
			$session_query_result=mysql_query("select * from sessions where session_key=$key");
			$session_query_result=mysql_fetch_assoc($session_query_result);
			if($session_query_result)
			{goto generate_key;}				

			session_start();
			$_SESSION['key']=$key;
			$_SESSION['user_id']=$login_query_result['user_id'];
			$_SESSION['reg_no']=$login_query_result['reg_no'];
			$_SESSION['sname']=$login_query_result['sname'];
			$_SESSION['ssection']=$login_query_result['ssection'];
			$_SESSION['syear']=$login_query_result['syear'];

			$session_start_time=date('h:i:s');
			$session_start_date=date('Y/m/d');

			$session_insert_query='insert into sessions(session_key,session_time_start,user_id,session_date_start) values ("'.$key.'","'.$session_start_time.'","'.$_SESSION['user_id'].'","'.$session_start_date.'")';
			mysql_query($session_insert_query);
			
			// setcookie('gdwgh',md5($_SERVER['key']));
			// setcookie('gdwgh1',md5($_SERVER['user_id']));
			database::disconnect();
			header('Location: ./member');
		}
	}
	else
	{ database::disconnect(); header('Location: ./login.php');}
?>