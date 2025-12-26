<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    (the use of ', (), &, @,#, $, %, etc.)
    in the TEXTAREA creates SQL ERROR!!
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    SOLUTION: Input validation & Santization
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
-->
<?php
include '../db/db.php';

if (!$_POST) {
    header('Location: index.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($phone)) {
        echo "All fields are required.";
    }
    if (filter_var($eamil, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    }
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $course = htmlspecialchars($course);
    $phone = htmlspecialchars($phone);
    $message = htmlspecialchars($message);

    $stmt = $con->prepare("INSERT INTO user_manage (name, email, phone, course, message) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $course, $message);
    $stmt->execute();

    header("Location: view.php?status=added");
    exit();
    // if (mysqli_query($con, $query)) {
    //     header("Location: view.php");
    // } else {
    //     echo "Error: " . $query . "<br>" . mysqli_error($con);
    // }
}
?>