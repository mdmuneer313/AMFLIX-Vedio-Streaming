<?php
session_start();
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
if($_SESSION["name"]) {
?>
<h1 align="center">Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.<h1>
<?php
}else echo "<h1>Please login first .</h1>";
?>
</body>
</html>