<?php
    require("config.php");
    unset($_SESSION['logged_in']);
    unset($_SESSION['name']);
    session_destroy();
    header("Location: index.php");
    die("Redirecting to: index.php");
?>