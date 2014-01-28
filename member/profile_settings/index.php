<?php
	include ("../../include/form_elements.php");
	$profile_set=new form_elements();
	$edit_op= Array
	(
		Array('','Select field'),
		Array('sname','Student Name'),
		Array('ssection','Section'),
		Array('syear','Year'),
		Array('shometown','Hometown'),
	);
?>
<html>
<head>
	<title>Profile Settings</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/size.js"></script>
	<script type="text/javascript" src="../../js/settings.js"></script>
</head>
<body>
	<?php include("../../include/header.inc");?>
	<div id='container'>
		<div id='heading'><h2>IT Association Forum Edit Profile</h2></div>
		<div id='edit_form_container'>
			<form name='edit_form' class='form' action='./'>
				<table>
					<tr>
						<td><?php $profile_set->drawDropDown('field','field_text','edit_input drop_down',$edit_op);	?></td>	
						<td><?php $profile_set->drawTextBox('value','value_text','edit_input textbox');				?></td>
						<td><?php $profile_set->drawSubmit('submit_change','CHANGE','','btn change_btn','return change()');?></td>		
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php include("../../include/footer.inc"); ?>
</body>
<script type="text/javascript">
	$("#field_text").change(function(){
	var fld=document.forms['edit_form'].elements['field'].value;
	if (fld!='')
	{
		xml=createAjaxObj();
		xml.open('get',"./edit_show.php?fld="+fld,true);
		xml.send();
		xml.onreadystatechange=function()
		{
			if(xml.readyState==4 && xml.status==200)
				{
					document.getElementById('value_text').value=xml.responseText;
					setMaxLength(fld);
				}
		}
	}
});
	function setMaxLength(type)
	{
		if (type=="sname")
			$('#value_text').attr("maxlength","30");
		else if(type=="ssection")
			$('#value_text').attr("maxlength","1");
		else if(type=="year")
			$('#value_text').attr("maxlength","1");
		else if(type=="shometown")
			$('#value_text').attr("maxlength","1");
	}
	// $("#value_text").keypress(function(e){
	// 	if("#fi")
	// 	if(e.keyCode>=65 && e.keyCode<=69)
	// 		{}
	// 	else
	// 		{
	// 			alert("Wrong value entered only valid sections in capital letters allowed");
	// 			$("#value_text").val(" ");
	// 		}

	});		
</script>
</html>