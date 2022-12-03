<html>
<head>
<title>AMFLIX</title>
  <link rel = "icon" type = "image/png" href = "images/hnlogo.png">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="topnav">
  <a  href="Home.html"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="about.html"><i class="fa fa-fw fa-book"></i> About</a> 
  <a href="contact.html"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="movies.html"><i class="fa fa-film"></i> Movies</a>
  <a href="webseries.html"><i class="glyphicon glyphicon-expand"></i> Tvshows</a>
  <a href="search.html"><i class="glyphicon glyphicon-search"></i>Search</a>
 <div class="search-container">
   <img src="images/logo.png">
  </div> 
</div>
<center>
<div class="w3-panel w3-pink">
  <h1 class="w3-opacity">
  <b>Search </b></h1>
</div>
<?php 
//load database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "stream";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("select * from videos where name LIKE '%$search%'");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
// Display search result
 
         if (!$query->rowCount() == 0) {
        echo "Search found :<br/>";
        echo "<table class='w3-table-all'>";  
                echo "<tr class='w3-red'><td>id</td><td>name</td><td>location</td><td>Play</td><td></td></tr>";        
            while ($results = $query->fetch()) {
        echo "<tr><td>";      
                echo $results['id'];
        echo "</td><td>";
                echo $results['name'];
        echo "</td><td>";
                echo $results['location'];
        echo "</td><td>";

        print "<td><button>Play</button></td></tr>";        
            }
        echo "</table>";    
        } else {
            echo 'No results found!';
        }
?>
<p>
  <div class="w3-container w3-blue">
  
</div>
</body>
</html>