<?php
$con = new mysqli("localhost", "root", "", "systems");

if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}