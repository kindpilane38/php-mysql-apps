<?php if (isset($_GET['status'])):

    if ($_GET['status'] === 'added'): ?>
<script>
alert('User added successfully.');
window.history.replaceState({}, document.title, window.location.pathname);
</script>
<?php endif; ?>

<?php if ($_GET['status'] === 'deleted'): ?>
<script>
alert('User deleted successfully.');
window.history.replaceState({}, document.title, window.location.pathname);
</script>
<?php endif; ?>

<?php if ($_GET['status'] === 'updated'): ?>
<script>
alert('User updated successfully.');
window.history.replaceState({}, document.title, window.location.pathname);
</script>
<?php endif; ?>

<?php endif; ?>

<?php
include '../db/db.php';

// Fetch users
$result = mysqli_query($con, "SELECT * FROM user_manage ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View List</title>
    <link rel="stylesheet" href="../assets/view.css">
</head>

<body>

    <h1>Registered Users</h1>

    <?php if (mysqli_num_rows($result) !== 0) : ?>
    <div>
        <table border="1">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>


            <?php while ($row = mysqli_fetch_assoc($result)) : ?>

            <tr class="values">
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['course']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>

                <td>
                    <center>
                        <a href="edit.php?id=<?= htmlspecialchars($row['id']) ?>">
                            Edit
                        </a> |

                        <a href="delete.php?id=<?= htmlspecialchars($row['id']) ?>"
                            onclick="return confirm('Are you sure you want to delete this student?'); " class="delete">
                            Delete
                        </a>
                    </center>
                </td>
            </tr>

            <?php endwhile; ?>
        </table>
    </div>
    <?php else : ?>

    <p>No records found.</p>

    <?php endif; ?>

    <!-- Add new user button -->

    <center>
        <button class="new-user" onclick="window.location.href='index.php'">
            Add New User
        </button>
    </center>

</body>

</html>
<?php mysqli_close($con); ?>
