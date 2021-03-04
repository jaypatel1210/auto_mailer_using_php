<?php

    if($_FILES["mail_attachment"]["name"] != '') {
        $test = explode('.', $_FILES["mail_attachment"]["name"]);
        $ext = end($test);
        $name = rand(14569, 9999999999) . '.' . $ext;
        $location = '../mail_attach/' . $name;  
        move_uploaded_file($_FILES["mail_attachment"]["tmp_name"], $location);
        session_start();
        $_SESSION['mail_attch'] = $name;
        echo 'sUcC';
    } else {
        header('location: ../');
    }

?>