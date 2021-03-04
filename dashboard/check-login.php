<?php
    session_start();

    if (!isset($_SESSION['login-email'])) {
        header('location: ../login.php');
        exit();
    }
?>