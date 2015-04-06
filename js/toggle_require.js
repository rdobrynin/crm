define(['jquery','tooltip_require'], function ($) {
    $('.onoff').bootstrapToggle({
        size:'mini'
    });

    $('.toggle-comment').click(function () {
        idComment = $(this).attr('data-comment');
        if ($('#toggle-comment-' + idComment).is(":checked")) {
            var form_data = {
                id: idComment,
                check: '1'
            };
            $.ajax({
                url: '/ajax/publishComment',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                    $('#adjust-comment-' + idComment).addClass('disabled');
                }
            });
        }
        else {
            form_data = {
                id: idComment,
                check: '0'
            };
            $.ajax({
                url: '/ajax/publishComment',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                    $('#adjust-comment-' + idComment).removeClass('disabled');
                }
            });

        }
    });
});