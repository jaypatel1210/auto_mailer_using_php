<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include '../dashboard/check-login.php';

    if (isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['listid']) && isset($_POST['name'])) {

        require_once "vendor/autoload.php";
        $mailtext = '';
        $mailtext .= '<style>
         
            body {
               padding-top: 0 !important;
               padding-bottom: 0 !important;
            }
         
            body.strip-padding {
               padding: 0;
               margin: 0;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 400;
               font-style: normal;
               font-display: swap;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuI6fAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 500;
               font-style: normal;
               font-display: swap;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuGKYAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 600;
               font-style: normal;
               font-display: swap;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuFuYAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 700;
               font-style: normal;
               font-display: swap;
            }
         
            p,
            a,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            li,
            strong,
            span {
               font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            }
         
            .marketing p,
            .marketing a,
            .marketing h1,
            .marketing h2,
            .marketing h3,
            .marketing h4,
            .marketing h5,
            .marketing h6,
            .marketing li,
            .marketing strong,
            .marketing span {
               font-family: "Inter", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            }
         
            a[x-apple-data-detectors] {
               color: inherit !important;
               text-decoration: none !important;
               font-size: inherit !important;
               font-family: inherit !important;
               font-weight: inherit !important;
               line-height: inherit !important;
            }
         
            p,
            ul {
               font-size: 16px;
               line-height: 1.6 !important;
               margin: 0px !important;
               text-rendering: optimizeLegibility;
               -webkit-font-smoothing: antialiased;
               mso-line-height-rule: exactly;
            }
         
            p a,
            h1 a {
               color: #0099ff !important;
               text-decoration: underline;
               transition: color 0.2s;
            }
         
            h1 a {
               text-decoration: none;
            }
         
            p a:hover,
            h1 a:hover {
               color: #0077ff !important;
            }
         
            strong {
               font-weight: 600;
            }
         
            .headline-1 {
               font-size: 48px;
               line-height: 44px;
               margin: 0;
               padding: 0;
               letter-spacing: -0.03em;
               font-weight: 700;
               line-height: 1.2;
            }
         
            .headline-2 {
               font-size: 32px;
               line-height: 44px;
               margin: 0;
               padding: 0;
               letter-spacing: -0.03em;
               font-weight: 700;
               line-height: 1.3;
            }
         
            .space-16 {
               height: 16px;
            }
         
            .space-20 {
               height: 20px;
            }
         
            .space-40 {
               height: 40px;
            }
         
            .space-60 {
               height: 60px;
            }
         
            .size-m {
               font-size: 14px !important;
            }
         
            .size-l {
               font-size: 16px !important;
               line-height: 1.7 !important;
            }
         
            .size-xl {
               font-size: 18px !important;
               line-height: 1.6 !important;
               letter-spacing: -0.1 !important;
            }
         
            .description-hidden {
               color: transparent;
               display: none;
               font-size: 0;
               height: 0;
               opacity: 0;
               visibility: hidden;
               width: 0;
            }
         
            .description-spacer {
               display: none;
               max-height: 0px;
               overflow: hidden;
            }
         
            .button {
               background-color: #0099ff;
               color: #ffffff;
               display: inline-block;
               line-height: 40px;
               text-align: center;
               text-decoration: none;
               -webkit-text-size-adjust: none;
               letter-spacing: 0.2;
               border-radius: 10px;
               font-size: 16px;
               font-weight: 500;
               padding: 0 16px;
               transition: background-color 0.2s;
            }
         
            .button:hover {
               background-color: #0077ff !important;
            }
         
            .button.big {
               border-radius: 14px;
               font-size: 18px;
               font-weight: 600;
               padding: 7px 20px;
            }
         
            .logo-img {
               display: block;
               height: 34px;
            }
         
            .logo a {
               text-decoration: none;
               font-size: 16px;
               font-weight: 600;
               border: none;
            }
         
            .logo .logo-label {
               color: #000000;
            }
         
            @media (prefers-color-scheme: dark) {
               .logo .logo-label {
                  color: #ffffff !important;
               }
            }
         
            .list {
               padding: 0;
               margin: 0;
               padding-left: 16px;
            }
         
            .container {
               width: 100%;
               padding-top: 40px;
               padding-bottom: 40px;
            }
         
            .container.centered {
               width: 680px;
               max-width: 680px;
            }
         
            .strip-padding .container {
               padding: 40px;
            }
         
            .container.align-center h1,
            .container.align-center p {
               text-align: center;
            }
         
            .wrapper-text {
               padding-left: 2px;
               margin-top: 26px !important;
            }
         
            .wrapper-button {
               margin-top: 30px !important;
            }
         
            .wrapper-button.big {
               margin-top: 40px !important;
            }
         
            .wrapper-url {
               margin-top: 20px;
            }
         
            .wrapper-url span {
               color: #aaaaaa !important;
               overflow-wrap: break-word;
               word-wrap: break-word;
               word-break: break-all;
            }
         
            .wrapper-url span a,
            .wrapper-url p {
               color: #aaaaaa !important;
               font-size: 12px !important;
            }
         
            .footer {
               margin-top: 60px;
            }
         
            .footer.tight {
               margin-top: 40px;
            }
         
            .footer p {
               mso-cellspacing: 0px;
               mso-padding-alt: 0px;
               color: #aaaaaa;
               font-size: 12px !important;
            }
         
            .marketing .footer p {
               font-size: 14px !important;
            }
         
            .marketing .image {
               margin: 0px auto;
               text-align: center;
               padding: 40px 0;
            }
         
            .marketing .image img {
               border-radius: 16px;
               overflow: hidden;
               width: 100%;
               max-width: 600px;
            }
         
            .marketing .content {
               padding-left: 40px;
               padding-right: 40px;
            }
         
            .marketing .content p,
            .marketing .content li {
               font-size: 18px;
               line-height: 1.6 !important;
               letter-spacing: -0.1 !important;
            }
         
            .marketing .list li {
               margin-top: 8px;
               margin-bottom: 8px;
            }
         
            .marketing .list li span {
               opacity: 0.75;
            }
         
            @media only screen and (max-width: 640px) {
               .container.centered {
                  width: 100% !important;
               }
         
               .strip-padding .container {
                  padding: 20px !important;
               }
         
               .size-xl {
                  font-size: 16px !important;
               }
         
               .headline-1 {
                  font-size: 32px !important;
                  line-height: 1.3 !important;
               }
         
               .headline-2 {
                  font-size: 28px !important;
                  line-height: 1.3 !important;
               }
         
               .marketing .content {
                  padding: 0px !important;
               }
         
               .marketing .content p,
               .marketing .content li {
                  font-size: 16px !important;
               }
         
               @media only screen and (max-width: 425px) {
                  .headline-2 {
                     font-size: 24px !important;
                     line-height: 1.3 !important;
                  }
         
                  .button.big {
                     font-size: 16px !important;
                     border-radius: 10px !important;
                     font-weight: 500 !important;
                  }
         
                  .button {
                     width: 100% !important;
                     display: block !important;
                     padding: 0 !important;
                  }
         
                  .hide-on-mobile {
                     display: none;
                  }
               }
            }
         </style>
         
      
         
        
         </head>
     
            <div class="description-hidden" style="
                 color: transparent;
                 display: none;
                 font-size: 0;
                 height: 0;
                 opacity: 0;
                 visibility: hidden;
                 width: 0;
               ">
               ' . $_SESSION["company_name"] . '
            </div>
            <div class="description-spacer" style="display: none; max-height: 0px; overflow: hidden;">
               &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
            <div dir="ltr">
               <table aria-label="Email from Framer" border="0" cellpadding="0" cellspacing="0" role="presentation"
                  class="container centered marketing" align="center" width="600" style="
                   max-width: 680px;
                   padding: 40px;
                   padding-bottom: 40px;
                   padding-top: 40px;
                   width: 680px;
                 ">
         
                  <tr>
                     <td style="padding-bottom: 20px;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin: 0px auto;"
                           align="center">
                           <tbody>
                              <tr>
                                 <td>';
                    
                if($_SESSION['weblink'] == null) {
                    $mailtext .= '<a href="#"';
                } else {
                    $mailtext .= '<a href="'. $_SESSION['weblink'] .'"';
                }
                $mailtext .= 'style="font-family: "Inter", "Helvetica Neue", Helvetica, Arial, sans-serif !important;">';
                $mailtext .= ' <img src="../mail_logos/'.$_SESSION["mail_logo"].'" alt="Main Logo"
                                          border="0" width="50" height="50" id="mainlogo" /></a>';
                $mailtext .= '  </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
         
                  <tr>
                     <td class="headline-1" style="
                       font-size: 48px;
                       font-weight: 700;
                       letter-spacing: -0.03em;
                       line-height: 1.2;
                       margin: 0;
                       padding: 0;
                       padding-bottom: 0px;
                       padding-top: 0px;
                     ">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                           style="margin: 0px auto; text-align: center;" align="center">
                           <tbody>
                              <tr>
                                 <td>
                                    <h3 class="headline-1" style="
                                 font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                                   sans-serif !important;
                                 font-size: 48px;
                                 font-weight: 700;
                                 letter-spacing: -0.03em;
                                 line-height: 1.2;
                                 margin: 0;
                                 max-width: 500px;
                                 padding: 0;
                                 id="mail-title-chnge"
                               ">
                                       '. $_SESSION['mail_title'] . ' 
                                    </h3>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>';
                $mailtext .= '<tr>
                     <td class="image" style="margin: 0px auto; padding: 40px 0; text-align: center;">
         
                        <a 
                           href="#"
                           style="
                         font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                           sans-serif !important;
                       "></a>
         
                       
                     </td>
                  </tr>
                  <tr>
                     <td class="content" style="padding-left: 40px; padding-right: 40px;">
         
                      
                        <p style="
                         -webkit-font-smoothing: antialiased;
                         font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                           sans-serif !important;
                         font-size: 18px;
                         letter-spacing: -0.1 !important;
                         line-height: 1.6 !important;
                         margin: 0px !important;
                         mso-line-height-rule: exactly;
                         text-rendering: optimizeLegibility;
                       "
                       id="mail-msg-chnage"
                       >
                           '. $_SESSION['mail_msg'] .'
                        </p>';
                    $mailtext .= '<div class="space-20" style="height: 20px;">&nbsp;</div>';

                    if (count($_SESSION['notes']) > 0) {
                        $mailtext .= '<ul class="list" style="
                                    -webkit-font-smoothing: antialiased;
                                    font-size: 16px;
                                    line-height: 1.6 !important;
                                    margin: 0px !important;
                                    mso-line-height-rule: exactly;
                                    padding: 0;
                                    padding-left: 16px;
                                    text-rendering: optimizeLegibility;" id="main-ul">';

                        foreach ($_SESSION['notes'] as $value) {
                            $mailtext .= '<li style="
                                            font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                                                sans-serif !important;
                                            font-size: 18px;
                                            letter-spacing: -0.1 !important;
                                            line-height: 1.6 !important;
                                            margin-bottom: 8px;
                                            margin-top: 8px;
                                            "
                                            id="noteinp-chng1"
                                            >
                                                '.$value.'
                                            </li>';
                        }
                        $mailtext .= '</ul>';
                    }

                    if ($_SESSION['weblink'] != null) {
                        $mailtext .= '<div class="wrapper-button big" style="margin-top: 40px !important;" id="website-link-to-add">';
                        $mailtext .= '<a class="button big"
                                        href="'.$_SESSION['weblink'].'"
                                        style="
                                    -webkit-text-size-adjust: none;
                                    background-color: #0099ff;
                                    border-radius: 14px;
                                    color: #ffffff;
                                    display: inline-block;
                                    font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                                        sans-serif !important;
                                    font-size: 18px;
                                    font-weight: 600;
                                    letter-spacing: 0.2;
                                    line-height: 40px;
                                    padding: 7px 20px;
                                    text-align: center;
                                    text-decoration: none;
                                    transition: background-color 0.2s;
                                    "
                                    target="_blank"
                                    id="weblink-chng"
                                    >Try it out</a>';
                        $mailtext .= '</div>';
                    }
                    $mailtext .= '<div class="footer tight" style="margin-top: 40px;">
                           <p style="
                           -webkit-font-smoothing: antialiased;
                           color: #aaaaaa;
                           font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                             sans-serif !important;
                           font-size: 14px !important;
                           letter-spacing: -0.1 !important;
                           line-height: 1.6 !important;
                           margin: 0px !important;
                           mso-cellspacing: 0px;
                           mso-line-height-rule: exactly;
                           mso-padding-alt: 0px;
                           text-rendering: optimizeLegibility;
                         ">
                              &copy; 2020 ';
                    $mailtext .= '<span id="company-name-chng">'.$_SESSION["company_name"].'</span>';
                    $mailtext .= '</p>
                        </div>
                        <div class="space-20" style="height: 20px;">&nbsp;</div>
         
                        </td>
                        </tr>
                        </table>';


        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = 3;
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

         $mail->Subject = $_SESSION['mail_title'];

         $mail->Body = $mailtext;
         $mail->AltBody = "This is the plain text version of the email content";
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