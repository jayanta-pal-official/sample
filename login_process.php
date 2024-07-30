<?php
session_start();
include('database.php');

$login_email = $_POST['login_email'];
$login_password = md5($_POST['login_password']);
$login_sql = "SELECT * FROM user WHERE email = '$login_email' AND password ='$login_password' ";
$login_result = $conn->query($login_sql);
$fetch_result= mysqli_fetch_assoc($login_result);
if($login_result){
    $_SESSION['loggedin']= true;
    $_SESSION['username']= $fetch_result['name'];
    echo "1";
}else{
    echo "0";
}

?>