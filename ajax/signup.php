<?php
    if ($_POST['signup-name'] !== '' && $_POST['signup-email'] !== '' && 
    $_POST['signup-password'] !== '' && $_POST['signup-confirm-password'] !== '' && 
    count($_POST) === 4) { 
        include '../connect.php';
        $q1 = 'SELECT * FROM `login_details` WHERE email="'.$_POST['signup-email'].'"';
        if (mysqli_num_rows(mysqli_query($con, $q1)) === 0) {
            
            $q = 'INSERT INTO `login_details`(`email`, `password`, `name`) VALUES 
            (
                "'. addslashes($_POST['signup-email']).'",
                "'. addslashes(password_hash($_POST['signup-password'], PASSWORD_DEFAULT)).'",
                "'. addslashes($_POST['signup-name']).'"
            )';

            if (mysqli_query($con, $q)) {
                echo "SUCCESS";
            } else {
                echo 'ErR';
            } 
        }
    } else {
        header('location: ../login.php');
    }
?>