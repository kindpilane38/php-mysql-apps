<?php
include '../db/db.php';

$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM user_manage WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/edit.css" />
</head>

<body>
    <div class="header">
        <h2>Edit User Information</h2>
        <p><a href="index.php">(Back to Main Page)</a></p>

    </div>
    <div class="container">
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>" />
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($row['name']) ?>" required /><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($row['email']) ?>"
                required /><br><br>

            <label for="course">Course:</label>
            <select id="course" name="course">
                <option value="<?= htmlspecialchars($row['course']) ?>" selected>
                    <?= htmlspecialchars($row['course']) ?>
                </option>
                <option value="Web Development">Web Development</option>
                <option value="Data Science">Data Science</option>
                <option value="Digital Marketing">Digital Marketing</option>
                <option value="Graphic Design">Graphic Design</option>
            </select><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($row['phone']) ?>"
                required /><br><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message">
<?= htmlspecialchars($row['message']) ?></textarea><br><br>

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
