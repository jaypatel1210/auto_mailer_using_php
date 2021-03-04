<?php
    include 'check-login.php';
    $isActive = 'profile';

    include '../connect.php';
    $em = $_SESSION['login-email'];
    $uidq = "SELECT * FROM `login_details` where email='$em'";
    $uid = mysqli_fetch_object(mysqli_query($con, $uidq));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Section</title>
    <?php include 'allcss.php'; ?>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4 pt-3" id="mentorAllDetails">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        Profile Details
                        <div class="custom-control custom-switch float-right">
                            <input type="checkbox" class="custom-control-input" id="profileEditBtn">
                            <label class="custom-control-label" for="profileEditBtn">Edit</label>
                        </div>
                    </div>
                    <form id="zoomUpdateForm">
                        <div class="col-10 offset-1">
                            <div class="md-form md-outline" style="margin-bottom: 0.5rem;">
                                <input type="text" id="email" class="form-control" value="<?php echo $uid->email ;?>" disabled="true">
                                <label for="email">Email</label>
                            </div>
                            <small class="text-danger" id="uerr1"></small>
                            <div class="md-form md-outline" style="margin-bottom: 0.5rem;">
                                <input type="email" id="name" class="form-control" value="<?php echo $uid->name ;?>" disabled="true">
                                <label for="name">Name</label>
                            </div>
                            <small class="text-danger" id="uerr2"></small>
                            <div id="addUpdateBtn"></div>
                            <div id="umsg"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

    <?php include 'alljs.php'; ?>

    <script>
        $(document).ready(function () {
            
            $('#profileEditBtn').change(function (e) { 
                e.preventDefault();
                if($('#profileEditBtn').is(":checked")){
                    $('#changeProfilePic').removeAttr('disabled');                    
                    $('#name').removeAttr('disabled');
                    $('#email').removeAttr('disabled');
                    // $('#uwork').removeAttr('disabled');
                    // $('#usubject').removeAttr('disabled');
                    $('#addUpdateBtn').html('<button class="btn btn-info btn-sm btn-block mb-4 mt-4" id="updateProfileDetails" style="margin: auto;font-size: 14px;">Update Details</button>');
                } else {
                    $('#addUpdateBtn').html('');
                    // $('#changeProfilePic').attr('disabled','disabled');                    
                    $('#name').attr('disabled','disabled');
                    $('#email').attr('disabled','disabled');  
                    // $('#uwork').attr('disabled','disabled'); 
                    // $('#usubject').attr('disabled','disabled'); 
                }
            });

            $(document).on('click', '#updateProfileDetails', function(e){
                e.preventDefault();
                const uz2 = document.getElementById('name').value;
                const uz1 = document.getElementById('email').value;

                if(uz1 == '') {
                    $('#uerr1').text('Please Enter Email');
                    return;
                } else {
                    $('#uerr1').text('');
                } 
                if(uz2 == '') {
                    $('#uerr2').text('Please Enter Name');
                    return;
                } else {
                    $('#uerr2').text('');
                } 

                if(uz1 != '' && uz2 != ''){
                    $.ajax({
                        type: "post",
                        url: "../ajax/updateprofile",
                        data: {up1:uz1, up2:uz2},
                        success: function (response) {
                            if(response == 200) {
                                $('#profileEditBtn').prop('checked', false);
                                $('#addUpdateBtn').html('');
                                $('#name').attr('disabled','disabled');                    
                                $('#email').attr('disabled','disabled');
                                $('#umsg').html('<div class="alert alert-success" role="alert">Profile Details Updated</div>')
                    
                                setInterval(() => {
                                    $('#umsg').html('');
                                }, 3000);
                            } else {
                                $('#umsg').html('<div class="alert alert-danger" role="alert">Something Went wrong</div>')
                            }
                        }
                    });
                } else {
                    $('#umsg').html('<div class="alert alert-danger" role="alert">Something Went wrong</div>')
                }
            });
        });
    </script>
</body>
</html>