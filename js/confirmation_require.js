define(['jquery'], function ($) {
    $(function () {
        $('[data-toggle=confirmation-activate-user]').confirmation(
            {
                placement: 'left',
                animation: false,
                btnOkClass: 'btn-xs',
                btnCancelClass: 'btn-xs',
                btnCancelLabel: '<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel: '<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
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
                            $('#tr_new_user_' + currentUser).remove();

                            $('[data-toggle=confirmation-activate-user]').confirmation('hide');
                            var rowCount = $('#tbody-new-users tr').length;
                            if (rowCount < 1) {
                                $('#new-users').remove();
                                $('#table-new-users').hide();
                                $('#info-new-users').html('<div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of new users found</div>')
                                $('#calc-new-users').css('display', 'none');
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
                btnOkClass: 'btn-xs',
                btnCancelClass: 'btn-xs',
                btnCancelLabel: '<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel: '<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
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
                            $('#tr_new_user_' + currentUser).remove();

                            $('[data-toggle=confirmation-delete-new-user]').confirmation('hide');
                            var rowCount = $('#tbody-new-users tr').length;
                            if (rowCount < 1) {
                                $('#new-users').remove();
                                $('#table-new-users').hide();
                                $('#info-new-users').html('<div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of new users found</div>')
                                $('#calc-new-users').css('display', 'none');
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


        $('[data-toggle=confirmation-delete-current-user]').confirmation({
                placement: 'left',
                animation: false,
                btnOkClass: 'btn-xs',
                btnCancelClass: 'btn-xs',
                btnCancelLabel: '<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel: '<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
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
                            $('#tr_current_user_' + currentUser).remove();
                            $('[data-toggle=confirmation-delete-current-user]').confirmation('hide');
                            var rowCount = $('#tbody-current-users tr').length;
                            if (rowCount < 1) {
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
                btnOkClass: 'btn-xs',
                btnCancelClass: 'btn-xs',
                btnCancelLabel: '<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel: '<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
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
                btnOkClass: 'btn-xs',
                btnCancelClass: 'btn-xs',
                btnCancelLabel: '<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
                btnOkLabel: '<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
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
