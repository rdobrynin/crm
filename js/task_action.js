$(function () {
    /**
     * Task View
     */

    $('.task-view').click(function () {
        var $data;
        $data= $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/ajax/getTask',
            data: { tid: $data},
            beforeSend: function () {
            },
            success: function (data) {
                console.log(data);
                $('#view_task_modal').modal('show');
                $('#modal-ajax-view').html(data);
            },
            error: function () {
                alert('Something went with error')
            }
        });
    });

    /**
     * Task to edit
     */

    $('.task-edit').click(function () {
        var $data;
        $data= $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/ajax/taskToEdit',
            data: { tid: $data},
            beforeSend: function () {
                $('#edit-task-modal').show();
                $('#modal-ajax-edit').html('<img style="left: 100px;position: relative;" src="/img/ajax-loader.gif" height="250" alt="">');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#modal-ajax-edit').html(data);
                    $('.selectpicker').selectpicker();
                    $.ajax({
                        url: '/ajax/getCurrentTime',
                        type: 'GET',
                        dataType: 'json',
                        success: function (time) {

                            $('#edit_dueto_modal').datetimepicker({
                                theme:'light',
                                format:'d.m.Y H:i',
                                minDate: time,
                                minTime:0
                            });

                            $('#switch-curator-btn').click(function () {
                                $('#switch-curator-group').fadeIn('slow');
                            });
                            $('#switch-implementor-btn').click(function () {
                                $('#switch-implementor-group').fadeIn('slow');
                            });

                        }
                    });


                }, 700);


            },
            error: function () {
                alert('Something went with error')
            }
        });
    });

    /**
     * Task to Complete
     */

    $('.task-complete').click(function () {
    });



    /**
     * Task to Process
     */

    $('.task-process').click(function () {
        $data= $(this).attr('data-id');
        var form_data = {
            id: $data
        };
        $.ajax({
            url: '/ajax/updateTaskProcess',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
            }
        });
    });

    /**
     * Task to Ready
     */

    $('.task-ready').click(function () {
        $data= $(this).attr('data-id');
        var form_data = {
            id: $data,
            status: '5'
        };
        $.ajax({
            url: '/ajax/updateTask',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                $('#tr-dashboard-task-' + $data).remove();
            }
        });
    });

    $('.imp-complete').click(function () {
        var $data,$cts;
        $data= $(this).attr('data-id');
        $cts= $(this).attr('data-cts');
        var min = $cts.split(/\s+/);
        var form_data = {
            id: $data,
            status: 3,
            tts: min[0]
        };
        $.ajax({
            url: '/ajax/completeTask',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg == true) {
                    $('#ready-task-' + $data).remove();
                    $.ajax({
                        url: '/ajax/countReadyTasks',
                        type: 'GET',
                        dataType: 'json',
                        success: function (msg) {
                            if (msg < 1) {
                                $('#ready-task-table').css('display', 'none');
                            }
                        }
                    });

                }
            }
        });
    });

    /**
     * Implement Control action
     */

    $('.imp-control').click(function () {
        var $data,$action;
        $data= $(this).attr('data-id');
        $action= $(this).attr('data-action');
        $('#task_modal_timer').modal({show: true});
        var form_data = {
            id: $data,
            status: $action
        };
        $.ajax({
            url: '/ajax/updateTask',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg == true) {
                    $('#ready-task-' + $data).remove();
                    $.ajax({
                        url: '/ajax/countReadyTasks',
                        type: 'GET',
                        dataType: 'json',
                        success: function (msg) {
                            if (msg < 1) {
                                $('#ready-task-table').css('display', 'none');
                            }
                        }
                    });
                }
            }
        });
    });
});