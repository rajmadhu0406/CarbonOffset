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
            <button type="button" class="btn btn-outline-light ms-5">Carbon footprint</button>
            <button type="button" class="btn btn-outline-light ">Carbon Offset</button>
            <button type="button" class="btn btn-outline-light ">Carbon History</button>
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
                                <th style="width: 18%;">CARBON FOOTPRINT</th>
                                <th style="width: 16%;">CARBON OFFSET</th>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td style="padding-left: 14%;">5</td>
                            </tr>
                        </table>
                        

                        <table id="amount-table">
                            <tr>
                                <th style="width: 15%;">AMOUNT</th>
                                <th style="width: 14%;">AMOUNT</th>
                            </tr>
                            <tr>
                                <td class="amount-td">5000</td>
                                <td class="amount-td">2500</td>
                            </tr>
                        </table>

                    </div>

                </div>

            </div>
        </div>

    </div>



    </div>

    <script>
        $('.count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>


</body>

</html>