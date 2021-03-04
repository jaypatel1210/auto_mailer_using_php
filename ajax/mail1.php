<?php
    include '../dashboard/check-login.php';

    $img = ''; 
    print_r($_POST);  
    if ($_POST['type'] === 'basic') {
        $img = 'https://static.framer.com/emails/logos/logo-circle-large.png';
    }

    $output = '';

    $output .= $img;

    echo $output;
?>