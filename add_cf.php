<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['loggedin'] != true) {
        header("location: index.php");
    }

    require "_database.php";

    $carbon = $_POST['']

    $sql = "UPDATE `carbon_user` SET CF = CF+'$carbon' WHERE email = '$email';";
    $result = $connection->query($sql);
    $num_rows = mysqli_num_rows($result);

?>
