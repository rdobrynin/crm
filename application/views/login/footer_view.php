
<!-- JavaScript -->
<script src="<?php print(base_url());?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php print(base_url());?>assets/js/bootstrap.min.js"></script>
<script src="<?php print(base_url());?>assets/js/bootstrap-select.js"></script>
<script src="<?php print(base_url());?>js/script.js"></script>

<!-- Custom JavaScript for the Menu Toggle -->
<script>
    $(function () {
        $("#email").blur(function () {
            var email = $(this).val();
            var postData = {
                "email": email
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('ajax/check_login_avatar') ?>",
                data: postData,
                dataType: 'json',
                success: function (data, status) {
                    if (data.avatar !== null) {
                        $('.error-frame').fadeOut(500);
                        $('#avatar-login').hide();
                        $('#avatar-login-original').show();
                        $("#avatar-login-original").html('<img src="uploads/avatar/'+data.avatar+'" height="100">');
                    }
                    else if (data.avatar == null) {
                        $('#avatar-login').show();
                        $('#avatar-login-original').hide();
                    }
                }
            });
        });

//        Check emails

        $( "#email_signup" ).blur(function() {
            var form_data = {
                email: $(this).val()
            };
            $.ajax({
                url: "<?php echo site_url('ajax/check_emails'); ?>",
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                    if(msg.result!=true) {
                        $('#login_btn').attr('disabled','disabled');
                        $('#check_email').show();
                        $('.label-signin').css('display','block');
                        $("#check_email").empty().append(msg.result);
                    }
                    else {
                        $('#login_btn').removeAttr('disabled');
                        $('#check_email').hide();
                    }
                }
            });
        });

    });
</script>
</body>

</html>
