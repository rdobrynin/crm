define(function(){

    $("#switch-left-bar").click(function () {
        var form_data = {
            status: '1'
        };
        $.ajax({
            url: '/ajax/updateSidebarLeft',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                var posVar = 50;
                $("#sidebar-wrapper").animate({width: posVar + 'px'});
                $("#wrapper").animate({paddingLeft: posVar + 'px'});
                $("#switch-left-bar").css('display', 'none');
                $('.badge-resp').addClass('badge-resp-mini');
                $('#switch-left-bar-back').fadeIn('slow');
                $('.badge-mini').fadeIn('slow');
            }
        });
    });

    /**
     *
     * Sidebar left ON/OFF
     */

    $("#switch-left-bar-back").click(function () {
        var form_data = {
            status: '0'
        };
        $.ajax({
            url: '/ajax/updateSidebarLeft',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                var posVar = 198;
                $("#sidebar-wrapper").animate({width: posVar + 'px'});
                $("#wrapper").animate({paddingLeft: posVar + 'px'});
                $("#switch-left-bar-back").css('display', 'none');
                $('.badge-resp').removeClass('badge-resp-mini');
                $('.badge-mini').css('display', 'none');
                $('#switch-left-bar').fadeIn('slow');
            }
        });
    });

    /**
     *
     * Sidebar right ON/OFF
     */

    $("#float-users").click(function () {
        var form_data = {
            status: '1'

        };
        $.ajax({
            url: '/ajax/updateSidebarRight',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                var posVar = 0;
                $(".right-float-sidebar").animate({right: posVar + 'px'});

            }
        });
    });

    /**
     *
     * Sidebar right ON/OFF
     */

    $(".close-right-sidebar").click(function () {
        var form_data = {
            status: '0'
        };
        $.ajax({
            url: '/ajax/updateSidebarRight',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                var posVar = -300;
                $(".right-float-sidebar").animate({right: posVar + 'px'});
                $("#float-users").removeClass('active');
            }
        });
    });


});