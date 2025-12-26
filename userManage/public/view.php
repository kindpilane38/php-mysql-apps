<?php
include '../db/db.php';

if (isset($_GET["status"]) && $_GET["status"] === "added") {
    echo "<script>alert('User added successfully!')</script>";
}
if (isset($_GET["status"]) && $_GET["status"] === "updated") {
    echo "<script>alert('User updated successfully!')</script>";
}

$result = mysqli_query($con, $query = "SELECT * FROM user_manage ORDER BY id DESC");
echo "<h1 style='margin: 15px 54px 15px 43%'>Registered Users</h1>";

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' style='margin: auto;'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Course</th>";
    echo "<th>Phone</th>";
    echo "<th>Message</th>";
    echo "<th>Actions</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['course'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "<td>
                <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this user?');\">
                Delete</a>
                </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
echo "<center><button style='margin-top: 20px; font-size: 22px; border: 1px solid #000000ff; padding: 10px; width: fit-content; background-color: #007bff; color: white; border-radius: 5px;'>
    <a href='index.php' style = 'color: white; text-decoration: none'> Add New User</a>
    </button></center>";
mysqli_close($con);
