<?php
session_start();
$message="";
if(count($_POST)>0) {
 $con = mysqli_connect('127.0.0.1:3306','root','','stream') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row['id'];
$_SESSION["name"] = $row['name'];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:uploadvideo.php");
}
?>
 
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/loginstyle.css">
  </head>
  <body class="login">
<div class="login-box">
  <?php if($message!="") { echo $message; } ?>
  
     <h1>Login</h1>
  <form name="frmUser" method="post" action="" >   
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Username" name="user_name">
  
</div>


  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="password" name="password">
</div>
<a href="#"> Forget password</a>
  <input type="submit"  name="submit" class="btn" value="Sign in" >
</form>
  Already a member? <a href="register.html">Great New Account</a>
</div>

  </body>
</html>

