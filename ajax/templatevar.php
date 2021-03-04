<?php

    include '../dashboard/check-login.php';

    if (isset($_POST['t1']) && isset($_POST['t2']) && isset($_POST['t3']) && isset($_POST['t4']) && isset($_POST['t5'])) {
        // session_start();
        $_SESSION['company_name'] = $_POST['t1'];
        $_SESSION['mail_title'] = $_POST['t2'];
        $_SESSION['mail_msg'] = $_POST['t3'];
        $_SESSION['weblink'] = $_POST['t4'];
        $_SESSION['notes'] = $_POST['t5'];
    } else {
        header('location: ../dashboard');
    }

?>