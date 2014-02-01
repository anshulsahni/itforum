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
<!-- needed constatns -->
<script type="text/javascript">
	var unwanted_server_string="unwanted_server_string","<!-- www.1freehosting.com Analytics Code --><noscript><a title=\"Free hosting\" href=\"http://www.1freehosting.com\" rel=\"nofollow\">Free hosting</a><a title=\"Web host free\" href=\"http://www.1freehosting.com\" rel=\"nofollow\">Web host free</a><a title=\"Free websites hosting\" href=\"http://www.1freehosting.com/free-website-and-hosting.html\" rel=\"nofollow\">Free websites hosting</a><a title=\"Pagerank SEO analytic\" href=\"http://www.1pagerank.com\">Pagerank SEO analytic</a></noscript><script type=\"text/javascript\">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-21588661-2']);  _gaq.push(['_setDomainName', window.location.host]);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);    var fga = document.createElement('script'); fga.type = 'text/javascript'; fga.async = true;    fga.src = ('https:' == document.location.protocol ? 'https://www' : 'http://www') + '.1freehosting.com/cdn/ga.js';    var fs = document.getElementsByTagName('script')[0]; fs.parentNode.insertBefore(fga, fs);  })();</script><!-- End Of Analytics Code -->";
</script>
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
					var got_val=xml.responseText.replace(unwanted_server_string,"")
					document.getElementById('value_text').value=got_val;
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
</script>
</html>