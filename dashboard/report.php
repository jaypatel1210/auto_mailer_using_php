<?php
    include 'check-login.php';
    $isActive = 'report';
    $em = $_SESSION['login-email'];
    include '../connect.php';
    $uidq = "SELECT * FROM `login_details` where email='$em'";
    $uid = mysqli_fetch_object(mysqli_query($con, $uidq));

    $q = "SELECT * FROM `mail_sent_status` WHERE uid = $uid->id order by sid desc";
    $cmd = mysqli_query($con, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Report</title>
    <?php include 'allcss.php'; ?>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid mt-4">

        <div class="text-center">
            <h4>Reports</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">From Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sheet Name</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 1;
                        while ($row = mysqli_fetch_array($cmd)) {
                            
                            ?>
                            <tr>
                                <th scope="row"><?php echo $x; $x++; ?></th>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>
                                    <?php
                                        $q2 = "SELECT * FROM `mailing_list` WHERE mid=".$row['mid'];
                                        $res = mysqli_fetch_object(mysqli_query($con, $q2));
                                        echo $res->sheet_name."<a 
                                        href='viewMailList?listid=$res->mid' 
                                        target='_blank'
                                        style='color: #007bff;text-decoration: underline;'
                                        >&nbsp;&#x2197;&nbsp;</a>";
                                    ?>
                                </td>
                                <td><?php
                                    if ($row['remark'] == 'Mails Sent Successfully') {
                                        ?>
                                        <span class="badge badge-pill badge-success" style="font-size:12px;"><?php echo $row['remark']; ?></span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="badge badge-pill badge-danger" style="font-size:12px;"><?php echo $row['remark']; ?></span>
                                        <?php
                                    }
                                ?></td>
                                <td><?php echo $row['tmsp']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php include 'alljs.php'; ?>
</body>
</html>