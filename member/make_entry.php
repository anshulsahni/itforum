<?php
	include_once('../include/form_elements.php');
	$mk_en = new form_elements();
?>

<head>
	<link rel="stylesheet" type="text/css" href="./css/make_entry.css">
	<script type="text/javascript" src='./js/navigate_forum.js'></script>
</head>
<?php
	$cat_op=Array(
			Array('','Select Category...'),
			Array('acd','Academics'),
			Array('tch','Technical'),
			Array('ntc','Non-Technical')
		)
?>
<div>
	<div id='make_entry_container'>
		<div id='make_entry_form_container'>			
				<table>
					<th>	<h3>Make Post</h3>	</th>
					<tr>	<td><?php $mk_en->drawDropDown('category','category_text','make_entry_drop dropdown input',$cat_op);?></td>	</tr>
					<tr>	<td><?php $mk_en->drawTextBox('entry_title','entry_title_text','make_entry_txt input','Enter Title'); ?></td></tr>
					<tr>	
						<td>
							<label for='entry'>Enter Your Contents:</label>
							<?php $mk_en->drawTextArea('entry',60,10,'entry_text','make_entry_entry input');?> 
						</td>
					</tr>
					
				</table>
				<div id='make_entry_submit_wrapper' class='btn_wrapper'>
					<?php $mk_en->drawButton('make_entry_submit','PUBLISH','make_entry_submit_id','btn','submit_post()'); ?>
				</div>
		</div>
	</div>
</div>