<?php
	include_once('../include/form_elements.php');
	include_once('../include/misc.php');
	time::setZone();
?>

<?php
	if(isset($_GET['cat']))
	{
		$cat=$_GET['cat'];
		database::connect();
		$post_query_result=mysql_query("select * from post where category='$cat' limit 0,6");
		database::disconnect();
	}

?>


<head>
	<link rel="stylesheet" type="text/css" href="./css/forum.css">
</head>

<div id='forum_wrapper'>
	<ul>
		<?php
			while($post_list=mysql_fetch_assoc($post_query_result))
			{
				echo "<li> <div class='post_list' onClick='showPost(".$post_list['post_id'].")'><div class='post_title'><h3>".$post_list['title']."</h3></div>";
				echo "<div class='post_content'>".substr($post_list['content'],0,150)."....</div>";
				echo "</div></li>";
			}
		?>
	</ul>
</div>