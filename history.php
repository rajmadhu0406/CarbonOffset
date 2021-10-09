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

    <link rel="stylesheet" href="history.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->

    <title>Your Offset</title>
</head>

<body>

    <?php
    include 'base.php';
    ?>
    <div class="template">

        <?php
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM `carbon_history` WHERE email='$email' ORDER BY `time` DESC;";
            $result = $connection->query($sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows == 0)
            {
                showAlert("warning", "You have no history logs :(");
            }
            else
            {
                while ($curr_row = $result->fetch_assoc()) {
                    $type = $curr_row['type'];
                    $carbon = (float)$curr_row['co2'];
                    $amount = $curr_row['amount'];
                    $time = $curr_row['time'];
                    $tree = round($carbon * 6);
                    
                    
                    if($carbon < 1)
                    {
                        $caron = "<1";
                        $tree = 2;
                    }
                    
                   

                    if($type == "offset")
                    {
                            echo '
                            
                                <div class="card mb-3 mx-auto " style="max-width: 740px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                        
                                            <img src="https://source.unsplash.com/4OhFZSAT3sw/650x560" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 id="o-heading" class="card-title "> </h5>
                        
                                                <div class="o-card-div" id="o-time">
                                                    Time : '.$time.'
                                                </div>
                                                <div class="o-card-div" id="o-co2">
                                                    CO2e : '.$carbon.'
                                                </div>
                                                <div class="o-card-div" id="o-amount">
                                                    Amount : '.$amount.'
                                                </div>
                                                <div class="o-card-div" id="o-tree">
                                                    Trees : '.$tree.'
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            ';
                    }
                    else
                    {
                        if($type == "Electricity")
                        {
                            $imgsrc = "_kdTyfnUFAc";
                        }
                        elseif($type == "Flight")
                        {
                            $imgsrc = "rf6ywHVkrlY";
                        }
                        elseif($type == "Hotel")
                        {
                            $imgsrc = "eeqbbemH9-c";
                        }
                        elseif($type == "Vehicle")
                        {
                            $imgsrc = "oxQ0egaQMfU";
                        }



                            echo '
                                <div class="card mb-3 mx-auto" style="max-width: 740px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <!-- <img src="https://source.unsplash.com/_kdTyfnUFAc/600x500" class="img-fluid rounded-start" alt="..."> -->
                                            <!-- <img src="https://source.unsplash.com/rf6ywHVkrlY/650x500" class="img-fluid rounded-start" alt="..."> -->
                                            <!-- <img src="https://source.unsplash.com/oxQ0egaQMfU/650x500" class="img-fluid rounded-start" alt="..."> -->
                                            <!-- <img src="https://source.unsplash.com/amQPH1ZOzBQ/650x560" class="img-fluid rounded-start" alt="..."> -->
                                            <!-- eeqbbemH9-c   food-->

                                            <img src="https://source.unsplash.com/'.$imgsrc.'/650x560" class="img-fluid rounded-start" alt="...">

                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 id="f-heading" class="card-title ">  </h5>
                        
                                                <div class="f-card-div" id="f-time">
                                                    Time : '.$time.'
                                                </div>
                                                <div class="f-card-div" id="f-co2">
                                                    CO2e : '.$carbon.'
                                                </div>
                                                <div class="f-card-div" id="f-amount">
                                                    Amount : '.$amount.'
                                                </div>
                                                <div class="f-card-div" id="f-type">
                                                    Type : '.$type.'
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                    }

                }
            }
        ?>

<!-- footprint -->
        <!-- <div class="card mb-3 mx-auto" style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-4"> -->
                    <!-- <img src="https://source.unsplash.com/_kdTyfnUFAc/600x500" class="img-fluid rounded-start" alt="..."> -->
                    <!-- <img src="https://source.unsplash.com/rf6ywHVkrlY/650x500" class="img-fluid rounded-start" alt="..."> -->
                    <!-- <img src="https://source.unsplash.com/oxQ0egaQMfU/650x500" class="img-fluid rounded-start" alt="..."> -->
                    <!-- <img src="https://source.unsplash.com/amQPH1ZOzBQ/650x560" class="img-fluid rounded-start" alt="..."> -->
                    <!-- eeqbbemH9-c   food-->
                <!-- </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 id="f-heading" class="card-title ">| | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | </h5>

                        <div class="f-card-div" id="f-time">
                            Time : 
                        </div>
                        <div class="f-card-div" id="f-co2">
                            CO2e : 
                        </div>
                        <div class="f-card-div" id="f-amount">
                            Amount : 
                        </div>
                        <div class="f-card-div" id="f-type">
                            Type : 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> -->
<!--  -->

<!--  offsert -->
<!-- <div class="card mb-3 mx-auto " style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-4">
                  
                    <img src="https://source.unsplash.com/4OhFZSAT3sw/650x560" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 id="o-heading" class="card-title ">| | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | | </h5>

                        <div class="o-card-div" id="o-time">
                            Time : 
                        </div>
                        <div class="o-card-div" id="o-co2">
                            CO2e : 
                        </div>
                        <div class="o-card-div" id="o-amount">
                            Amount : 
                        </div>
                        <div class="o-card-div" id="o-tree">
                            Trees : 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> -->
<!--  -->

    </div>



 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>