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


//require(['jquery','domReady','bootstrap_confirmation','users_require'], function ($,users) {
//    return users;
//});



require(['jquery','bootstrap_toggle','bootstrap_tooltip','bootstrap_confirmation'], function ($) {
    $('.onoff').bootstrapToggle({
        size:'mini'
    });

    $(function () {
        $('.show-demo').click(function () {
            $('#demo_modal').modal('show');
            return false;
        });

        $('#admin-users-tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

    });

    $(function () {
        $('.update-user').click(function () {
            var $data,$role;
            $data = $(this).attr('data-uid');
            $('#update-user-modal').modal('show');
            $('#update-user-send-btn').click(function () {
                $role = $('#update-role-user-select').val();
                var form_data_ = {
                    id: $data,
                    role: $role
                };
                $.ajax({
                    url: '/ajax/updateUser',
                    type: 'POST',
                    data: form_data_,
                    dataType: 'json',
                    success: function (msg) {
                        if (msg['user'] == true) {
                            $('#update-user-notificate').fadeIn('slow').show();
                            setTimeout(function () {
                                $('#update-user-modal').modal('hide');
                                $('#update-user-notificate').hide();
                            }, 2000);
                        }
                    }
                });
            });
        });


        $('[data-toggle=confirmation-activate-user]').confirmation(
            {
                placement: 'left',
                animation: false,
                btnOkClass:'btn-xs',
                btnCancelClass:'btn-xs',
                btnCancelLabel:'<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel:'<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
                onConfirm: function () {
                    var currentUser = $(this).attr('target');
                    var form_data = {
                        user: currentUser
                    };
                    $.ajax({
                        url: '/ajax/activateUser',
                        type: 'POST',
                        data: form_data,
                        dataType: 'json',
                        success: function (msg) {
                            $('#tr_new_user_'+currentUser).remove();

                            $('[data-toggle=confirmation-activate-user]').confirmation('hide');
                            var rowCount = $('#tbody-new-users tr').length;
                            if(rowCount <1) {
                                $('#new-users').remove();
                                $('#table-new-users').hide();
                                $('#info-new-users').html('<div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of new users found</div>')
                                $('#calc-new-users').css('display','none');
                            }
                            $('#calc-new-users').html(rowCount);
                        }
                    });
                },
                onCancel: function () {
                    $('[data-toggle=confirmation-activate-user]').confirmation('hide');
                }
            }
        );

        $('[data-toggle=confirmation-delete-new-user]').confirmation(
            {
                placement: 'left',
                animation: false,
                btnOkClass:'btn-xs',
                btnCancelClass:'btn-xs',
                btnCancelLabel:'<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel:'<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
                onConfirm: function () {
                    var currentUser = $(this).attr('target');
                    var form_data = {
                        user: currentUser
                    };
                    $.ajax({
                        url: '/ajax/deleteNewUser',
                        type: 'POST',
                        data: form_data,
                        dataType: 'json',
                        success: function (msg) {
                            $('#tr_new_user_'+currentUser).remove();

                            $('[data-toggle=confirmation-delete-new-user]').confirmation('hide');
                            var rowCount = $('#tbody-new-users tr').length;
                            if(rowCount <1) {
                                $('#new-users').remove();
                                $('#table-new-users').hide();
                                $('#info-new-users').html('<div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of new users found</div>')
                                $('#calc-new-users').css('display','none');
                            }
                            $('#calc-new-users').html(rowCount);
                        }
                    });
                },
                onCancel: function () {
                    $('[data-toggle=confirmation-delete-new-user]').confirmation('hide');
                }
            }
        );


        $('[data-toggle=confirmation-delete-current-user]').confirmation( {
                placement: 'left',
                animation: false,
                btnOkClass:'btn-xs',
                btnCancelClass:'btn-xs',
                btnCancelLabel:'<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel:'<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
                onConfirm: function () {
                    var currentUser = $(this).attr('target');
                    var form_data = {
                        user: currentUser
                    };
                    $.ajax({
                        url: '/ajax/deleteCurrentUser',
                        type: 'POST',
                        data: form_data,
                        dataType: 'json',
                        success: function (msg) {
                            $('#tr_current_user_'+currentUser).remove();
                            $('[data-toggle=confirmation-delete-current-user]').confirmation('hide');
                            var rowCount = $('#tbody-current-users tr').length;
                            if(rowCount <1) {
                                $('#current-users').remove();
                                $('#table-current-users').hide();
                            }
                        }
                    });
                },
                onCancel: function () {
                    $('[data-toggle=confirmation-delete-current-user]').confirmation('hide');
                }
            }
        );



        /**
         * Froze user
         */

        $('[data-toggle=confirmation-froze-current-user]').confirmation(
            {
                placement: 'left',
                animation: false,
                btnOkClass:'btn-xs',
                btnCancelClass:'btn-xs',
                btnCancelLabel:'<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel:'<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
                onConfirm: function () {
                    var currentUser = $(this).attr('target');
                    var form_data = {
                        user: currentUser
                    };

                    $.ajax({
                        url: '/ajax/frozeCurrentUser',
                        type: 'POST',
                        data: form_data,
                        dataType: 'json',
                        success: function (msg) {
                            $('[data-toggle=confirmation-froze-current-user]').confirmation('hide');
                        }
                    });
                },
                onCancel: function () {
                    $('[data-toggle=confirmation-froze-current-user]').confirmation('hide');
                }
            }
        );

        /**
         * UnFroze user
         */

        $('[data-toggle=confirmation-unfroze-current-user]').confirmation(
            {
                placement: 'left',
                animation: false,
                btnOkClass:'btn-xs',
                btnCancelClass:'btn-xs',
                btnCancelLabel:'<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel:'<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
                onConfirm: function () {
                    var currentUser = $(this).attr('target');
                    var form_data = {
                        user: currentUser
                    };
                    $.ajax({
                        url: '/ajax/unfrozeCurrentUser',
                        type: 'POST',
                        data: form_data,
                        dataType: 'json',
                        success: function (msg) {
                            $('[data-toggle=confirmation-unfroze-current-user]').confirmation('hide');
                        }
                    });
                },
                onCancel: function () {
                    $('[data-toggle=confirmation-unfroze-current-user]').confirmation('hide');
                }
            }
        );


        $('[data-toggle=confirmation-delete-current-task]').confirmation({
            placement: 'left',
            animation: false,
            btnOkClass: 'btn-xs',
            btnCancelClass: 'btn-xs',
            btnCancelLabel: '<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
            btnOkLabel: '<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
            onConfirm: function () {
                var currentTask = $(this).attr('target');
                var form_data = {
                    id: currentTask
                };
                $.ajax({
                    url: '/ajax/deleteTask',
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (msg) {
                        $('#tr-dashboard-task-' + currentTask).remove();
                        $('#tr-project-task-' + currentTask).remove();
                        $('#tr-task-task-' + currentTask).remove();
                        var rowCount = $('#approve_tasks_table tr').length;
                        if (rowCount < 1) {
                            $('#table-new-users').hide();
                            $('#calc-appr-tasks').css('display', 'none');
                        }
                        $('#calc-appr-tasks').html(rowCount);
                        $('[data-toggle=confirmation-delete-current-task]').confirmation('hide');
                    }
                });

                return false;
            },
            onCancel: function () {
                $('[data-toggle=confirmation-delete-current-task]').confirmation('hide');
                return false;
            }
        });


    });

});



require(['jquery','domReady','bootstrap_scrollbar'], function ($) {
    $(function() {
        $(".comment-jsscroll").mCustomScrollbar({
            scrollButtons: {enable: true, scrollType: "stepped"},
            theme: "rounded-dark",
            autoExpandScrollbar: true,
            snapOffset: 65
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
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

require(['jquery','domReady','autocomplete','autocomplete_require'], function ($,autocomplete) {
    return autocomplete;
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

require(['jquery','domReady','bootstrap','bootstrap_tooltip','functions_require'], function ($,functions) {
    return functions;
});

require(['jquery','domReady','bootstrap','bootstrap_confirmation','ajax_require'], function ($,ajax) {
    return ajax;
});

require(['jquery','domReady','bootstrap','task_action_require'], function ($,task_action) {
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

