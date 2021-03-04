<?php
   include 'check-login.php';
   if (isset($_GET['fromtemp'])) {
      $fromId = $_GET['fromtemp'];
      if ($_GET['fromtemp'] == 1) {
         if (!isset($_SESSION['mail_title']) && !isset($_SESSION['mail_msg'])) {
            header('location: template1');
         }
      } else if ($_GET['fromtemp'] == 3) {
         if (!isset($_SESSION['cmsgs']) && !isset($_SESSION['csub']) && !isset($_SESSION['cname'])) {
            header('location: custome-template');
         } 
      }
   } else {
      header('location: ../');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Select Mailing List</title>
   <?php include 'allcss.php'; ?>
</head>
<body>
    <?php  include 'navbar.php'; ?>
        <?php
            include '../connect.php';
            $em = $_SESSION['login-email'];
            $uidq = "SELECT * FROM `login_details` where email='$em'";
            $uid = mysqli_fetch_object(mysqli_query($con, $uidq));
            $q = "SELECT * FROM `mailing_list` where uid=$uid->id";
            $res = mysqli_query($con, $q);
        ?>
        <div class="container p-4">
            
            <div class="text-center mt-4 pt-2">
                <h3><strong> Select Your Mailing List </strong></h3>
            </div>

            <?php
             
               if (mysqli_num_rows($res) > 0) {
                  ?>
                  <div class="table-responsive text-nowrap">
                     <table class="table table-bordered">
                     <thead class="teal white-text">
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Sheet Name</th>
                           <th scope="col">Select</th>
                           <th scope="col">View</th>
                        </tr>
                     </thead>
                     <tbody>
                  <?php
                  $x = 1;
                  while($row = mysqli_fetch_array($res)) {
                     ?>
                        <tr>
                           <th scope="row"><?php echo $x; $x++; ?></th>
                           <td><?php echo $row['sheet_name']; ?></td>
                           <td><button class="btn btn-secondary btn-sm allselect" 
                           data-selid="<?php echo $row['mid']; ?>"
                           id="select<?php echo $row['mid']; ?>"
                           >Select</button></td>
                           <td><a 
                           href="viewMailList?listid=<?php echo $row['mid']; ?>"
                           class="btn btn-info btn-sm"
                           target="_blank"
                           >View &#x2197;</a></td>
                           
                        </tr>                     
                     <?php
                  }
                  ?>
                     </tbody>
                     </table>
                     </div>
                  <?php
               } else {
                    ?>
                    <div class="mt-4 text-center">
                        <h5><strong>You do not have any Mailing List</strong></h5>
                    </div>
                    <?php
                }
             
            ?>
            <div class="row">
               <div class="col-12 col-lg-12 col-md12 mt-4">
                  <h5><strong>Add New EXCEL/CSV File -</strong></h5>
               </div>
               <div class="col-lg-6 col-12 col-md-6 mt-2">
                  <div class="md-form md-outline">
                     <input type="text" id="sheet-name" class="form-control">
                     <label>Enter Sheet Name</label>
                     <small class="text-danger" id="err1"></small>
                  </div>
               </div>
               <div class="col-lg-3 col-12 col-md-3">
                  <div style="overflow:hidden;">
                     <label>Select Sheet</label>
                     <input type="file" class="form-control" name="uploadSheet" id="uploadSheet" 
                     accept='.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"*' />
                  </div>
                  <small class="text-danger" id="err2"></small>
               </div>
               <div class="col-lg-3 col-12 col-md-3 mt-4 pt-1">
                  <button class="btn btn-outline-success btn-sm" id="submit-new-sheet">Submit</button>
               </div>
            </div>
                
            <div class="row">
               <div class="col-12">
                  <h5><strong>Enter Email and Password From this email Will Sent</strong></h5>
               </div>
               <div class="col-lg-4 col-md-4 col-12">
                  <div class="md-form md-outline">
                     <input type="email" id="sender-mail" class="form-control">
                     <label>Email</label>
                     <small class="text-danger" id="err3"></small>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-12">
                  <div class="md-form md-outline">
                     <input type="text" id="sender-name" class="form-control">
                     <label>Name</label>
                     <small class="text-danger" id="err5"></small>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-12">
                  <div class="md-form md-outline">
                     <input type="password" id="sender-password" class="form-control">
                     <label>Password</label>
                     <small class="text-danger" id="err4"></small>
                  </div>
               </div>
            </div>
            <div id="all-alert">
            </div>
            <div class="text-center">
               <button class="btn btn-warning" id="send-mail-btn">Send Mail 
               </button>
               <span id="show-loading"></span>
            </div>
        </div>

   <?php include 'alljs.php'; ?>
   <script>
   $(document).ready(function () {
     
      $('#submit-new-sheet').click(function (e) { 
         e.preventDefault();
         if ($('#sheet-name').val() === '') {
            $('#err1').text('Please Enter Sheet Name');
            return;
         }
         $('#err1').text('');

         if (document.getElementById('uploadSheet').files[0] === undefined) {
            $('#err2').text('Please Select Excel or CSV file');
            return;
         }
         $('#err2').text('');

         var name = document.getElementById("uploadSheet").files[0].name;
         var fd = new FormData();
         var ext = name.split('.').pop().toLowerCase();

         if(jQuery.inArray(ext, ['xls', 'csv', 'xlsx']) == -1) 
         {
            $('#uploadSheet').val('');
            alert("You Must Have to upload (Excel Or CSV)");
            return;
         }

         fd.append("new_sheet_upload", document.getElementById('uploadSheet').files[0]);
         fd.append("sheet_name", document.getElementById('sheet-name').value);
         $.ajax({
            type: "POST",
            url: "../ajax/uploadSheet",
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
               if (data === 'sUcC') {
                  location.reload();
               }
            }
         });
      });
      var mailListId = null;
      $(document).on('click', '.allselect' , function() {
         const ele = document.querySelectorAll(".allselect");
         for (let index = 0; index < ele.length; index++) {
            if ($(this).attr('id') === ele[index].id) {
               $(this).removeClass('btn-secondary');
               $(this).addClass('btn-outline-secondary');
               $(this).text('SELECTED');
               mailListId = $(this).data('selid');
            } else {
               $("#" + ele[index].id).removeClass('btn-outline-secondary');
               $("#" + ele[index].id).addClass('btn-secondary');
               $("#" + ele[index].id).text('SELECT');
            }
         }
      });
      var spineer = '';
      spineer += '<div class="spinner-border text-dark" role="status">';
      spineer += '<span class="sr-only"></span>';
      spineer += '</div>';

      var errAlert = '';
      errAlert += '<div id="a1" class="alert alert-danger alert-dismissible fade show" role="alert">';
      errAlert += '<h4 class="alert-heading">Something Went Wrong</h4>';
      errAlert += '<hr>';
      errAlert += '<p>Could Not Autenticate</p>';
      errAlert += '<p>Your Email or Password is wrong</p>';
      errAlert += '<p>Please <strong>Allow Less Secure apps</strong> in Your Gmail Account</p>';
      errAlert += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
      errAlert += '<span aria-hidden="true">&times;</span>';
      errAlert += '</button>';
      errAlert += '</div>';
      var successAlert = '';
      successAlert += '<div id="a2" class="alert alert-success alert-dismissible fade show" role="alert">';
      successAlert += '<h4 class="alert-heading"><strong>Emails Sent Successfully</strong></h4>';
      successAlert += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
      successAlert += '<span aria-hidden="true">&times;</span>';
      successAlert += '</button>';
      successAlert += '</div>';
      $('#send-mail-btn').click(function (e) { 
         e.preventDefault();
         if ($('#sender-mail').val() === '') {
            $('#err3').text('Please Enter Email');
            return;
         }
         $('#err3').text('');
         const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         if (!re.test(String($('#sender-mail').val()).toLowerCase())) {
            $('#err3').text('Invalid Email');
            return;
         }
         $('#err3').text('');
         if ($('#sender-name').val() === '') {
            $('#err5').text('Please Enter Name');
            return;
         }
         $('#err5').text('');
         if ($('#sender-password').val() === '') {
            $('#err4').text('Please Enter Password');
            return;
         }
         $('#err4').text('');
         if (mailListId !== null) {

            const fromId = '<?php echo $fromId; ?>';
            $.ajax({
               type: "POST",
               url: fromId == 1 ? "../ajax/sendMail1" : (fromId == 2 ? "../ajax/sendMail2" : "../ajax/sendMail3"),
               data: { email: $('#sender-mail').val(), pass: $('#sender-password').val(), listid: mailListId, name: $('#sender-name').val() },
               beforeSend: function () {
                  $('#send-mail-btn').attr('disabled', true);
                  $('#show-loading').html(spineer);
                  $('#send-mail-btn').text('Sending......');
               },
               success: function (res) {
                  $('#show-loading').empty();
                  if (res == 200) {
                     $('#all-alert').html(successAlert);
                     $('#send-mail-btn').text('Mail Sent');
                     $('#sender-mail').val('');
                     $('#sender-password').val('');
                     $('#sender-name').val('');
                     setInterval(() => {
                        location.href = 'index';
                     }, 5000);
                  }
                  if (res == 404) {
                     console.log('222');
                     $('#all-alert').html(errAlert);
                     setInterval(() => {
                        $('#a1').alert('')
                     }, 20000);
                  } 
                  /* setInterval(() => {
                     $('#send-mail-btn').text('Send Mail');
                     $('#send-mail-btn').attr('disabled', false);
                  }, 3000); */
               }
            });
         } else {
            alert('Please Select Mail List');
         }
      });

   });
   </script>
</body>
</html>