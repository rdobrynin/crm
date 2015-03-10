define(function () {



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

        $('[data-toggle=confirmation-delete-current-user]').confirmation(
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

        $('#admin-users-tab a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });

    });
});