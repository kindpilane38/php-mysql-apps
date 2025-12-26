<?php
include "../db/db.php";

if (!isset($_GET["id"])) {
    exit("Invalid request");
}

/* through GET. The ID is validated, type-casted, and used in a prepared statement. 
For higher-security contexts, switch to POST with CSRF protection.*/

$id = (int) $_GET["id"];

$stmt = $con->prepare("DELETE FROM students WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: view.php?status=deleted");
exit();