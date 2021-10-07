<?php

    require "_database.php";


    $sql = "show tables";
    $result = $connection->query($sql);

    $row =  $result->fetch_assoc();
    echo var_dump($row);
    echo "<br>";
    echo $row["Tables_in_wt_project"];

    // if($result->num_rows > 0) 
    // {
    //     while($row = $result->fetch_assoc()) 
    //     {
    //         echo $row;
    //     }
    // }
    // echo $result;

    if ($connection->query($sql) == true) {

        echo '<script type="text/JavaScript"> 
        alert("Signup successfull");
        </script>';
    } else {
        echo '<script type="text/JavaScript"> 
        alert("Signup Failed!!!!");
        </script>';
    }

    // $name = $_POST['s-name'];
    // $email = $_POST['s-email'];
    // $password1 = $_POST['s-pass1'];
    // $password2 = $_POST['s-pass2'];
    // $phone = $_POST['s-phone'];

    // echo $name;


    // if($password1 != $password2)
    // {
    //     echo '<script type="text/JavaScript"> 
    //     alert("Password dont match...");
    //     </script>';
    // }

    // $CF = $_POST['CF'];
    // $CFM = $_POST['CFM'];
    // $CO = $_POST['CO'];
    // $COM = $_POST['COM'];

    // $password_hash = password_hash($password, PASSWORD_DEFAULT);
    //password_verify(string $password, string $hash): bool
    // if (password_verify('rasmuslerdorf', $hash)) {
    //     echo 'Password is valid!';
    // } else {
    //     echo 'Invalid password.';
    // }

    // $sql = "INSERT INTO `carbon-user` (`name`,`email`,`password`,`phone`,`time`) VALUES ('$name','$email','$password_hash','$phone', current_timestamp());";

    // if ($connection->query($sql) == true) {
    //     echo '<script type="text/JavaScript"> 
    //     alert("Signup successfull");
    //     </script>';
    // } else {
    //     echo '<script type="text/JavaScript"> 
    //     alert("Signup Failed!!!!");
    //     </script>';
    // }

    $connection->close();
?>