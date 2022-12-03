<?php

$con = mysqli_connect("localhost","root","","stream");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit']))
{
$name=$_FILES['file']['name'];
$temp=$_FILES['file']['temp_name'];
move_upload_file($temp,"uploadED/".$name);
$url="http://localhost/PHP?video%20upload%20and%playback/uploade/$name";
$query = "INSERT INTO 'VIDES' VALUE ('','$name','$url')";
mysqli_query($con,$query);

if(isset($_POST['submit']))
echo"<br/>".$name."has been uploaded";

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Viedo</title>
</head>
<body>
<form action="index.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" name="submit" value="upload">
</form>
</body>
</html>