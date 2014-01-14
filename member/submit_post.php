<?php
	include_once('../include/misc.php');
	time::setZone();
	session_start();
?>


<?php
	if(isset($_GET['cat']) && isset($_GET['title']) && isset($_GET['content']))
	{
		$cat=$_GET['cat'];
		$title=$_GET['title'];
		$content=$_GET['content'];
		$user_id=$_SERVER['user_id'];
		$date=date('Y/m/d');
		$time=date('h:i:s');
		database::connect();
		generate_key:
		$key=rand();
		$post_query_result=mysql_query("select * from post where post_id=$key");
		$post_query_result=mysql_fetch_array($post_query_result);
		if($post_query_result)
			{goto generate_key;}

		echo "insert into post(post_id,user_id,post_date,post_time,title,category,content) values($key,$user_id,$date,$time,$title,$cat,$content)";		
		mysql_query("insert into post(post_id,user_id,post_date,post_time,title,category,content) values($key,'$user_id','$date','$time','$title','$cat','$content')") or die("cant insert");
		database::disconnect();
	}

?>