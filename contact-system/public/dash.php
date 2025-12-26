<?php
    session_start();
    include '../db/db.php';
// admin is logged in?
    if(!isset($_SESSION['admin_id'])){
        header('Location: login.php');
        exit;
    }
// Fetch msg->DB
    $stat = $con->prepare("SELECT * FROM messages ORDER BY received DESC");
    $stat->execute();
    $result = $stat->get_result();

    echo "<h1 class='dash-head' style='text-align:center;'>Admin Dashboard</h1><hr>";
    echo "<div style='margin: 20px; text-align: left;'>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<b>Name: </b>" . htmlspecialchars($row['name']) . "<br>";
        echo "<b>Email: </b>" . htmlspecialchars($row['email']) . "<br>";
        echo "<b>Message: </b>" . htmlspecialchars($row['msg']) . "<br><br>";
        echo "<b>Received: </b>" . htmlspecialchars($row['received']) . "<br><hr>";
    }
    echo "</div>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../assets/index.css">
</head>

<body class="dash-body">
    <input type="button" class="contact-button" value="Logout"
        onclick="if(confirm('Are you sure you want to logout?')) window.location.href='logout.php'">
</body>


</html>

