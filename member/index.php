<?php
	session_start();
	if(!(isset($_SESSION['key'])))
	{header('Location: ../error.php');}	
?>
<?php
	include_once('../include/form_elements.php'); 
?>


<html>
<head>
	<title>IT Association Forum</title>
	<script type="text/javascript" src='../js/size.js'></script>
	<script type="text/javascript" src='../js/jquery.js'></script>
	<script type="text/javascript" src='./js/navigate_forum.js'></script>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/fonts.css">
	<style type="text/css">
		.user_operation_elements{font-family: 'ec'}
		#make_entry:after{content:'\e011';}
		#edit_entry:after{content:'\e006';}
		#del_entry:after {content:'\e008';}
		#view_entry:after{content:'\e010';}
	</style>
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
				<div id='latest_entries' class='right_elements'>
					<ul>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
						<li>Will show the recent entries by the members</li>
					</ul>
				</div>
				<div id='user_operation' class='right_elements'>
					<ul>
						<li>	<span id='make_entry' class='user_operation_elements' onClick="menuClick('make_entry')">	</span>	</li>
						<li>	<span id='edit_entry' class='user_operation_elements' onClick="menuClick('edit_entry')">	</span>	</li>
						<li>	<span id='view_entry' class='user_operation_elements' onClick="menuClick('view_entry')">	</span>	</li>
						<li>	<span id='del_entry' class='user_operation_elements'  onClick="menuClick('del_entry')">		</span>	</li>
					</ul>
				</div>					
			</div>
		</div>
		<?php require_once('../include/footer.inc'); ?>
	</div>
</body>
</html>