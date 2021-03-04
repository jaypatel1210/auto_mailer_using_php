<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include '../dashboard/check-login.php';

    if (isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['listid']) && isset($_POST['name'])) {

        require_once "vendor/autoload.php";
        $mailtext = '';
        foreach ($_SESSION['cmsgs'] as $value) {
            $mailtext .= "<p>.$value.</p> <br>";
        }
        $mailtext .= '<br><br><br>';
        $mailtext .= '&copy; 2020 '.$_SESSION['cname'];
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = $_POST['email'];                 
        $mail->Password = $_POST['pass'];
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->From = $_POST['email'];
        $mail->FromName =  $_POST['name'];

        include '../connect.php';
        $uidq = "SELECT * FROM `login_details` where email='".$_SESSION["login-email"]."'";
        $uid = mysqli_fetch_object(mysqli_query($con, $uidq));
        $q = "SELECT * FROM `mailing_list` WHERE mid=".$_POST['listid']." and uid=".$uid->id;
        $res = mysqli_query($con, $q);

        if (mysqli_num_rows($res) <= 0) {
            echo 404;
            return;
        }

        $obj = mysqli_fetch_object($res);
        $file_name = "../client_sheet/" . $obj->sheet_url;
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
        $spreadsheet = $reader->load($file_name);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach($data as $row){ 
            $mail->addAddress($row[0], $row[1]);
        }

        
        $mail->isHTML(true);
        $mail->Subject = $_SESSION['csub'];
        
        $mail->Body = $mailtext;
        $mail->AltBody = "This is the plain text version of the email content";
        if (isset($_SESSION['mail_attch'])) {
            $mail->AddAttachment("../mail_attach/".$_SESSION['mail_attch']);
        }
        // $mail->SMTPDebug = 2;
            $mid = $_POST['listid'];
            $em = $_POST['email'];
            $nm = $_POST['name'];
            $ti = date("Y-m-d H:i:s");
            try {
            $mail->send();
            $q3 = "INSERT INTO `mail_sent_status`(`uid`, `mid`, `remark`, `tmsp`, `email`, `name`) 
            VALUES ($uid->id, $mid,'Mails Sent Successfully', '$ti', '$em', '$nm')";
            mysqli_query($con, $q3);
            $loginem = $_SESSION['login-email'];
            session_unset();
            $_SESSION['login-email'] = $loginem;
            echo 200;
        } catch (Exception $e) {
            $q3 = "INSERT INTO `mail_sent_status`(`uid`, `mid`, `remark`, `tmsp`, `email`, `name`) 
            VALUES ($uid->id, $mid,'Error in Authentication', '$ti', '$em', '$nm')";
            mysqli_query($con, $q3);
            echo 404;
        }
    } else {
        header('location: index');
    }

?>

