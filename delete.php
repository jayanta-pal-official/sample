<?php
include('database.php');
$id= $_GET['id'];
$sql_delete= "DELETE FROM user WHERE id='$id'";
$result_delete= $conn->query($sql_delete);
if($result_delete){
    echo '<script> alert("Delete successfull");
    window.location="welcome.php";
     </script>';
}else{
    echo '<script> alert("Delete not successfull !!!!"); </script>';
}
?>
