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


if (isset($_POST['letter'])) 
{
    $letter = $_POST['letter'];
    $input = $letter . "-input";

    if (isset($_POST[$input])) {

        require "_database.php";

        if ($letter == "e") {
            $carbon = $_POST['e-co2-input'];
            $amount = $_POST['e-amount-input'];
        } elseif ($letter == "f") {
            $carbon = $_POST['f-co2-input'];
            $amount = $_POST['f-amount-input'];
        } elseif ($letter == "h") {
            $carbon = $_POST['h-co2-input'];
            $amount = $_POST['h-amount-input'];
        } elseif ($letter == "v") {
            $carbon = $_POST['v-co2-input'];
            $amount = $_POST['v-amount-input'];
        }

        // echo '<script> 
        //     alert("fef");
        // </script>';

        $email = $_SESSION['email'];
        $sqlc = "UPDATE `carbon_user` SET CF = CF+'$carbon' WHERE email = '$email';";
        $sqla = "UPDATE `carbon_user` SET CFM = CFM+'$amount' WHERE email = '$email';";

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

        
    }
        header("location: dashboard.php");
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

    <title>Your Footprint</title>
</head>

<body>

    <?php
    include 'base.php';
    ?>

    <div class="container-md">

        <div class="d-flex flex-row  mx-auto justify-content-around" style="width: 40%;">
            <a href="#" onclick="Electricity()" type="button" class="btn btn-outline-light ms-5">Electricity</a>
            <a href="#" onclick="Flight()" type="button" class="btn btn-outline-light ">Flight</a>
            <a href="#" onclick="Vehicle()" type="button" class="btn btn-outline-light ">Vehicle</a>
            <a href="#" onclick="Hotel()" type="button" class="btn btn-outline-light ">Restraurant/delivery</a>
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
                            <h5 class="card-titles" id="heading">Carbon Footprint</h5>
                        </div>

                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <form action="carbon_footprint.php" method="POST" class="hid" id="electricity">
                            <h1>ELECTRICITY</h1>
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

                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <form action="carbon_footprint.php" method="POST" class="hid" id="flight">
                            <h1>FLIGHT</h1>
                            <div class="input-group input-group-lg mt-4 py-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">KM</span>
                                <input placeholder="0" id="f-km-input" name="f-input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                                <input class="form-control" name="f-co2-input" id="f-co2-input" type="text" value="0">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">&#8377&#8377&#8377&#8377</span>
                                <input class="form-control" name="f-amount-input" id="f-amount-input" type="text" value="0">
                            </div>
                            <input type="text" value="f" name="letter" hidden>
                            <div class="my-5">
                                <button href="#" id="add-btn-f" type="submit" class="btn btn-success btn-lg">Add</button>
                            </div>
                        </form>
                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <form action="carbon_footprint.php" method="POST" class="hid" id="vehicle">
                            <h1>VEHICLE</h1>
                            <div class="input-group input-group-lg mt-4 py-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">KM.</span>
                                <input placeholder="0" id="car-km-input" name="v-input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                                <input class="form-control" name="v-co2-input" id="v-co2-input" type="text" value="0">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">&#8377&#8377&#8377&#8377</span>
                                <input class="form-control" name="v-amount-input" id="v-amount-input" type="text" value="0">
                            </div>
                            <input type="text" value="v" name="letter" hidden>
                            <div class="my-5">
                                <button href="#" id="add-btn-v" type="submit" class="btn btn-success btn-lg">Add</button>
                            </div>

                        </form>
                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <form action="carbon_footprint.php" method="POST" class="hid" id="hotel">
                            <h1>HOTEL</h1>
                            <div class="input-group input-group-lg mt-4 py-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Annual &#8377</span>
                                <input placeholder="0" id="annual-input" name="h-input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                                <input class="form-control" name="h-co2-input" id="h-co2-input" type="text" value="0">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">&#8377&#8377&#8377&#8377</span>
                                <input class="form-control" name="h-amount-input" id="h-amount-input" type="text" value="0">
                            </div>
                            <input type="text" value="h-" name="letter" hidden>
                            <div class="my-5">
                                <button href="#" id="add-btn-h" type="submit" class="btn btn-success btn-lg">Add</button>
                            </div>
                        </form>




                    </div>

                </div>

            </div>
        </div>

    </div>



    </div>

    <script>
        const heading = document.getElementById('heading');

        const _electricity = document.getElementById('electricity');
        const _vehicle = document.getElementById('vehicle');
        const _hotel = document.getElementById('hotel');
        const _flight = document.getElementById('flight');

        function Electricity() {

            _electricity.style.display = "block ";
            _vehicle.style.display = "none ";
            _hotel.style.display = "none";
            _flight.style.display = "none";
            heading.style.display = "none ";

            var kwh = document.getElementById('kwh-input');
            var co2 = document.getElementById('e-co2-input');
            var amount = document.getElementById('e-amount-input');
            setInterval(function() {
                var kwh_value = kwh.value;
                var co2_value = (kwh_value * 0.01) / 10;
                co2.value = co2_value;

                var cost = (co2_value * 800);
                amount.value = cost;

                //  console.log(co2_value);
            }, 000);
        }

        function Flight() {

            _flight.style.display = "block";
            _vehicle.style.display = "none";
            _hotel.style.display = "none";
            _electricity.style.display = "none";
            heading.style.display = "none";

            var km = document.getElementById('f-km-input');
            var co2 = document.getElementById('f-co2-input');
            var amount = document.getElementById('f-amount-input');

            setInterval(function() {
                var km_value = km.value;
                var co2_value = (km_value * 0.13) / 500;
                co2.value = co2_value;

                var cost = (co2_value * 800);
                amount.value = cost;

                //  console.log(co2_value);
            }, 200);


        }

        function Vehicle() {

            _vehicle.style.display = "block";
            _electricity.style.display = "none";
            _hotel.style.display = "none";
            _flight.style.display = "none";
            heading.style.display = "none";

            var km = document.getElementById('car-km-input');
            var co2 = document.getElementById('v-co2-input');
            var amount = document.getElementById('v-amount-input');

            setInterval(function() {
                var km_value = km.value;
                var co2_value = (km_value * 0.03) / 200;
                co2.value = co2_value;

                var cost = (co2_value * 800);
                amount.value = cost;

                //  console.log(co2_value);
            }, 200);

        }

        function Hotel() {

            _hotel.style.display = "block";
            _vehicle.style.display = "none";
            _electricity.style.display = "none";
            _flight.style.display = "none";
            heading.style.display = "none";

            var annual = document.getElementById('annual-input');
            var co2 = document.getElementById('h-co2-input');
            var amount = document.getElementById('h-amount-input');

            setInterval(function() {
                var annual_value = annual.value;
                var co2_value = (annual_value * 0.08) / 20000;
                co2.value = co2_value;

                var cost = (co2_value * 800);
                amount.value = cost;

                //  console.log(co2_value);
            }, 200);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</body>

</html>