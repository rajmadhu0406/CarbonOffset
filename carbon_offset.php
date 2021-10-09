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
if ($num_rows != 0) {
    $row = mysqli_fetch_assoc($result);
    $CFM = $row['CFM'];
    $COM = $row['COM'];
    $max = $CFM - $COM;
} else {
    ShowAlert("danger", "No entry in Database");
}


if (isset($_POST['range']) && isset($_POST['co2-input'])) {

    $amount_range = $_POST['range'];
    $co = (float)$_POST['co2-input'];

    if ($co == 0) {
        showAlert("warning", "Value can not be 0");
    } 
    else {

        if ($amount_range != 0 && $co != 0) {

            $sqlc = "UPDATE `carbon_user` SET CO = CO+'$co' WHERE email = '$email';";
            $sqla = "UPDATE `carbon_user` SET COM = COM+'$amount_range' WHERE email = '$email';";

            if ($connection->query($sqlc) == true) {
                echo '<script> 
                alert("' . $letter . ' Added");
            </script>';
            } else {
                $msg = $connection->error;
                echo '<script> 
                alert("' . $msg . ' ");
            </script>';
            }

            if ($connection->query($sqla) == true) {
                echo '<script> 
                alert("' . $letter . ' money Added");
            </script>';
            } else {
                $msg = $connection->error;
                echo '<script> 
                alert("' . $msg . '");
            </script>';
            }


            //adding history
            $type = "offset";
            $sqlh = "INSERT INTO `carbon_history` (`email`,`type`,`co2`,`amount`, `time`) VALUES ('$email','$type','$co','$amount_range', current_timestamp());";

            if ($connection->query($sqlh) == true) {
                echo '<script> 
                    alert("' . $letter . '  Added in history");
                </script>';
            } else {
                $msg = $connection->error;
                echo '<script> 
                    alert("' . $msg . '");
                </script>';
            }




            header("location: dashboard.php");
        }
    }//else
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

    <link rel="stylesheet" href="carbon_offset.css">

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
                <img src="./assets/dash-imagef.jpg" id="card-img" class="img-fluid rounded-start" alt="plant">
            </div>
            <div class="col-md-8">

                <div class="card-body d-grid gap-3">

                    <!-- X_IvVDuHvDQ  1200x1400-->
                    <form action="carbon_offset.php" method="POST" id="offset-form">
                        <h1>CARBON OFFSET</h1>
                        <div>
                            <label for="customRange2" class="form-label" id="amount-heading">&#8377Amount</label>
                            <input type="range" name="range" class="form-range" value="0" min="0" max="<?php echo $max ?>" id="customRange2" oninput="this.nextElementSibling.value = this.value">
                            <output id="counter">0</output>
                        </div>
                        <div class="input-group input-group-lg mt-4 py-3">
                            <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                            <input class="form-control" name="co2-input" id="co2-input" type="text" value="0">
                        </div>
                        <div class="my-5">

                            <!--  -->
                            <div class="modal fade" id="exampleModalo" tabindex="-1" aria-labelledby="exampleModalLabelo" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelo">PAY</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to pay?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <button id="submit-btm" type="submit" class="btn btn-success btn-lg">Offset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <button type="button" class="btn btn-info px-3 py-2" data-bs-toggle="modal" data-bs-target="#exampleModalo">
                                PAY
                            </button>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <script>
        var range = document.getElementById('customRange2');
        var co2 = document.getElementById('co2-input');

        setInterval(function() {
            var range_value = range.value;
            var co2_value = (range_value / 800);
            // co2.value = co2_value;
            co2.value = Math.round(co2_value * 100) / 100;
            //  console.log(co2_value);
        }, 1);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</body>

</html>