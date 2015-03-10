define(function(){
    $(function () {

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
            $('.right-float-sidebar').addClass('open');

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

        /**
         *
         * Sidebar left ON/OFF
         */

        $(".close-right-sidebar").click(function () {
            var posVar = -300;
            $(".right-float-sidebar").animate({right: posVar + 'px'});
        });

        $('.closebox').click(function(e){
            $(this).parent().fadeOut( "slow", function() {
                // Animation complete.
            });
        });

//        $('#back-to-top').tooltip('show');

        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();

        $('.activity-item-comment-link').click(function () {
            $(".activity-item-comment-form").show();
        });

        $('.close-activity-form').click(function () {
            $(".activity-item-comment-form").hide();
        });


        $('#fullscreen').on('click', function(event) {
            event.preventDefault();
            window.parent.location =  $('#fullscreen').attr('href');
        });
//        $('#fullscreen').tooltip();
        /* END DEMO OF JS */

        $('.navbar-toggler').on('click', function(event) {
            event.preventDefault();
            $(this).closest('.navbar-minimal').toggleClass('open');
        });

        $("li a").click(function(e) {
            $('li').removeClass('active');
            $(this).parent().addClass('active');
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
//        // scroll body to 0px on click
//        $('#back-to-top').click(function () {
//            $('#back-to-top').tooltip('hide');
//            $('body,html').animate({
//                scrollTop: 0
//            }, 800);
//            return false;
//        });






    });


});