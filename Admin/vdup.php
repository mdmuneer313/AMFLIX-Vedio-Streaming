
<?php
if(isset($_POST['submitdetails']))
{
$name=$_FILES['uploadvideo']['name'];
$type=$_FILES['uploadvideo']['type'];
//$size=$_FILES['uploadvideo']['size'];
$cname=str_replace(" ","_",$name);
$tmp_name=$_FILES['uploadvideo']['tmp_name'];
$target_path="company_profile/";
$target_path=$target_path.basename($cname);
if(move_uploaded_file($_FILES['uploadvideo']['tmp_name'],$target_path))
{
    echo "hi";
echo $sql="UPDATE employer_logindetails SET (video) VALUES('".$cname."')"; 
$result=mysql_query($sql);
echo "Your video ".$cname." has been successfully uploaded";
}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>vdup</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class="form_search">
<label>Upload Video Profile:</label>
<span class="form_input">
<input type="file" name="uploadvideo"  />
</span>
</div>

<div class="form_search">
<label> &nbsp;</label>
<span class="form_input">
<input type="submit" name="submitdetails" value="Upload" class="button"/>
</span>
</div>
</form>
</body>
</html>
