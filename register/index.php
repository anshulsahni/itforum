<?php
include('../include/form_elements.php');
$it_register = new form_elements();		//object to build the elements for the form 
//options set for the drop down of sections
$section_op= Array 						
(
	Array('','Select Section...'),
	Array('A','A'),
	Array('B','B'),
	Array('C','C'),
	Array('D','D'),
	Array('E','E')
);
$yr_op= Array
(
	Array('','Select Year...'),
	Array('1','1st'),
	Array('2','2nd'),
	Array('3','3rd'),
	Array('4','4th')
);
?>
<html>
<head>
	<title>IT Association Forum Registration</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<script type="text/javascript" src='../js/size.js'></script>
	<script type="text/javascript" src='../js/register.js'></script>
	<script type="text/javascript" src='../js/jquery.js'></script>

	<!-- code for applying the custome scrollers -->
	<link rel="stylesheet" type="text/css" href="../css/jquery.jscrollpane.css">
	<script type="text/javascript" src="../js/jquery.jscrollpane.js"></script>
	<script type="text/javascript" src="../js/jquery.mousewheel.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){
				$(".scroll-pane").delay(1000).jScrollPane();
			})		
	</script>
</head>
<body>
	<div id='wrapper'>
		<?php require_once('../include/header.inc'); ?>
		<div id='container'>
			<div id='container_holder' class='scroll-pane'>
			 <div id='register_form_holder'>
				<div id='fill_error'></div>
				<form id='register_form' class='form' action='./register_verify.php' name='register_form' method='POST'>
					<table border=0>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawTextBox('reg_no','reg_no_text','register_input textbox','Register Number',10);?><span class='tooltip'>Enter your college register no.</span></td>
						</tr>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawPassword('user1','user1_text','register_input textbox password','Password',15);?><span class='tooltip'>Password should be between 6 and 15 characters</span></td>
						</tr>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawPassword('user2','user2_text','register_input textbox password','Enter Password Again',15);?><span class='tooltip'>Enter your password again</span></td>
						</tr>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawTextBox('email','email_text','register_input textbox','E Mail',50);?><span class='tooltip'>Your account will be verified through this email</span></td>
						</tr>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawTextBox('name','name_text','register_input textbox','Name',30);?><span class='tooltip'>Enter your name in not more than 30 characters</span></td>
						</tr>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawDropDown('year','year_text','register_input drop_down',$yr_op);?></td>
						</tr>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawDropDown('section','section_text','register_input drop_down',$section_op);?></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;<?php $it_register->drawTextBox('hometown','hometown_text','register_input textbox','Home Town',30);?><span class='tooltip'>Enter only if you want to share</span></td>
						</tr>
						<tr>
							<td><span class='req_symbol'>*</span>&nbsp;<?php $it_register->drawTextBox('number','number_text','register_input textbox','Mobile Number',10);?><span class='tooltip'>It won't be disclosed anywhere</span></td>
						</tr>
					</table>
					<div id='submit_wrapper' class='btn_wrapper'>
						<?php $it_register->drawSubmit('register_submit','SUBMIT','register_submit_btn','btn submit_btn','return detVerify()');?>
					</div>
				</form>
			</div>
			</div>
		</div>
		<?php require_once('../include/footer.inc'); ?>
	</div>
</body>
<script type="text/javascript">
	$(".register_input").focus(function(){
		$(this).siblings('.tooltip').fadeIn(500);
	});
	$(".register_input").blur(function(){
		$(this).siblings('.tooltip').fadeOut(500);
	});
</script>
</html>
