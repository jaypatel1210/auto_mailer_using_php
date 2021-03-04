<?php
    include '../dashboard/check-login.php';
    $em = $_SESSION['login-email'];

    if (isset($_POST['up1']) && isset($_POST['up2'])) {
        $email = $_POST['up1'];
        $name = $_POST['up2'];
        include '../connect.php';

        $q1 = "SELECT * FROM `login_details` WHERE email='$em'";
        if (mysqli_num_rows(mysqli_query($con, $q1)) == 1) {
            $q = "UPDATE `login_details` SET `email`='$email',`name`='$name' WHERE email='$em'";
        
            if (mysqli_query($con, $q)) {
                $_SESSION['login-email'] = $email;
                echo 200;
            } else {
                echo 404;
            }
        } else {
            echo 404;
        }
        
    }

?>