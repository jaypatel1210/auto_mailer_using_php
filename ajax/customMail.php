<?php
    include '../dashboard/check-login.php';
    if (isset($_POST['cname'])  && isset($_POST['csubject']) && isset($_POST['msg'])) {
        $_SESSION['cname'] = $_POST['cname'];
        $_SESSION['csub'] = $_POST['csubject'];
        $_SESSION['cmsgs'] = $_POST['msg'];
        echo 'd';
    } else {
        header('location: ../dashboard');
    }

?>