<?php

error_reporting(1);

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "stream"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

extract($_POST);

$target_dir = "test_upload/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if($upd)
{
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
{
    echo "File Format Not Suppoted";
} 

else
{

$video_path=$_FILES['fileToUpload']['name'];
$query = "insert into video(video_name) values('$video_path')";

mysqli_query($con,$query);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

echo "uploaded ";

}

}

//display all uploaded video

if($disp)

{

$query=mysql_query("select * from video ORDER BY id DESC");

	while($all_video=mysql_fetch_array($query))

	{
?>
	 
	 <video width="300" height="200" controls>
	<source src="test_upload/<?php echo $all_video['video_name']; ?>" type="video/mp4">
	</video> 
	
	<?php } } ?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>vedio upload</title>
	</head>
	<body>
	<form method="post" enctype="multipart/form-data">

<table border="1" style="padding:10px">

<tr>

<Td>Upload  Video</td></tr>

<Tr><td><input type="file" name="fileToUpload"/></td></tr>

<tr><td>

<input type="submit" value="Uplaod Video" name="upd"/>

<input type="submit" value="Display Video" name="disp"/>

</td></tr>

</table>

</form>
	</body>
	</html>