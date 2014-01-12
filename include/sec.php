<?php
	class encode
	{
		public static function en123($value)		//static function to return the string with 123 encoding
		{
			$value=self::separate_char($value);			
			$i=0;	$j=1;
			$encoded=array();
			foreach ($value as $value1) 
			{
					$encoded[$i]=$j++;
					$i++;
					$encoded[$i]=$value1;
					$i++;
			}
			$encoded[$i]=$j;
			return implode($encoded);
		}
		public static function dec123($value)	//static function to return the decoded string of 123 encoding
		{
			$value=self::separate_char($value);
			array_pop($value);
			$i=0; $j=0;
			$decoded=array();
			foreach ($value as $value1)
			{
				if($j%2!=0)
				{$decoded[$i++]=$value1;}
				$j++;
			}
			return implode($decoded);
		}

		
		# static function to convert the string into an array
		# different from explode as it does not need the delimiter for its functionality
		private static function separate_char($val)
		{
			$val=addcslashes($val,'0..z');
			$val=explode('\\',$val);
			array_shift($val);
			return $val;
		}

	}
	

?>