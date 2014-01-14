<?php
	if(isset($_GET['err']))
		header('Location: '.$_GET['err'].'.php');
	else
		echo "Some unknown error occured please contact the site administrator to solve this problem";
?>