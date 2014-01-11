<?php
	require_once('./include/connect.php');

	$register=htmlentities($_POST['register']);
	$user1=md5(htmlentities($_POST['user1']));

	$login_query="select * from members where reg_no='$register' and user1='$user1'";	
	$login_query_result=mysql_query($login_query);
	$login_query_result=mysql_fetch_array($login_query_result);

	if($login_query_result)			//code to generate the random key for sessions
	{
		generate_key:							
		$key=rand(); 
		$session_query_result=mysql_query('select * from sessions');
		$flag=0;
		while($row=mysql_fetch_assoc($session_query_result))
		{
			if($row['key']==md5($key))
			{$flag=1; break;}
		}
		if ($flag==1)
		{$flag=0; goto generate_key;}


		session_start();
		$_SESSION['key']=$key;
		$_SESSION['user_id']=$login_query_result['user_id'];
		$session_start_time=date('h:i:s');
		$session_start_date=date('Y/m/d');

		$query='insert into sessions(key,session_start_time,user_id,session_date_start) values ("'.md5($key).'","'.$session_start_time.'","'.md5($user_id).'","'.$session_start_date.'")';
		mysql_query($query);		
		header('Location: ./member');
	}
	else
	{header('Location: ./login.php');}
?>