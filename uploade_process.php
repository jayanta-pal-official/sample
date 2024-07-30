<?php

include('database.php');
$id = $_POST['id'];
// echo $id;
$name =$_POST['name'];

$email= strip_tags($_POST['email']);
// echo $email;
$image = $_FILES['file']['name'];
$tmp_image= $_FILES['file']['tmp_name'];
$unic_image = time().rand().$image;

$sql="UPDATE user SET name='$name', email='$email', image='$unic_image'";
$result = $conn->query($sql);
if($result){
    echo "Update";
}else{
  
        echo "error";
    
}
?>