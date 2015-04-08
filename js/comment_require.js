define(['jquery'], function ($) {

$(function () {
    $('.qm-send-comment').on( "click", function() {
        $data =  $(this).attr('data-uid');
        $('.qm-body').hide();
        $('.qm-body').show();
        $('#li-comments').removeClass('active');
        $('#qm-autocomplete').hide();
        $('.point-name-tag').hide();
        $('#qm-point-name').show();
        var form_data = {
            id: $data
        };
        $.ajax({
            url: '/ajax/getUserbyId',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                $first_name = msg.user[0]['first_name'];
                $last_name = msg.user[0]['last_name'];
                $currentID = msg.user[0]['id'];
                $email = msg.user[0]['email'];
                $avatar = msg.user[0]['avatar'];
                $('#qm-autocomplete').hide();
                $('#qm-point-name').html($first_name + ' ' + $last_name);
                $('#user_qm_id').val($currentID);
            }
        });

        /**
         * Send quick comment
         */

        $('#qm-send-btn').click(function () {
            $to = $('#user_qm_id').val();
            $subject = $('#qm-subject-field').val();
            $text = $('#qm-text').val();
            $search = false;

            var form_data_ = {
                subject: $subject,
                text: $text,
                to: $to,
                search: $search,
                fullname: $first_name + ' ' + $last_name
            };
            $.ajax({
                url: '/ajax/sendComment',
                type: 'POST',
                data: form_data_,
                dataType: 'json',
                success: function (msg) {
                    if (msg.empty == true) {
                        $('#qm-empty-error').fadeIn('slow').css('display', 'block');
                        setTimeout(function () {
                            $('#qm-empty-error').fadeOut('slow').css('display', 'none');
                        }, 3000);
                    }
                    else {
                        $('#qm-result-info').fadeIn('slow').css('display', 'block');
                        setTimeout(function () {
                            $('#qm-result-info').fadeOut('slow').css('display', 'none');
                            $('.qm-body').css('display', 'none');
                        }, 2000);
                        $("#qm-text, #qm-subject-field").val("");
                    }
                }
            });
        });
    });


    $('.send-comment').on( "click", function() {
        $data =  $(this).attr('data-uid');

        $('.qm-body').hide();
        $('.qm-body').show();
        $('#qm-point-name').hide();
        $('#qm-autocomplete').show();
        var form_data = {
            id: $data
        };
        $.ajax({
            url: '/ajax/getUserbyId',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                $first_name = msg.user[0]['first_name'];
                $last_name = msg.user[0]['last_name'];
                $currentID = msg.user[0]['id'];
                $email = msg.user[0]['email'];
                $avatar = msg.user[0]['avatar'];

                $('.point-name-tag').css('display', 'none');
                $('#user_qm_id').val($currentID);
            }
        });

        /**
         * Send quick comment
         */

        $('#qm-send-btn').click(function () {
            $search = false;
//          if send messagi with autocomplete
            var name = $("#qm-autocomplete").val();
            if (name.length > 0) {
                $search = true;
            }

            $fullname = $('#qm-autocomplete').val();
            $to = $('#user_qm_id').val();
            $subject = $('#qm-subject-field').val();
            $text = $('#qm-text').val();

            var form_data_ = {
                subject: $subject,
                text: $text,
                to: $to,
                fullname: $fullname,
                search: $search
            };
            $.ajax({
                url: '/ajax/sendComment',
                type: 'POST',
                data: form_data_,
                dataType: 'json',
                success: function (msg) {
                    if (msg.empty == true) {
                        $('#qm-empty-error').fadeIn('slow').css('display', 'block');
                        setTimeout(function () {
                            $('#qm-empty-error').fadeOut('slow').css('display', 'none');
                        }, 3000);
                    }
                    else {
                        $('#li-comments').removeClass('active');
                        $('#qm-result-info').fadeIn('slow').css('display', 'block');
                        setTimeout(function () {
                            $('#qm-result-info').fadeOut('slow').css('display', 'none');
                            $('.qm-body').css('display', 'none');
                        }, 2000);
                        $("#qm-text, #qm-subject-field").val("");
                    }
                }
            });
        });
    });

    $('.send-comment-subject').on( "click", function() {
        $data =  $(this).attr('data-uid');
        $title =  $(this).attr('data-title');
        $('.qm-body').hide();
        $('.qm-body').show();
        $('#li-comments').removeClass('active');
        $('#qm-autocomplete').hide();
        $('.point-name-tag').hide();
        $('#qm-point-name').show();
        $('#qm-subject-field').val($title);

        var form_data = {
            id: $data
        };
        $.ajax({
            url: '/ajax/getUserbyId',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                $first_name = msg.user[0]['first_name'];
                $last_name = msg.user[0]['last_name'];
                $currentID = msg.user[0]['id'];
                $email = msg.user[0]['email'];
                $avatar = msg.user[0]['avatar'];
                $('#qm-autocomplete').hide();
                $('#qm-point-name').html($first_name + ' ' + $last_name);
                $('#user_qm_id').val($currentID);
            }
        });

        /**
         * Send quick comment
         */

        $('#qm-send-btn').click(function () {
            $to = $('#user_qm_id').val();
            $subject = $title;
            $text = $('#qm-text').val();
            $search = false;

            var form_data_ = {
                subject: $subject,
                text: $text,
                to: $to,
                search: $search,
                fullname: $first_name + ' ' + $last_name
            };
            $.ajax({
                url: '/ajax/sendComment',
                type: 'POST',
                data: form_data_,
                dataType: 'json',
                success: function (msg) {
                    if (msg.empty == true) {
                        $('#qm-empty-error').fadeIn('slow').css('display', 'block');
                        setTimeout(function () {
                            $('#qm-empty-error').fadeOut('slow').css('display', 'none');
                        }, 3000);
                    }
                    else {
                        $('#qm-result-info').fadeIn('slow').css('display', 'block');
                        setTimeout(function () {
                            $('#qm-result-info').fadeOut('slow').css('display', 'none');
                            $('.qm-body').css('display', 'none');
                        }, 2000);
                        $("#qm-text, #qm-subject-field").val("");
                    }
                }
            });
        });

    });

    $('.close-qm').click(function () {
        $('.qm-body').css('display', 'none');
        $('#li-comments').removeClass('active');
    });

    $('#qm-clear-form-btn').click(function () {
        $("#qm-text, #qm-subject-field").val("");
    });

    $('.sms-send-alert').click(function () {
        $('#demo_modal').modal('show');
    });



    $('#qm-close-point-name').click(function () {
        $('#qm-autocomplete').show();
        $('.point-name-tag').hide();
    });



});
});