<!doctype html>
<html>
  <head>
    <?php
    session_start();
include("config.php");

if($_SESSION["name"]) {


 
    if(isset($_POST['but_upload'])){
       $maxsize =32000000000; // 4000MB
 
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg","mkv","webm");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

              mysqli_query($con,$query);
              echo "<h3>Upload successfully.</h3>";
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } ?>
     <link rel="stylesheet" type="text/css" href="../css/upload.css">
  </head>
  <style>
    h3
    {
      font-size: 20px;
      color: orange;
    }
  </style>
  <body class="login">
    <h1 align="center">Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.<h1>

<div class="login-box">
    <h1>VIDEO UPLOAD</h1>
  <div class="textbox">
   <form method="post" action="" enctype='multipart/form-data'>
      <input type='file' name='file'/>
  </div>
      
    <input type='submit' class="btn" value='Upload' name='but_upload'>
  </div>
</form>
  </div>
  </body>
</html>
    
     <?php
}else echo "<h1>Please login first .</h1>";
?>



