<?php
include("dbconn.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$img=$_FLIES['image']['name'];
	$insert="insert into images value('null','$name','$img')";

	if(mysql_query($insert))
	{
		move_upload-file($_FLIES['image']['temp_name'],"picture/$img");

		echo"<script>alert('Image has been upload to Folder')</script>";
	}
		else {
			echo"<script>alert('Image dose not upload to Folder')</script>";
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>IMAGE UPLOAD INTO FOLDER USING PHP</title>
</head>
<body>

<form action="imageupload.php" method="POST" enctype="multipart/form-data">
	<label>Name</label>
	<input type="text" name="name">
	<br>
	<label>Select image to upload</label>
	<input type="file" name="image">
	<input type="submit" name="submit" value="upload the picture">
</form>
</body>
</html>