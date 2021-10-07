<?php


if (isset($_POST['s-name'])) {

    require "_database.php";

    $name = $_POST['s-name'];
    $email = $_POST['s-email'];
    $password1 = $_POST['s-pass1'];
    $password2 = $_POST['s-pass2'];
    $phone = $_POST['s-phone'];

    if($password1 == "" || $password1 != $password2)
    {
        echo '<script type="text/JavaScript"> 
        alert("Password error");
        </script>';
    }

    // $CF = $_POST['CF'];
    // $CFM = $_POST['CFM'];
    // $CO = $_POST['CO'];
    // $COM = $_POST['COM'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    //password_verify(string $password, string $hash): bool
    // if (password_verify('rasmuslerdorf', $hash)) {
    //     echo 'Password is valid!';
    // } else {
    //     echo 'Invalid password.';
    // }

    $sql = "INSERT INTO `carbon_user` (`name`,`email`,`password`,`phone`,`time`) VALUES ('$name','$email','$password_hash','$phone', current_timestamp());";

    if ($connection->query($sql) == true) {
        echo '<script type="text/JavaScript"> 
        alert("Signup successfull");
        </script>';
    } else {
        echo '<script type="text/JavaScript"> 
        alert("Signup Failed!!!!");
        </script>';
    }

    $connection->close();
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

    <link rel="stylesheet" href="signup.css">

    <title>Signup</title>
</head>

<body>


    <?php
    include 'base.php';
    ?>


    <h1 style="text-align: center;" id="signup-title">SignUp!</h1>

    <br><br>

    <div class="col-6 mx-auto bg" id="signup-box">

        <form action="signup.php" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="s-name" class="form-label">Name</label>
                <input type="text" class="form-control " id="s-name" name="s-name" placeholder="FullName">
            </div>
            <div class="col-md-6">
                <label for="s-email" class="form-label">Email</label>
                <input type="email" class="form-control " id="s-email" name="s-email" placeholder="xya@abc.com">
            </div>

            <div class="col-md-6">
                <label for="s-pass1" class="form-label">Password</label>
                <input type="password" class="form-control" id="s-pass1" name="s-pass1" placeholder="password should match">
            </div>
            <div class="col-md-6">
                <label for="s-pass2" class="form-label">Retype Password</label>
                <input type="password" class="form-control" id="s-pass2" name="s-pass2" placeholder="password should match">
            </div>

            <div class="col-12">
                <label for="s-phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="s-phone" name="s-phone" placeholder="Enter 10 digit phone number">
            </div>

            <div class="col-md-6">
                <label for="s-city" class="form-label">City</label>
                <input type="text" class="form-control" id="s-city" name="s-city" placeholder="Ahmedabad">
            </div>
            <div class="col-md-4">
                <label for="s-state" class="form-label">State</label>
                <select id="s-state" class="form-select" name="s-state">
                    <option selected>Andhra Pradesh</option>
                    <option>Arunachal Pradesh</option>
                    <option>Assam</option>
                    <option>Bihar</option>
                    <option>Chhattisgarh</option>
                    <option>Goa</option>
                    <option>Gujarat</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="s-zip" class="form-label">Zip</label>
                <input type="text" class="form-control" name="s-zip" id="s-zip">
            </div>

            <div class="d-grid gap-2 row mx-auto px-5 gy-3">
                <button type="submit" id="submit" class="btn btn-primary" >SignUp</button>
            </div>
        </form>
    </div>

</body>

</html>