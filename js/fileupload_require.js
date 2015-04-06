define(['jquery'], function ($) {
    /**
     *  Upload avatar
     **/

    $('#upload_file').submit(function () {
        $.ajaxFileUpload({
            url: "/ajax/do_upload",
            secureuri: false,
            fileElementId: 'userfile',
            dataType: 'json',
            data: {
                'user_id': $('#user_id').val()
            },
            success: function (data, status) {
                if (data.status != 'error') {
                    $('#avatar-true').hide();
                    $('#avatar-true-ajax').show();
                    $('.avatar-img').hide();
                    $('.avatar-img-ajax').show();
                    $('.avatar-img-ajax').html("<a href='" + window.location.protocol + "profile'><img src='" + window.location.protocol + "/uploads/avatar/" + data.new_avatar + "' alt='avatar' height='45'></a>");
                    $('#ajax-temp').html("<img src='" + window.location.protocol + "/uploads/avatar/" + data.new_avatar + "' alt='Smiley face' height='100'>");
                }

                $('#files').show();
                $('#files').empty();
                $('#files').html('<p class="lead">' + data.msg + '</p>');
                $('#files').delay(1500).fadeOut();
            }
        });
        return false;
    });

});

