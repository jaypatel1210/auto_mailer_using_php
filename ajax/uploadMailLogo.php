<?php

    if($_FILES["Mail_Logo"]["name"] != '') {
        $test = explode('.', $_FILES["Mail_Logo"]["name"]);
        $ext = end($test);
        $name = rand(14569, 9999999999) . '.' . $ext;
        $location = '../mail_logos/' . $name;  
        move_uploaded_file($_FILES["Mail_Logo"]["tmp_name"], $location);
        session_start();
        $_SESSION['mail_logo'] = $name;
        echo 'sUcC';
    } else {
        header('location: ../');
    }

?>