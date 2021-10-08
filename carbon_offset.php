<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['loggedin'] != true) {
        header("location: index.php");
    }

    function showAlert($type, $msg)
    {
        echo '<div class="alert alert-' . $type . ' alert-dismissible fade show mb-0" role="alert">
                        ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }


    require "_database.php";

    $email = $_SESSION['email'];
    $sql = "SELECT * FROM `carbon_user` WHERE email = '$email';";
    $result = $connection->query($sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows != 0)
    {
        $row = mysqli_fetch_assoc($result);
        $CFM = $row['CFM'];
    }
    else
    {
        ShowAlert("danger","No entry in Database");
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="carbon_footprint.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->

    <title>Your Offset</title>
</head>

<body>

    <?php
    include 'base.php';
    ?>

<div class="card mb-3 mx-auto" style="max-width: 1200px;">
            <div class="row  g-0">
                <div class="col-md-4">
                    <!-- X_IvVDuHvDQ  1200x1400-->
                    <img src="./assets/dash-imagef.jpg" id="card-img" class="img-fluid rounded-start" alt="plant">
                </div>
                <div class="col-md-8">

                    <div class="card-body d-grid gap-3">

                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <form action="carbon_offset.php" method="POST"  id="offset-form">
                            <h1>CARBON OFFSET</h1>
                            <div class="input-group input-group-lg mt-4 py-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">kWh</span>
                                <input placeholder="0" name="e-input" id="kwh-input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                                <input class="form-control" name="e-co2-input" id="e-co2-input" type="text" value="0">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">&#8377&#8377&#8377&#8377</span>
                                <input class="form-control" name="e-amount-input" id="e-amount-input" type="text" value="0">
                            </div>
                            <input type="text" value="e" name="letter" hidden>
                            <div class="my-5">
                                <button id="add-btn-e" type="submit" class="btn btn-success btn-lg">add</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</body>

</html>