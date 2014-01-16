<?php
	include_once('../include/misc.php');
	include_once('../include/form_elements.php');
	$comment_draw= new form_elements();
	time::setZone();
?>
<?php
	if(isset($_GET['class']))
	{
		$id=$_GET['class'];
		database::connect();
		$post_result=mysql_query("select * from post where post_id=$id");
		$post_result=mysql_fetch_assoc($post_result);
		$user_id=$post_result['user_id'];
		$user_result=mysql_query("select * from members where user_id=$user_id");
		$user_result=mysql_fetch_assoc($user_result);
		$comment_result=mysql_query("select * from comments where post_id=$id order by comment_date ASC");
		$comment=array();
		$temp_array=array();
		while($row=mysql_fetch_assoc($comment_result))
		{
			$writer_result=mysql_query("select sname from members where user_id=".$row['user_id']);
			$writer_result=mysql_fetch_assoc($writer_result);
			$temp_array['writer']=$writer_result['sname'];
			$temp_array['date']=$row['comment_date'];
			$temp_array['content']=$row['comment_content'];
			array_push($comment,$temp_array);
		}
		// print_r($comment);
		database::disconnect();
		echo"<div class='show_wrapper'><div class='show_title show_members'><h3>".$post_result['title']."</h3></div>";
		echo"<div class='credentials show_members'><span>Posted By: </span><span class='show_writer'>".$user_result['sname']."</span></div>";
		echo"<div class='show_date show_members'>Posted on: ".$post_result['post_date']."</div>";
		echo"<div class='show_content show_members'>".$post_result['content']."</div></div>";
	}
?>

<div id='comment_wrapper'>
	<span style='color:#2c3747;'><h3>Comments...</h3></span>
	<ul>
		<?php
			foreach ($comment as $comment_1)
			{
				echo "<li><div class='comment_list'><div class='comment_credentials'><span class='comment_writer'>".$comment_1['writer']."</span><span class='comment_date'>".$comment_1['date']."</span></div>";
				echo "<div class='comment_content'>".$comment_1['content']."</div></div></li>";
			}
		?>
		<li>
			<div class='comment_list' style='padding-top:10px; padding-bottom:5px;' >
				<div class='write_comment_wrapper'>
					<?php $comment_draw->drawTextBox('write_comment','write_comment_text','comment_txtbox','Write your comment here...');	?>
				</div>
				<input type='hidden' id='post' value='<?php echo $id; ?>' />
				<div class='comment_submit_wrapper'>
					<?php $comment_draw->drawSubmit('comment_submit','Submit','','comment_btn','submit_comment()');	?>
				</div>

			</div>
		</li>
	</ul>
</div>