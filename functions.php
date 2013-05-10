<?php 
  function customError($errno, $errstr, $errfile,$errline, $errcontext)
	 { 
	 	 $Time = date("Y-m-d H:i:s");	 
		 $adderror= "$Time" . "：出现错误 [$errno] $errstr " . "错误存在于 $errfile 的第 $errline 行。" ;
	 
	 $filename="error.txt";
	 if (file_exists($filename))
	 	{
			 $fp = fopen("error.txt", "a+");
			 fwrite($fp, $adderror);
			 fclose($fp);

		}
	 else
	 {
			$fp = fopen("$filename", "w+");  
			fwrite($fp, $adderror);
			fclose($fp);
		
		 }
   die();
}
set_error_handler("customError");
	 
?>
