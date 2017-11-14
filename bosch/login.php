<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ERROR);

$servername = "localhost";
$username = "root";
$password = "";
$dbname="bosch_admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if($_POST['username'] !== 'null' && $_POST['password'] !== 'null'){
    $sha1pass=sha1($_POST['password']);
    $sql="SELECT * FROM admin_users WHERE username='".$_POST['username']."' AND password='". $sha1pass ."'";
    print_r($sql);    
    $result=$conn->query($sql);
    $user=$result->fetch_array();    
    print_r($user);
    print_r('<pre>');
    print_r($result);               
    print_r('</pre>');
        
    if( $result->num_rows > 0){    
    $_SESSION['user_id']=$user['user_id'];       
    header("Location: http://".$_SERVER['HTTP_HOST']."/bosch/admin.php");
    }

}
 
?>