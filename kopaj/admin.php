<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR);
session_start();
header ('Content-type: text/html; charset=utf-8');

if(!isset($_SESSION['user_id'])){
   header("Location: http://".$_SERVER['HTTP_HOST']."/kopaj/index.php");
   session_destroy();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname="kopaj_admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['logout'])){
    $_SESSION['user_id']='';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Admin felület Bosch</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="ckeditor/ckeditor.js"></script>   
</head>
<body>
    <h1> Üdvözöllek az admin felületen!</h1>
    <form action="index.php" method="post">   
    <input type="submit" name="logout" value="Kijelentkezés">
    </form>

    <form action="newSite.php" method="post">
        <label>Új aloldal létrehozása</label>
        <br>
        <input type="text" name="title" placeholder="Új oldal címe">
        <br>
        <input type="submit" name="sub_uj_oldal" value="Létrehozás">
    </form>
<?php

     
    $results=mysqli_query($conn, "SELECT * FROM oldalak");   
        
    
    echo '<form action="#" method="post">';
    echo '<select id="soflow" name="Oldal">';   
    while ($row = $results->fetch_assoc()){

        echo '<option value="'.$row['id'].'">'.utf8_encode($row['cim']).'</option>';        
    
}  
    
    echo '</select>';

    echo '<input type="submit" name="submit_oldal" value="Oldal lekérése">';
    echo '</form>';

    $oldal = "";
    $GLOBALS['adat']="";
    if(isset($_POST['submit_oldal'])){
        $GLOBALS['id']=$_POST['Oldal'];     
        $oldal=$_POST['Oldal'];
        $_SESSION['adat']=$oldal;
        $sql="SELECT id,tartalom FROM oldalak WHERE id=".$oldal;
        $result=mysqli_query($conn, $sql);
        $tartalom=$result->fetch_assoc();        
        echo 'Aktuális oldal: ' .$tartalom['cim'];

        echo '<form action="" method="post">';
        echo '<textarea class="ckeditor" name="editor">';


        echo $tartalom['tartalom'];        

        echo '</textarea>';
        echo '<input type="submit" name="submit_modosit" value="Módosítás">';
        echo '</form>';       
        
           
        
}

if(isset($_POST['submit_modosit'])){    
    $id=$_SESSION['adat'];
    $uj_tartalom=$_POST['editor'];
    echo $uj_tartalom;                       
    $update="UPDATE oldalak SET tartalom='".$uj_tartalom."' WHERE id=".$id;
    $conn->query($update);
    

}  
       
           

?>


    
</body>
</html>

