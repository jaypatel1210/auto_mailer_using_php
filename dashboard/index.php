<?php
   include 'check-login.php';
   $isActive = 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Auto Mailer</title>
    <?php include 'allcss.php' ?>
    <style>
        .custome-mail{
            border: 2px solid;
            height: 433px;
            border-radius: 18px;
            margin-top: 16px;
        }
        .v-center{
            display: flex;
            justify-content: center;
            flex-direction: column;
            height: 400px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>
    
    <div class="container p-4">
    
        <div class="text-center">
            <h3>
                <strong>
                    Select Mail Template
                </strong>
            </h3>
        </div>

        <div class="row mt-4">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="text-center">
                    <a href="template1"><img class="img-responsive" src="../images/mail1.png" alt="Mail template 1" /></a>
                    <a href="template1" class="btn btn-primary btn-sm">Select</a>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-4 col-12">
                <div class="text-center">
                    <img class="img-responsive" src="../images/mail2.png" alt="Mail template 1" style="width: 300px; height: 461px;" />
                    <button class="btn btn-primary btn-sm">Select</button>
                </div>
            </div> -->
            <div class="col-lg-4 col-md-4 col-12">
                <div class="text-center">
                    <div class="custome-mail">
                        <div class="text-center v-center">
                            <h1>
                                <a href="custome-template">+</a>
                            </h1>
                            <h4>
                                <a href="custome-template">Custom Template</a>
                            </h4>
                        </div>
                    </div>
                    <a href="custome-template" class="btn btn-primary btn-sm">Select</a>
                </div>
            </div>
        </div>

    </div>

    <?php include 'alljs.php' ?>
</body>
</html>