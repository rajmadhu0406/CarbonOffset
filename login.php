<?php

function showAlert($type, $msg)
{
    echo '<div class="alert alert-' . $type . ' alert-dismissible fade show mb-0" role="alert">
                     ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    require "_database.php";

    $email = $_POST['email'];
    $pass = $_POST['password'];
   
    $sql = "SELECT * FROM `carbon_user` WHERE email='$email';";
    $result = $connection->query($sql);
    $num_rows = mysqli_num_rows($result);


    // if (password_verify('rasmuslerdorf', $hash)) {
    //     echo 'Password is valid!';
    // } else {
    //     echo 'Invalid password.';
    // }


    if ($num_rows != 0) {
        while ($curr_row = $result->fetch_assoc()) {
            $hash_pass = $curr_row['password'];
            if (password_verify($pass, $hash_pass))
            {
                showAlert("success", "Login Successful! Please wait while we redirect you to your account");
                $login = true;
                
                session_start();
                $_SESSION['name'] = $curr_row['name'];
                $_SESSION['email'] = $email;
                $_SESSION['loggedin'] = true;

                sleep(1);
                header('Location: dashboard.php');

            } else {
                showAlert("danger", "Login failed!");
            }
        }
    } 
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                     Email or Password incorrect. Please recheck.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="login.css">

    <title>Login</title>
</head>

<body>

    <?php
    include 'base.php';
    ?>
    <br><br>
    <h1 style="text-align: center;" id="login-title">Login!</h1>
    <br>
    <br>

    <div class="col-6 mx-auto bg" id="login-box">
        <form action="login.php" method="POST" class="col-xxl-12">
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <br>
            </div>

            <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <br>
            </div>


            <div class="d-grid gap-2 row mx-auto px-5 gy-3">
                <button class="btn btn-primary" type="submit" id="login-submit">login</button>
            </div>
        </form>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>