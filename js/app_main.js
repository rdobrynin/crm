requirejs.config({
    "paths": {
        "jquery": "/bower_components/jquery/dist/jquery.min",
        "bootstrap": "/bower_components/bootstrap/dist/js/bootstrap.min",
        "bootstrap_select": "/bower_components/bootstrap-select/js/bootstrap-select",
        "bootstrap_datetimepicker": "/assets/js/jquery.datetimepicker",
        "bootstrap_scrollbar": "/assets/js/jquery.mCustomScrollbar",
        "domReady": "/bower_components/domReady/domReady",
        "bootstrap_toggle": "/assets/js/bootstrap-toggle",
        "bootstrap_tooltip": "/assets/js/bootstrap-tooltip",
        "bootstrap_confirmation": "/assets/js/bootstrap-confirmation",
        "bootstrap_autocomplete": "/assets/js/jquery.autocomplete",
        "bootstrap_switch": "/assets/js/bootstrap-switch.min",
        "bootstrap_wizard": "/assets/js/jquery.bootstrap.wizard.min",
        "bootstrap_validate": "/assets/js/jquery.validate.min",
        "ajax_file_upload": "/assets/js/ajaxfileupload"

    },
    shim: {
        bootstrap: {
            deps:['jquery'],
            exports:"bootstrap"
        },
        domReady: {
            deps:['jquery'],
            exports:"domReady"
        },
        bootstrap_select: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_datetimepicker: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_scrollbar: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_confirmation: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_toggle: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_tooltip: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_autocomplete: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_switch: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_wizard: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        bootstrap_validate: {
            deps:['bootstrap'],
            exports:"bootstrap"
        },
        ajax_file_upload: {
            deps:['jquery'],
            exports:"ajax_file_upload"
        }

    }
});


require(['jquery','domReady'], function ($) {
    $(function () {
        console.log('test');
    });
});


require(['jquery','domReady','sidebar'], function ($,sidebar) {
    return sidebar;
});

require(['jquery','domReady','bootstrap','bootstrap_select','bootstrap_datetimepicker','modal'], function ($,modal) {
    return modal;
});

require(['jquery','domReady','bootstrap','functions'], function ($,functions) {
    return functions;
});

require(['jquery','domReady','bootstrap_scrollbar','onload'], function ($,onload) {
    return onload;
});