<?php
include "../db/db.php";

if (!isset($_GET["id"])) {
    exit("Invalid request");
}

$id = (int) $_GET["id"];

// secure data request to prevent SQL IINJECTION------------------
$stat = $con->prepare("SELECT * FROM students WHERE id=?");
$stat->bind_param("i", $id);
$stat->execute();

// check for empty table------------------------------------------
$result = $stat->get_result();
if ($result->num_rows !== 1) {
    exit("No records found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel="stylesheet" href="../assets/index.css">
</head>

<body>
    <h1>Edit Form</h1>
    <p>Alter the values in fields below to update details.</p>
    <form action="update.php" method="post" class="contain">
        <input type="hidden" name="id" value="<?= $id ?>">

        <input type="text" value="<?= htmlspecialchars($row['name']) ?>" name="name" class="name" required><br><br>
        <input type="email" value="<?= htmlspecialchars($row['email']) ?>" name="email" class="email" required><br><br>
        <input type="text" value="<?= htmlspecialchars($row['course']) ?>" name="course" class="course"
            required><br><br>
        <input type="text" value="<?= htmlspecialchars($row['phone']) ?>" name="phone" class="phone" required><br><br>

        <button type="submit" class="submit">Update</button>
    </form>
</body>

</html>
