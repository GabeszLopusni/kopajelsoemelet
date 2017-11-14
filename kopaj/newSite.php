<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="kopaj_admin";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    if(isset($_POST['sub_uj_oldal']) && isset($_POST['title'])){

        $insert="INSERT INTO oldalak (cim) VALUES('".$_POST['title']."')";
        mysqli_query($conn,$insert);
        header("Location: http://".$_SERVER['HTTP_HOST']."/kopaj/admin.php");
    }
?>