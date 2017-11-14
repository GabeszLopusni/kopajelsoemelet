<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ERROR);
$servername = "localhost";
$username = "root";
$password = "";
$dbname="bosch_admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$results=mysqli_query($conn, "SELECT * FROM oldalak");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teszt</title>
</head>
<body>
    <ul>
        <?php
        
        echo $_SESSION['tartalom'];        
        while ($row = $results->fetch_assoc()){
            
        echo '<li><a href="?menu='.$row['id'].'">'.utf8_encode($row['cim']) .'</a></li>';
                
        }
        
        ?>
    </ul>
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
    

</body>
</html>

