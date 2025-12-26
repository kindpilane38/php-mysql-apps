<?php
include "../db/db.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $course = trim($_POST["course"]);
    $phone = trim($_POST["phone"]);

    if (empty($name) || empty($email) || empty($course) || empty($phone)) {
        exit("<script>alert('All fields are required.')</script>");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("<script>alert('Invalild email address.')</script>");
    }

    $stmt = $con->prepare("INSERT INTO students (name, email, course, phone) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $course, $phone);
    $stmt->execute();

    header("Location: add.php?status=added");
    exit();
}
?>
<?php if (isset($_GET['status']) && $_GET['status'] === 'added'): ?>
    <script>
        alert("Student added successfully");
        // Remove query parameter from URL (prevents alert on reload)
        window.history.replaceState({}, document.title, window.location.pathname);
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Registration</title>
    <link rel="stylesheet" href="../assets/index.css">
</head>

<body>
    <h1>Student Registeration Form</h1>
    <p>Add students in the system for easy management.</p>

    <form action="add.php" method="post" class="contain">
        <input type="text" name="name" class="name" placeholder="enter your full name" required><br><br>
        <input type="email" class="email" name="email" placeholder="enter valid email address" required><br><br>
        <input type="text" name="course" class="course" placeholder="enter your course" required><br><br>
        <input type="text" name="phone" class="phone" placeholder="enter your contact number" required><br><br>

        <button type="submit" class="submit">Submit</button>
        <button type="button" class="view-list" onclick="window.location.href='view.php';">View List</button>

    </form>

</body>

</html>