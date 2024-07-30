<?php

include('./database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php 
    $id =$_GET['id'];
    $sql="SELECT * FROM user WHERE id= $id";
    $connect=$conn->query($sql);
    $fetch_result= mysqli_fetch_assoc($connect);
    

     ?>
<div class="container mt-5">
        <h1>REGISTER</h1>
        <div class="row">
            <div class="col-md-6">
                <form id="form" action="" title="" method="" enctype="multipart/form-data">
                <input name="id" type="hidden" value="<?php echo  $fetch_result['id']; ?>" >
   
                <div class="form-group">
                        <label class="title">Name</label>
                        <input value="<?php echo $fetch_result['name']; ?>" type="text" class="form-control" id="name" name="name">
                    </div> <br>
                    <div class="form-group">
                        <label class="title"> Email</label>
                        <input value="<?php echo $fetch_result['email']; ?>" type="email" class="form-control" id="email" name="email">
                    </div> <br>
                    
                    <div class="form-group">
                        <label class="title"> Image</label>
                        <img src="upload/<?php echo $fetch_result['image']; ?>" widh="100" height="100" >
                        <input type="file"  class="form-control" id="file" name="file">
                        <!-- <input type="hidden" class="form-control" id="file" value="<?php //echo $fetch_result['image']; ?>" name="file"> -->
                    </div> <br>
                    <div>
                        <input type="submit" class="btn btn-sm btn-info" id="submit" name="update" value="update">
                        &nbsp;&nbsp;
                        <!-- <a  class="btn btn-sm btn-success" href="./login.php" >Login</a> -->
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
      $(document).ready(function(e){
                $('#form').on('submit',(function(e){
                    e.preventDefault();
                    
                     let name= $('#name').val();
                     let email= $('#email').val();
                    
                     let image= $('#file').val();
                     
                    if( name==="" || email===""  ){
                        alert("All filed is required");
                    }else{
                        $.ajax({
                            type:"post",
                            url:"uploade_process.php",
                            contentType:false,
                            processData:false,
                            cache:false,
                            data:new FormData(this),
                            success: function(response){
                                alert(response);
                                window.location="welcome.php";
                            },
                            error: function(){
                                alert("error!!!");
                            }
                        })
                    }
                }));
                
            });
    </script> 
</body>
</html>