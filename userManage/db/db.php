<?php
    $con = mysqli_connect("localhost", "root", "", "phpDb");

    if (!$con){
        die("Connection failed: " . mysqli_connect_error());
    }


