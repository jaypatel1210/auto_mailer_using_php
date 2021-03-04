<?php

    if($_FILES["new_sheet_upload"]["name"] != '' && isset($_POST['sheet_name'])) {
        $test = explode('.', $_FILES["new_sheet_upload"]["name"]);
        $ext = end($test);
        $name = rand(14569, 9999999999) . '.' . $ext;
        $location = '../client_sheet/' . $name;  
        move_uploaded_file($_FILES["new_sheet_upload"]["tmp_name"], $location);
        session_start();
        // $_SESSION['mail_logo'] = $name;

        include '../connect.php';
        $em = $_SESSION['login-email'];
        $uidq = "SELECT * FROM `login_details` where email='$em'";
        $uid = mysqli_fetch_object(mysqli_query($con, $uidq));
        $shname = $_POST['sheet_name'];
        $q = "INSERT INTO `mailing_list`(`uid`, `sheet_name`, `sheet_url`) VALUES ($uid->id, '$shname', '$name')";
        if (mysqli_query($con, $q)) {
            echo 'sUcC';
        } else {
            echo 'fail';
        }
    } else {
        header('location: ../');
    }

?>