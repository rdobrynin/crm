
requirejs.config({
    "paths": {
        "jquery": "/bower_components/jquery/dist/jquery.min",
        "bootstrap": "/bower_components/bootstrap/dist/js/bootstrap.min",
        "bootstrap_select": "/bower_components/bootstrap-select/js/bootstrap-select"
    },
    shim: {
        bootstrap: {
            deps:['jquery'],
            exports:"bootstrap"
        },
        bootstrap_select: {
            deps:['bootstrap'],
            exports:"bootstrap"
        }

    }
});



require(['jquery','external'], function ($, external) {
    $(function () {
        return external.appearAvatar();
    });
    var pathArray = window.location.pathname.split('/');
    if (pathArray[1] == 'signup') {
        $(function () {
            return external.checkEmail();
        });
    }
});

//Bootstrap select

require(['jquery', 'bootstrap_select'], function ($) {
            $('.selectpicker').selectpicker();
});