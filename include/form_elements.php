<?php
	class form_elements
	{

		
		public function drawTextBox($name,$id=NULL,$class=NULL,$placeholder=NULL,$maxlength=NULL)
		{echo "<input type='text' name='".$name."' id='".$id."' class='".$class."' placeholder='".$placeholder."' maxlength=".$maxlength."/>";}

		public function drawPassword($name,$id=NULL,$class=NULL,$placeholder=NULL,$maxlength=NULL)
		{echo "<input type='password' name='".$name."' id='".$id."' class='".$class."' placeholder='".$placeholder."' maxlength=".$maxlength."/>";}


		public function drawSubmit($name,$value=NULL,$id=NULL,$class=NULL,$onclick=NULL)
		{echo "<input type='submit' name='".$name."' value='".$value."' id='".$id."' class='".$class."' onClick='".$onclick."'/>";}

		public function drawDropDown($name,$id=NULL,$class=NULL,$options)
		{
			echo "<select name='$name' id='$id' class='$class'/>";
			foreach ($options as $op)
			{echo "<option value='$op[0]'>$op[1]</option>";}
		}

	}


?>