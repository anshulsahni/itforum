<?php
include('./form_elements.php');
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
?>
<html>
<head>
	<title>IT Association Forum Registration</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
</head>
<body>
	<div id='wrapper'>
		<?php require_once('../include/header.inc'); ?>
		<div id='container'>
			<div id='register_form_holder'>
				<form id='register_form' class='form' action='register_verify.php' name='register_form'>
					<table border=0>
						<tr>
							<td><?php $it_register->drawTextBox('reg_no','reg_no_text','register_input textbox','Register Number',10);?></td>
						</tr>
						<tr>
							<td><?php $it_register->drawPassword('user1','user1_text','register_input textbox password','Password',15);?></td>
						</tr>
						<tr>
							<td><?php $it_register->drawPassword('user2','user2_text','register_input textbox password','Enter Password Again',15);?></td>
						</tr>
						<tr>
							<td><?php $it_register->drawTextBox('email','email_text','register_input textbox','E Mail',50);?></td>
						</tr>
						<tr>
							<td><?php $it_register->drawTextBox('name','name_text','register_input textbox','Name',30);?></td>
						</tr>
						<tr>
							<td><?php $it_register->drawDropDown('section','section_text','register_input drop_down',$section_op);?></td>
						</tr>
						<tr>
							<td><?php $it_register->drawTextBox('hometown','hometown_text','register_input textbox','Home Town',30);?></td>
						</tr>
						<tr>
							<td><?php $it_register->drawTextBox('number','number_text','register_input textbox','Mobile Number',10);?></td>
						</tr>
					</table>
					<div id='submit_wrapper' class='btn_wrapper'>
						<?php $it_register->drawSubmit('register_submit','SUBMIT','register_submit_btn','btn submit_btn','return detVerify()');?>
					</div>
				</form>
			</div>
		</div>
		<?php require_once('../include/footer.inc'); ?>
	</div>
</body>
</html>
