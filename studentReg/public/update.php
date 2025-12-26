<?php
include "../db/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}

$id = (int) $_POST["id"];
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$course = trim($_POST["course"]);
$phone = trim($_POST["phone"]);

$stmt = $con->prepare("UPDATE students SET name=?, email=?, course=?, phone=? WHERE id=?");
$stmt->bind_param("ssssi", $name, $email, $course, $phone, $id);
$stmt->execute();

header("Location: view.php?status=updated");
exit();