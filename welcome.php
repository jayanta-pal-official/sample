<?php
session_start();
if (isset($_SESSION['status'])) {
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}
include ('./database.php');
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['status'] = "please login!! ";
    header("location: login.php");
    exit;
}

// if(isset($_SESSION['loggedin'])){
//     header("Location: welcome.php");
//     exit();
// }
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
    <div class="container mt-5">
        <h3 class="text-center">Welcome <span
                class="text-success "><?php if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                } ?></span>
        </h3>
        <a class="btn btn-sm btn-info" href="./register.php">ADD+</a><br>
        <a href="logout.php" class="btn btn-sm btn-danger">Log Out </a>

        <table class="table text-center">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>DATE</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
            <?php
            $sql_select = "SELECT * FROM user";
            $fetch_result = $conn->query($sql_select);
            foreach ($fetch_result as $value) { ?>

                <tr>
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['date']; ?></td>
                    <td> <img src="upload/<?= $value['image']; ?>" width="100" height="100"> </td>
                    <td>
                        <a class="btn btn sm bg-info" href="update.php?id=<?= $value['id']; ?>">EDIT</a>
                        <a class="btn btn sm bg-danger" href="delete.php?id=<?= $value['id']; ?>">DELETE</a>
                    </td>

                </tr>

            <?php }
            ?>
        </table>
    </div>
    
</body>

</html>