<?php

include('./database.php');

$name =strip_tags( $_POST['name']);
$email= strip_tags($_POST['email']);
$password  = strip_tags($_POST['password']);
$comfirm_password = strip_tags($_POST['c_password']);
$image = $_FILES['file']['name'];
$tmp_image= $_FILES['file']['tmp_name'];
$unic_image = time().rand().$image;


$sql = "SELECT * FROM user WHERE email = '$email' ";
$result = $conn->query($sql);
$validate_mail = mysqli_fetch_assoc($result);
if($validate_mail){
    echo "email id allready exist";
}
elseif($password !== $comfirm_password){
   
    echo "plese enter same password";
}else{
    $valid_password = md5($password);
    //file upload......................................
   if(move_uploaded_file("$tmp_image","upload/".$unic_image)){
    $sql_insert = " INSERT INTO user (name,email,password,image) VALUES('$name','$email','$valid_password','$unic_image') ";
    $result_insert = $conn->query($sql_insert);
    if($result_insert){
        echo "Register successfull";
    }else{
        echo "Data not inserted!!!!";
    }
   }
   
}

// logout part


?>