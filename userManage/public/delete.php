<?php
    include "../db/db.php";

    $id = $_GET['id'];
    $query = "DELETE FROM user_manage WHERE id = $id";
    mysqli_query($con, $query);

    header("Location: index.php");
?>
