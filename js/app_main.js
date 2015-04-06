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
        "autocomplete": "/assets/js/jquery.autocomplete",
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
        autocomplete: {
            deps:['jquery'],
            exports:"autocomplete"
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


require(['jquery','domReady','autocomplete','autocomplete_require'], function ($,autocomplete) {
    return autocomplete;
});

require(['jquery','domReady','functions_require'], function ($,functions) {


    $(function () {
        return functions.plz;
    });
    $(function () {
        return functions.count;
    });
    $(function () {
        return functions.startCount;
    });
    $(function () {
        return functions.goTo;
    });
    $(function () {
        return functions.next;
    });
    $(function () {
        return functions.getPriorityTaskClass;
    });
    $(function () {
        return functions.getPriorityTask;
    });
    $(function () {
        return functions.getLabelTask;
    });
    $(function () {
        return functions.previous;
    });
});


require(['jquery','bootstrap_toggle','bootstrap_tooltip','bootstrap_confirmation'], function ($, confirm) {

    return confirm;
});



require(['jquery','domReady','bootstrap_scrollbar'], function ($) {
    $(function () {
        $(".comment-jsscroll").mCustomScrollbar({
            scrollButtons: {enable: true, scrollType: "stepped"},
            theme: "rounded-dark",
            autoExpandScrollbar: true,
            snapOffset: 65
        });
    });
});

require(['jquery','domReady','bootstrap_tooltip'], function ($) {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
});


require(['jquery','domReady','interval_require'], function ($,interval) {
    return interval;
});


require(['jquery','domReady','status_online_require'], function ($,online) {
    return online;
});

require(['jquery','domReady','ajax_file_upload','fileupload_require'], function ($,upload) {
    return upload;
});

require(['jquery','domReady','project_action_require'], function ($,project) {
    return project;
});


require(['jquery','domReady','timer_require'], function ($,timer) {
    return timer;
});

require(['jquery','domReady','help_require'], function ($,help) {
    return help;
});

require(['jquery','domReady','pager_require'], function ($,page) {
    return page;
});

require(['jquery','domReady','profile_require'], function ($,profile) {
    return profile;
});

require(['jquery','domReady','dashboard_require'], function ($,dashboard) {
    return dashboard;
});


require(['jquery','domReady','bootstrap_tooltip','ui_require'], function ($,sidebar) {
    return sidebar;
});

require(['jquery','domReady','bootstrap','bootstrap_select','bootstrap_datetimepicker','modal_require'], function ($,modal) {
    return modal;
});
require(['jquery','domReady','bootstrap','bootstrap_confirmation','ajax_require'], function ($,ajax) {
    return ajax;
});

require(['jquery','domReady','bootstrap','bootstrap_select','bootstrap_datetimepicker','task_action_require'], function ($,task_action) {
    return task_action;
});

require(['jquery','domReady', 'bootstrap_toggle','comment_require'], function ($,comment) {
    return comment;
});

require(['jquery','domReady','demo_modal_require'], function ($,demo) {
    return demo;
});

require(['jquery','domReady','search_require'], function ($,search) {
    return search;
});

require(['jquery','domReady','localstorage_require'], function ($,localstorage) {
    return localstorage;
});

require(['jquery','domReady','table_require'], function ($,table) {
    return table;
});

require(['jquery','domReady','client_require'], function ($,client) {
    return client;
});


require(['jquery','domReady','filter_require'], function ($,filter) {
    return filter;
});

