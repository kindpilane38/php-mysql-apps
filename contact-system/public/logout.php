<?php
    session_start();
    session_unset();
// end session and clear ACCESS TO admin DASHBOARD => LOGOUT
    session_destroy();

    header("Location: login.php");
    exit;

?>
