<?php 
session_start();
// if(!isset($_SESSION['loggedin'])){
//     header("Location: login.php");
//     exit();
// }
if(isset( $_SESSION['status'] )){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}

if (isset($_SESSION['loggedin'])) {
    $_SESSION['status'] = "You are all ready logged In ";
    header("location: welcome.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5 ">
        <h1  > LOGIN </h1>
        <div class="row">
            <div class="col-md-6">
            <form id="form" action="" title="" method="" enctype="multipart/form-data">


<div class="form-group">
    <label class="title"> Email</label>
    <input type="email" class="form-control" id="login_email" name="login_email">
</div> <br>
<div class="form-group">
    <label class="title"> Password</label>
    <input type="text" class="form-control" id="login_password" name="login_password">
</div><br>

<input type="submit" class="btn btn-sm btn-info" id="submit" name="submit" value="Login">
&nbsp;&nbsp;<a class="btn btn-sm btn-success" href="./register.php">Register</a>
</div>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function (e) {
            $('#form').on('submit', (function (e) {
                e.preventDefault();

                let email = $('#login_email').val();
                let password = $('#login_password').val();


                if (email === "" || password === "") {
                    alert("All filed is required");
                } else {
                    $.ajax({
                        type: "post",
                        url: "login_process.php",
                        contentType: false,
                        processData: false,
                        cache: false,
                        data: new FormData(this),
                        success: function (response) {
                            if (response == '1') {
                                window.location = 'welcome.php';
                            } else {
                                alert("Email or password wrong!!!");
                            }
                        },
                        error: function () {
                            alert("error!!!");
                        }
                    })
                }
            }));

        });
    </script>
</body>

</html>