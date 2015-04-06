define(['jquery'], function ($) {

    $(function () {
        $(".toggle-div-help").click(function (event) {
            var check = false;
            if ($('#toggle-help-btn').is(":checked")) {
                check = 0;
            }
            else {
                check = 1;
            }
            var form_data = {
                help_block: check,
                user_id: $('#user_id_help').val()
            };
            $.ajax({
                url: '/ajax/switchHelp',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                }
            });
        });

        $(".help-button").click((function () {
            var i = 0;
            return function () {
                $('.help-block').animate({
                    height: (++i % 2) ? 490 : 10,
                    background: 'rgb(255, 144, 11)', opacity: 0.9
                }, 200);
                $('.help-content').slideToggle('fast');
            }
        })());
    });
});

