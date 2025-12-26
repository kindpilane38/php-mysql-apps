<?php
    session_start();
    include '../db/db.php';

    $alert = false;
    // Handle admin login form submission
    if($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stat = $con->prepare('SELECT id, password FROM admins WHERE username = ?');
        $stat->bind_param('s', $username);
        $stat->execute();
        
        $result = $stat->get_result();

        if($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if(password_verify($password, $row['password'])) {
                $_SESSION['admin_id'] = $row['id'];
                header('Location: dash.php');
                exit;
            } 
        } 
    $alert = true;       //Invalid login
    } 
?>
        
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/index.css">
</head>

<body>
    <form method="post" class="container">

        <h1>Admin Login</h1>
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit" class="login">Login</button><br><br>
        <input type="button" class="contact-button" value="Contact Us" onclick="window.location.href='contact.php'">

    </form>
    <?php
        // ALERT FOR INVALID LOGIN
        if($alert == true && isset($alert)) {
            echo "<script>alert('Invalid username or password. Please try again.');</script>";
        }
    ?>
</body>

</html>
