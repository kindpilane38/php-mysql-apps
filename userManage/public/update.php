<?php
include '../db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = trim($_POST["id"]);
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $course = trim($_POST["course"]);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($phone) || empty($course) || empty($message)) {
        exit("All the fields are required.");
    }
    if (filter_var($eamil, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    }

    $stat = $con->prepare("UPDATE user_manage SET name=?, email=?, phone=?, course=?, message=? WHERE id=?");
    $stat->bind_param('sssssi', $name, $email, $phone, $course, $message, $id);
    $stat->execute();

    if ($stat->affected_rows >= 0) {
        header("Location: view.php?status=updated");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
        echo "Update failed.";
    }
}