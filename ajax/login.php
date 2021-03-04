<?php 
  if ($_POST['signin-email'] !== '' && $_POST['signin-pass'] !== '' && count($_POST) === 2) {
    include '../connect.php';

    $q = 'SELECT * FROM `login_details` WHERE email="'.$_POST['signin-email'].'"';
    $exe = mysqli_query($con, $q);
    if (mysqli_num_rows($exe) === 1) {
      $res = mysqli_fetch_object($exe);
      if ($res->email === $_POST['signin-email'] && password_verify($_POST['signin-pass'], $res->password)) {
        session_start();
        $_SESSION['login-email'] = $res->email;
        echo "ScC3s";
      } else {
        echo "E3r2";
      }
    } else {
      echo "3Er2";
    }
  } else {
    header('location: ../login.php');
  }
?>