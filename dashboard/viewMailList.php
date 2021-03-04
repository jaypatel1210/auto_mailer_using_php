<?php

    include 'check-login.php';
    if (!isset($_GET['listid'])) {
        header('location: index');
    }
    include '../connect.php';
    $uidq = "SELECT * FROM `login_details` where email='".$_SESSION["login-email"]."'";
    $uid = mysqli_fetch_object(mysqli_query($con, $uidq));
    $q = "SELECT * FROM `mailing_list` WHERE mid=".$_GET['listid']." and uid=".$uid->id;
    $res = mysqli_query($con, $q);
    if (mysqli_num_rows($res) <= 0) {
        header('location: index');
    }
    $obj = mysqli_fetch_object($res);

    include '../vendor/autoload.php';
    $file_name = "../client_sheet/" . $obj->sheet_url;
    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
    $spreadsheet = $reader->load($file_name);
    $data = $spreadsheet->getActiveSheet()->toArray();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'allcss.php' ?>
</head>
<body>
    

    <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
            <thead class="teal white-text">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $x = 1;
                    foreach($data as $row){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $x; $x++; ?></th>
                            <th><?php echo $row[0]; ?></th>
                            <th><?php echo $row[1]; ?></th>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'alljs.php'; ?>
</body>
</html>