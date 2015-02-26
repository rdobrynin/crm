
requirejs.config({
    "paths": {
        "jquery": "/assets/js/jquery-1.11.1.min",
        "bootstrap": "/assets/js/bootstrap.min",
        "bootstrap_select": "/assets/js/bootstrap-select"
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