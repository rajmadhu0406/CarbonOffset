<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['loggedin'] != true) {
    header("location: index.php");
}


require "_database.php";
$sql = 'SELECT * FROM `carbon_user` WHERE email="' . $_SESSION['email'] . '";';
$result = $connection->query($sql);


if ($result->num_rows == 0) {
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                0 rows.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
} else {
    $row = $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="dashboard.css">

    <title>DashBoard</title>
</head>

<body>
    <?php
    include 'base.php';
    ?>
    <br><br>

    <div class="container-md">

        <div class="d-flex flex-row  mx-auto justify-content-around" style="width: 40%;">
            <a href="carbon_footprint.php" type="button"  class="btn btn-outline-light ms-5">Carbon footprint</a>
            <a href="#" type="button"  class="btn btn-outline-light ">Carbon Offset</a>
            <a href="#" type="button"  class="btn btn-outline-light ">Carbon History</a>
        </div>
        <br>

        <div class="card mb-3 mx-auto" style="max-width: 1200px;">
            <div class="row  g-0">
                <div class="col-md-4">
                    <!-- X_IvVDuHvDQ  1200x1400-->
                    <img src="./assets/dash-imagef.jpg" id="card-img" class="img-fluid rounded-start" alt="plant">
                </div>
                <div class="col-md-8">

                    <div class="card-body d-grid gap-3">

                        <div class="p-1 mb-5">
                            <h5 class="card-title">DashBoard</h5>
                        </div>

                        <table id="carbon-table">
                            <tr>
                                <th style="width: 28%;">CARBON FOOTPRINT</th>
                                <th style="width: 15%;" class="font-green">
                                    <?php
                                        if ($row['CF'] == NULL) {
                                            echo '00';
                                        } 
                                        else {
                                            echo $row['CF'];
                                        }
                                    ?>
                                </th>

                                <th style="width: 22%;">CARBON OFFSET</th>
                                <th style="width: 15%;" class="font-green">
                                    <?php
                                        if ($row['CO'] == NULL) {
                                            echo '0';
                                        } 
                                        else {
                                            echo $row['CO'];
                                        }
                                    ?>
                                </th>
                            </tr>
                        
                        </table>

                        <br>
                        <table id="amount-table">
                            <tr>
                                <th style="width: 25%;" >FOOTPRINT AMOUNT</th>
                                <th style="width: 15%;" class="amount-td font-green">
                                    <?php
                                        if ($row['CFM'] == NULL) {
                                            echo '0';
                                        } 
                                        else {
                                            echo $row['CFM'];
                                        }
                                    ?>
                                </th>

                                <th style="width: 20%;" style="width: 50%;">OFFSET AMOUNT</th>
                                <th style="width: 15%;" class="font-green amount-td">
                                    <?php
                                        if ($row['COM'] == NULL) {
                                            echo '0';
                                        } 
                                        else {
                                            echo $row['COM'];
                                        }
                                    ?>
                                </th>
                            </tr>
                            
                        </table>

                    </div>

                </div>

            </div>
        </div>

    </div>



    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>

</html>