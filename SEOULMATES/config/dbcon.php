<?php
    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "seoulmates";

    //database connection
    $con = mysqli_connect($host, $username, $password, $database);

    //check connection
    if(!$con){
        die("connection failed:". mysqli_connect_error());
    }

    $host1 = "localhost:3307";
    $username1 = "root";
    $password1 = "";
    $database1 = "seoulmatesadmin";

    //database connection
    $con1 = mysqli_connect($host, $username, $password, $database1);

    //check connection
    if(!$con1){
        die("connection failed:". mysqli_connect_error());
    }
?>