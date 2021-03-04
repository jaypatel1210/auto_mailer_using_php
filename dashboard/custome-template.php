<?php
   include 'check-login.php';
   $isActive = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Mail Template</title>
    <?php include 'allcss.php' ?>
</head>
<body>
    <?php include 'navbar.php'; ?>

    
    <div class="container mt-4 pt-2">

        <div class="float-right">
            <button class="btn btn-outline-primary" id="next-btn">Next <strong>&#8680;</strong></button>
        </div>

        <div class="text-center">
            <h3>
                <strong>Custom Template Edit</strong>
            </h3>
        </div>

        <form>

            <div class="row">

                <div class="col-12">
                    <div class="md-form md-outline">
                        <input type="text" id="company-name" class="form-control">
                        <label>Enter Company Name</label>
                        <small class="text-danger" id="err1"></small>
                    </div>
                </div>
            
                <div class="col-12">
                    <div class="md-form md-outline">
                        <input type="text" id="mail-subject" class="form-control">
                        <label>Enter Mail Subject</label>
                        <small class="text-danger" id="err2"></small>
                    </div>
                </div>

                <div class="col-12" id="message-inputs">
                    <div>
                        <div class="md-form md-outline">
                            <textarea type="text" id="msg1" 
                            data-id="1"
                            class="md-textarea form-control msgInput" rows="3"
                            ></textarea>
                            <label id="label1">Enter Message 1</label>
                            <small class="text-danger" id="err3"></small>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-4 col-md-4">
                    <button class="btn btn-outline-success btn-sm" id="add">Add New Paragraph</button>
                </div>
                <div class="col-6 col-lg-4 col-md-4">
                    <button class="btn btn-outline-danger btn-sm" id="remove">Remove Paragraph</button>
                </div>

                <br><br>
                <div class="col-12">
                  <div>
                  <label>Upload Attachment</label>
                    <input type="file" class="form-control" name="uploadAttch" id="uploadAttch" />
                  </div>
                </div>

            </div>

        </form>
    </div>
    
    <?php include 'alljs.php'; ?>

    <script>
        $(document).ready(function () {

            var noteInpTrack = 1;

            $('#add').click(function (e) { 
               e.preventDefault();
               noteInpTrack++;
               let ele = '';

                ele += '<div>';
                ele += '<div class="md-form md-outline">';
                ele += '<textarea type="text" id="msg'+ noteInpTrack +'"';
                ele += 'data-id="'+ noteInpTrack +'"';
                ele += 'class="md-textarea form-control msgInput" rows="3"';
                ele += '></textarea>';
                ele += '<label id="label'+ noteInpTrack +'">Enter Message '+ noteInpTrack +'</label>';
                ele += '</div>';
                ele += '</div>';

               $('#message-inputs').append(ele);
            });

            $('#remove').click(function (e) { 
               e.preventDefault();
               if (noteInpTrack > 1) {
                  $('#msg' + noteInpTrack).remove();
                  $('#label' + noteInpTrack).remove();
                  noteInpTrack--;
               }
            });

            $('#next-btn').click(function (e) { 
                e.preventDefault();
                var name = $('#company-name').val();
                var subject = $('#mail-subject').val();
                var msg = $('#msg1').val();
                var msgs = [];
                if (name === '') {
                    $('#err1').text('Enter Company Name');
                    return;
                }
                $('#err1').text('');
                if (subject === '') {
                    $('#err2').text('Enter Mail Subject');
                    return;
                }
                $('#err2').text('');
                if (msg === '') {
                    $('#err3').text('Enter Mail Message');
                    return;
                }
                $('#err3').text('');

                for (let index = 1; index <= noteInpTrack; index++) {
                  msgs.push($('#msg' + index).val());
                }    
                
                $.ajax({
                    type: "POST",
                    url: "../ajax/customMail",
                    data: { cname: name, csubject: subject, msg: msgs },
                    success: function (response) {

                        if (document.getElementById("uploadAttch").files[0] !== undefined) {
                            var name = document.getElementById("uploadAttch").files[0].name;
                            var fd = new FormData();
                            var ext = name.split('.').pop().toLowerCase();

                            fd.append("mail_attachment", document.getElementById('uploadAttch').files[0]);

                            $.ajax({
                            type: "POST",
                            url: "../ajax/uploadAttach",
                            data: fd,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (data) {
                                if (data === 'sUcC') {
                                    location.href = 'sendmail?fromtemp=3';
                                }
                            }
                            });
                        } else {
                            location.href = 'sendmail?fromtemp=3';
                        }
                    }
                });
            });

        });
    </script>

</body>
</html>