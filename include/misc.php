<?php

	class database
	{
		private static $db_connect;

		public static function connect($database='localhost',$db_user='ansh',$db_pwd='ansh')		//static function to connect to datbase
		{
			$db_connect=mysql_connect($database,$db_user,$db_pwd);
			mysql_select_db("instavid_ita");
		}

		public static function disconnect()		//static function to disconnect from database
		{mysql_close($db_connect);}
	}


?>