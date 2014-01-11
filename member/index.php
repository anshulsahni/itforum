<?php
	session_start();
	if(!(isset($_SESSION['key'])))
	{header('Location: ../error.php');}	
?>


<html>
<head>
	<title>IT Association Forum</title>
	<script type="text/javascript" src='../js/size.js'></script>
	<script type="text/javascript" src='../js/jquery.js'></script>
	<script type="text/javascript" src='./js/navigate_forum.js'></script>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$('#left_intro').css("left","0px");
			$('#right_section').css("left",window.innerWidth-175+"px");
			$('#forum_container').css("width",window.innerWidth-175-175+'px');
			loadMenu();
		});
	</script>
</head>
<body>
	<div id='wrapper'>
		<?php require_once('../include/header.inc'); ?>
		<div id='container'>
			<div id='left_intro' class='left member_element'>
				<div id='intro_content_container'>
					<ul>
						<li><div id='dp' class='img_container intro_element'><img src=""></div>		</li>
						<li><div id='name' class='intro_element'><?php echo $_SESSION['sname']; ?>	</div>					</li>
						<li><div id='reg' class='intro_element'><?php echo $_SESSION['reg_no']; ?></div>					</li>
						<li><div id='yr' class='intro_element'><?php echo $_SESSION['syear'] ?><sup>nd</sup> Year</div>			</li>
						<li><div id='section' class='introl_element'>In '<?php echo $_SESSION['ssection'];?>' Section</div>			</li>
					</ul>
				</div>
			</div>
			<div id='forum_container' class='member_element'>
				
			</div>
			<div id='right_section' class='right member_element'>
				<div id='latest_entries' class='latest_member_elements'>
					<ul>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
					</ul>
				</div>
			</div>
		</div>
		<?php require_once('../include/footer.inc'); ?>
	</div>
</body>
</html>