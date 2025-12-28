<?php
include "../db/db.php";

if (!isset($_GET["id"])) {
    exit("Invalid request");
}
$id = (int) $_GET["id"];

$stmt = $con->prepare("DELETE FROM user_manage WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: view.php?status=deleted");
exit();
