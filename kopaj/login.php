<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ERROR);

$servername = "localhost";
$username = "root";
$password = "";
$dbname="kopaj_admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if($_POST['username'] !== 'null' && $_POST['password'] !== 'null'){

    $select=$conn->query("SELECT * FROM admin_users WHERE username='".$_POST['username']."'");
     
    

    if($select->num_rows > 0){
    $sha1pass=sha1($_POST['password']);
    $sql="SELECT * FROM admin_users WHERE username='".$_POST['username']."' AND password='". $sha1pass ."'";
       
    $result=$conn->query($sql);
    $user=$result->fetch_array();    
    
        
    if( $result->num_rows > 0){    
    $_SESSION['user_id']=$user['user_id'];       
    header("Location: http://".$_SERVER['HTTP_HOST']."/kopaj/admin.php");
    }
}
    else{
        header("Location: http://".$_SERVER['HTTP_HOST']."/kopaj/index.php");  
    }
}
?>



