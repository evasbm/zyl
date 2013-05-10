<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传文件</title>

</head>

<body style="width:600px; height:1000px; border:thin #666 double; padding:10px; margin:50px auto;">
<h1>文件上传</h1>
<?php require 'fuctions.php';?>
<form action="" method="post" enctype="multipart/form-data">
<label for="file">上传文件:</label>
<input type="file" name="file" id="file" /> 
<input type="submit" name="submit" value="Submit" />
</form>


<?php
if (isset($_POST['submit']))
{
if ($_FILES["file"]["type"] == "text/plain")
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
  
	if (file_exists( $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " 已经存在，请重新上传！ ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $_FILES["file"]["name"]);
	  $editfile = fopen($_FILES["file"]["name"],"r+");
	  echo '<form style=" margin-top:20px;" method="post">';
	  echo '<label style="float:left;">';
	  echo "上传文件名：";
	  echo '</label>';
	  echo'<textarea type="text" name="rename" value="a" style="width:400px; height:20px;  float:left; rows:none; ">';
	  echo $_FILES["file"]["name"];
	  echo '</textarea>';
	  echo'<textarea type="text" name="txt" value="s" style="width:550px; height:600px; margin-top:20px; rows:none; ">';
	  
	  while(!feof($editfile))
 	 {
	  	$fileword=fgets($editfile);
	  	echo $fileword;
	 }
	   echo '</textarea>';
	   echo '<input type="submit" name="submit2" value="重新保存">';
	   fclose($editfile);
	   echo '</form>';
      }

    }
		    
  }
  
else
  {
  echo "无效的文件类型，请上传txt文件！";
  }
  
}

			$fileedit = $_POST['txt'];
			$filerename = $_POST['rename'];  
			file_put_contents($filerename,$fileedit);
			echo "文件已修改成功！"; 

?>






</body>
</html>
