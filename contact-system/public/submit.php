<?php
    include "../db/db.php";

    if(!$_POST){
        header("Location: contact.php");
        exit;
    }
// Basic input validation and sanitization
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $msg = trim($_POST['msg']);

    if(empty($name) || empty($email) || empty($msg)) {
        echo "All fields are required.";
        exit;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }
    
    $name = htmlspecialchars($name);
    $msg = htmlspecialchars($msg);

// Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO messages(name, email, msg) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $msg);
    $stmt->execute();

    if(mysqli_affected_rows($con) > 0) {
        header("Location: login.php");
        exit;
    } else {
        echo "Failed to send message.";
    }
?>
