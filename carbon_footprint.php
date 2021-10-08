<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['loggedin'] != true) {
    header("location: index.php");
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

                        <div class="p-1 mb-5" style="display: none;">
                            <h5 class="card-titles" id="heading">Carbon Footprint</h5>
                        </div>

                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <div id="electricity">
                            <h1>ELECTRICITY</h1>
                            <div class="input-group input-group-lg mt-5 py-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">kWh</span>
                                <input placeholder="0" id="kwh-input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                                <input class="form-control" id="e-co2-input" type="text" value="0" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">&#8377&#8377&#8377&#8377</span>
                                <input class="form-control" id="e-amount-input" type="text" value="0" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="my-5">
                                <a href="#" type="button" class="btn btn-success btn-lg">Add</a>
                            </div>
                        </div>

                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <div id="flight">
                            <h1>FLIGHT</h1>
                            <div class="input-group input-group-lg mt-5 py-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">KM</span>
                                <input placeholder="0" id="f-km-input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                                <input class="form-control" id="f-co2-input" type="text" value="0" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">&#8377&#8377&#8377&#8377</span>
                                <input class="form-control" id="f-amount-input" type="text" value="0" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="my-5">
                                <a href="#" type="button" class="btn btn-success btn-lg">Add</a>
                            </div>
                        </div>
                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <div id="vehicle">
                            <h1>FLIGHT</h1>
                            <div class="input-group input-group-lg mt-5 py-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">KM.</span>
                                <input placeholder="0" id="car-km-input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">CO2e</span>
                                <input class="form-control" id="v-co2-input" type="text" value="0" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="input-group input-group-lg mt-4 py-3">
                                <span class="input-group-text" id="inputGroup-sizing-lg">&#8377&#8377&#8377&#8377</span>
                                <input class="form-control" id="v-amount-input" type="text" value="0" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="my-5">
                                <a href="#" type="button" class="btn btn-success btn-lg">Add</a>
                            </div>

                        </div>
                        <!-- X_IvVDuHvDQ  1200x1400-->
                        <div id="hotel">

                        </div>



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

            _electricity.style.display = "block";
            _vehicle.style.display = "none";
            _hotel.style.display = "none";
            _flight.style.display = "none";
            heading.style.display = "none";

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
            var co2 = document.getElementById('co2-input');
            var amount = document.getElementById('amount-input');

            setInterval(function() {
                var km_value = km.value;
                var co2_value = (kwh_value * 0.13) / 500;
                co2.value = co2_value;

                var cost = (co2_value * 800);
                amount.value = cost;

                //  console.log(co2_value);
            }, 500);

        }

        function Hotel() {

            _hotel.style.display = "block";
            _vehicle.style.display = "none";
            _electricity.style.display = "none";
            _flight.style.display = "none";
            heading.style.display = "none";


        }
    </script>

</body>

</html>