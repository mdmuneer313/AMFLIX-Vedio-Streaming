<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title> Upload Image </title>
    <?php
    // if something was posted, start the process...
    if(isset($_POST['upload']))
    {
    
    
    
    // connect to the database
    include "connect1.php";
    mysqli_connect($host, $user, $password,$dbname);
         
    
         // select our database
         mysql_select_db("$db") or die(mysql_error());
            // the query that will add this to the database
            // define the posted file into variables
            echo $name = $_FILES['picture']['name'];
            echo $tmp_name = $_FILES['picture']['tmp_name'];
            echo $type = $_FILES['picture']['type'];
            echo $size = $_FILES['picture']['size'];
    
            // if your server has magic quotes turned off, add slashes manually
            if(!get_magic_quotes_gpc()){
            $name = addslashes($name);
            }
    
            // open up the file and extract the data/content from it
            $extract = fopen($tmp_name, 'r');
            $content = fread($extract, $size);
            $content = addslashes($content);
            fclose($extract);
    
    
    
         if(!empty($_FILES))
        {
            $target = "videos/";
             $target = $target . basename( $_FILES['picture']['name']) ;
             echo $target;
            $addfile = "INSERT INTO videos VALUES ('','$name', '$size', '$type','$target')";
            mysql_query($addfile) or die(mysql_error());
    
    
    
            echo "===========";
            echo $target;
            echo "===========";
    
            $ok=1;
            if(move_uploaded_file($_FILES['picture']['tmp_name'], $target))
             {
             echo "The file ". basename( $_FILES['picture']['name']). " has been uploaded <br/>";
             }
             else {
             echo "Sorry, there was a problem uploading your file.";
             }
        }
    
    
    
    mysql_close();
    
    echo "Successfully uploaded your picture!";
    }else{die("No uploaded file present");
    }
    
    
    
    ?>
    </head>
    
    <body>
    
     <div align="center">
    
        <br />
        <a href="file.html">upload more images</a>
    </div>
    
    </body>
    </html>