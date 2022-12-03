<?php
include("config.php");
?>
<!doctype html>
<html>
  <head>
    <style>
    video{
     float: left;
    }
    </style>
  </head>
  <body>
    <div>
 
     <?php
     $fetchVideos = mysqli_query($con, "SELECT location FROM videos WHERE id=30");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
 
       echo "<div >";
       echo "<video src='".$location."' controls width='1698' height='778' >";
       echo "</div>";
     }
     ?>
 
    </div>

  </body>
</html>