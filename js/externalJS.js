
// Appear Avatar on blur effect
define(function(){
  function appearAvatar() {
      $("#email").blur(function () {
          var email = $(this).val();
          var postData = {
              "email": email
          };
          $.ajax({
              type: "POST",
              url: '/ajax/check_login_avatar',
              data: postData,
              dataType: 'json',
              beforeSend: function () {
                  $('#avatar-login').hide();
                  $('#avatar-login-original').show();
                  $("#avatar-login-original").html('<img style="top: 18px;position: relative;" src="img/loading_small.gif" height="64">');
              },
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
  }

    // Check email for sign up
    function checkEmail() {
        $( "#email_signup" ).blur(function() {
            var form_data = {
                email: $(this).val()
            };
            $.ajax({
                url: '/ajax/check_emails',
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
    }

    return {
        appearAvatar: appearAvatar,
        checkEmail: checkEmail
    }

});


