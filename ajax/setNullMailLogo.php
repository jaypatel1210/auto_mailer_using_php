<?php

    if ($_POST['mlogo'] == 'NullLogo') {
        session_start();
        $_SESSION['mail_logo'] = 'https://static.framer.com/emails/logos/logo-circle-large.png';
        echo 'sUcC';
    } else {
        header('location: ../dashboard/');
    }

?>