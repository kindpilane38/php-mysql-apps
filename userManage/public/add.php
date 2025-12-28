<?php
include '../db/db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Collect & trim input
$name    = trim($_POST["name"] ?? '');
$email   = trim($_POST["email"] ?? '');
$phone   = trim($_POST["phone"] ?? '');
$course  = trim($_POST["course"] ?? '');
$message = trim($_POST["message"] ?? '');

// Validation
if (empty($name) || empty($email) || empty($phone)) {
    echo "All fields are required.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit();
}

// Sanitization
$name    = htmlspecialchars($name);
$email   = htmlspecialchars($email);
$phone   = htmlspecialchars($phone);
$course  = htmlspecialchars($course);
$message = htmlspecialchars($message);

// Prepared statement
$stmt = $con->prepare(
    "INSERT INTO user_manage (name, email, phone, course, message) VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("sssss", $name, $email, $phone, $course, $message);
$stmt->execute();

// Redirect after success
header("Location: view.php?status=added");
exit();
