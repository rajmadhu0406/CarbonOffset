<?php

 //setting up connection variables
 $server = "127.0.0.1:3307";
 $username = "root"; 
 $password = "";
 $database = "wt_project";

 $connection = mysqli_connect($server, $username, $password, $database);
 if (!$connection) {
     echo "iefhwiohf";
     die("MySQL connection failed!!! due to " . mysqli_connect_errno());
 }
 else{
    //  echo "<script> alert('Database connection successful'); </script>";
 }

 ?>