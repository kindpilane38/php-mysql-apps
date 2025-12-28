<?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
    <script>
        alert("Student deleted successfully");
        // Remove query parameter from URL (prevents alert on reload)
        window.history.replaceState({}, document.title, window.location.pathname);
    </script>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'updated'): ?>
    <script>
        alert("Student updated successfully");
        window.history.replaceState({}, document.title, window.location.pathname);
    </script>
<?php endif; ?>

<?php
include '../db/db.php';

$result = mysqli_query($con, "SELECT * FROM students ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="../assets/list.css">
</head>

<body>
    <h1>Students List</h1>

    <?php if (mysqli_num_rows($result) === 0): ?>
        <p>No record added.</p>
    <?php else: ?>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Phone No</th>
                <th>Actions</th>
            </tr>

            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <tr class="tdata">
                    <td>
                        <?= htmlspecialchars($row['name']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['email']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['course']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['phone']) ?>
                    </td>

                    <td>
                        <a href="edit.php?id= <?= $row['id'] ?>" class="edit">Edit</a> |
                        <a href="delete.php?id=<?= $row['id'] ?>"
                            onclick="return confirm('Do you confirm to delete this student?'); " class="delete">Delete</a>
                    </td>
                </tr>

            <?php endwhile; ?>
        </table>
    <?php endif; ?>

    <button type="button" onclick="window.location.href='add.php'">Register</button>
</body>

</html>
