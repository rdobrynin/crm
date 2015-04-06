
define(['jquery'], function ($) {
$(function () {
    $("body").on("click", ".delete-add-phone", function (e) {
        $(this).parent("span").remove();
    });
    $("body").on("click", ".delete-add-email", function (e) {
        $(this).parent("span").remove();
    });
    if (window.location.hash == "#updated") {
        $('.show-info').show();
        $('.show-info').delay(2500).fadeOut();
    }
//        Add phone
    $("#add_phone").click(function (e) {
        $("#items_phone").append('<div class="col-md-12"><div class="form-group"><div class="col-md-3"><input type="text" placeholder="Additional phone number" style="margin-bottom:8px; margin-top: 2px;" class="form-control col-md-10" name="add_phone[]"></div><button  class="btn btn-danger btn-xs delete-phone">Delete</button></div></div></div><div>');
    });
    $("body").on("click", ".delete-phone", function (e) {
        $(this).parent("div").remove();
    });
//        Delete phone
    $('.delete-add-phone').click(function () {
        phone_for_delete = $.trim($(this).children().text());
        $(".delete_phone_data").append('<span><input type="hidden" name="del_phone[]" value="'+phone_for_delete+'"></span>');
    });
//        Add email
    $("#add_email").click(function (e) {
        $("#items_email").append('<div class="col-md-12"><div class="form-group"><div class="col-md-3"><input type="email" placeholder="Additional email address" style="margin-bottom:8px; margin-top: 2px;" class="form-control col-md-10"  id="input-add-email" name="add_email[]"></div><button  class="btn btn-danger btn-xs delete-email">Delete</button></div></div></div><div>');
        $("#input-add-email").blur(function () {
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
                        $('#profile-update-btn').attr('disabled','disabled');
                        $('#check_email_profile').show();
                        $('.label-signin').css('display','block');
                        $("#check_email_profile").empty().append(msg.result);
                    }
                    else {
                        $('#profile-update-btn').removeAttr('disabled');
                        $('#check_email_profile').hide();
                    }
                }
            });

        });
    });
//        Delete email
    $('.delete-add-email').click(function () {
        email_for_delete =$(this).children().text();
        $(".delete_email_data").append('<span><input type="hidden" name="del_email[]" value="'+email_for_delete+'"></span>');
    });

    res = $('.errors').text();
    if (res.length > 0) {
        $('.errors').show();
    }
    else {
        $('.errors').hide();
    }
    $('.errors').click(function () {
        $(this).slideToggle("fast");
    });
    $('body').click(function () {
        $('.errors').slideUp("fast");
    });
});
});