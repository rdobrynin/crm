define(['jquery'], function ($) {
    $(function () {

        $('.onoff').bootstrapToggle({
            size:'mini'
        });

        $(function () {

            $('#admin-users-tab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });

        });
    });
});