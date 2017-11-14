<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ERROR);
$servername = "localhost";
$username = "root";
$password = "";
$dbname="kopaj_admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$results=mysqli_query($conn, "SELECT * FROM oldalak");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    
    <title>Teszt</title>
</head>
<body>   
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kopaj</a>
    </div>
    <ul class="nav navbar-nav">
    <?php
    echo $_SESSION['tartalom'];        
    while ($row = $results->fetch_assoc()){
    
    echo '<li><a href="?menu='.$row['id'].'">'.utf8_encode($row['cim']) .'</a></li>';
                
    }
    ?>
    </ul>
  </div>
</nav>
    <div class="container">

        <?php
        if(isset($_GET['menu'])){
            $result=mysqli_query($conn, "SELECT * FROM oldalak");            

            while($res= $result->fetch_assoc()){
                if($_GET['menu'] == $res['id']){
                   echo $res['tartalom'];
                }          
            }   
        }

        ?>        
    </div>
<footer>
<a href="adminLogin.php">Admin oldal</a>
</footer>
</body>
</html>

