<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Error404</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php print(base_url());?>assets/css/bootstrap.css" rel="stylesheet">
  <!-- Add custom CSS here -->
  <link href="<?php print(base_url());?>css/error.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="container">
  <div class="page-404">
    <img src="<?php print(base_url());?>img/page-404.png" alt="">
    <h3>We're sorry, but the page you were looking for doesn't exist.</h3>
    <p>You can start from the <a href="javascript:history.go(-1)">Previous Page</a></p>
  </div>
</div>
<div class="container">
  <div class="row">
    <h1 class="text-center"><a href="#error_modal" role="button" class="btn btn-primary btn-lg" data-toggle="modal">Contact Us</a></h1>
  </div>
</div>
<div class="modal fade" id="error_modal" tabindex="-1" role="dialog" aria-labelledby="error_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'error_form', 'autocomplete' => 'off'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>We'd Love to Hear From You</h3>
            </div>
            <div class="modal-body" style="padding-bottom: 0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="error_title">Name</label>
                            <input type="text" name="project_title" id="error_title" class="form-control btn-special" placeholder="Your name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="error_message">Message</label>
                            <textarea name="error_message" id="error_message" class="form-control btn-special" rows="3" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="error_email">Email</label>
                            <input type="text" name="error_email" id="error_email" class="form-control btn-special" placeholder="Your email">
                        </div>
                        <div style="display: none; margin-bottom: 10px; padding: 10px; font-size: 12px;" id="error_email_empty_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Email address incorrect</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="error_email">Phone</label>
                            <input type="text" name="error_phone" id="error_phone" class="form-control btn-special" placeholder="Your phone number">
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px; padding: 10px; font-size: 12px;" id="error_success_modal" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Your message has been successfully sent</div>
                <div style="display: none; margin-bottom: 10px; padding: 10px; font-size: 12px;" id="error_empty_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;All fields must be filled</div>
            </div>
            <div class="modal-footer" style="padding-top: 0">
                <button type="button" style="width: 100%;" id="error_send_btn" class="btn btn-success pull-left">Send It!</button>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/error_modal -->

<!-- JavaScript -->
<script src="<?php print(base_url());?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php print(base_url());?>assets/js/bootstrap.min.js"></script>
<script src="<?php print(base_url());?>js/script.js"></script>

<script>
    $("#error_send_btn").click(function () {
        var form_data = {
            name: $('#error_title').val(),
            message: $('#error_message').val(),
            email: $('#error_email').val(),
            phone: $('#error_phone').val()

        };
        $.ajax({
            url: "<?php echo site_url('ajax/error_mail'); ?>",
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if(msg.empty == false) {
                    $('#error_empty_modal').css('display', 'block');
                }
                if(msg.empty == true) {
                    $('#error_empty_modal').css('display', 'none');
                }

                if(msg.check_email == false) {
                    $('#error_email_empty_modal').css('display', 'block');
                }
                else {
                    $('#error_email_empty_modal').css('display', 'none');
                }

                if(msg.send == true) {
                    $('#error_success_modal').css('display', 'block');
                    setTimeout(function() {
                        $("input[type=text], textarea").val("");
                        $('#error_success_modal').css('display', 'none');
                        $('#error_modal').modal('hide');
                    }, 3000);
                }
            }
        });

    });
</script>

</body>

</html>
