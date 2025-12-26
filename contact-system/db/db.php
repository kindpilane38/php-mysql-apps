<?php
    $con = new mysqli("localhost", "root", "", "phpDb");

    if($con->connect_error) {
        die("Database connection failed: " . mysqli->connect_error);
    }

?>
