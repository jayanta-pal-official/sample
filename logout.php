<?php
session_start();
unset($_SESSION['loggedin']);
unset($_SESSION['status']);
unset($_SESSION['username']);

    // session_destroy();
    // unset($_SESSION['username']);
    header("location: login.php");
    exit();

?>