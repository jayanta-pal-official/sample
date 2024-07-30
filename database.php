<?php
$servername = "localhost";
$username ="root";
$password ="";
$db_name ="ajax";

$conn= new mysqli($servername, $username, $password, $db_name);
if($conn){
    echo "";
}else{
    echo "connection faild! ". $conn->connect_error;
}
?>