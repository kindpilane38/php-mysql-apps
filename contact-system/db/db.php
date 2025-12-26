<?php
    $con = mysqli_connect("localhost", "root", "", "phpDb");

    if(!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
?>