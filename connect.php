<?php
    $host_id = "root";
    $host_password = "";
    $databse_name="trojans";

    $con=mysqli_connect("localhost",$host_id,$host_password);
    $db=mysqli_select_db($con,$databse_name);
?>
