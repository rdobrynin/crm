


$(function () {
    $.ajax({
        url: '/ajax/getTasks',
        type: 'GET',
        dataType: 'json',
        success: function (msg) {
            tasks = msg.tasks;
            $.each(tasks, function (index, value) {
                if (value['status'] != '3' && value['overdue'] != '1') {
                    var data_time = value['due_time'];
                    var dt = new Date().getTime();
                    var n = dt.toString();
                    var new_time = n.slice(0, -3);
                    if (data_time < new_time) {
                        var form_data = {
                            id: value['id'],
                            overdue: 1
                        };
                        $.ajax({
                            url: '/ajax/updateTaskOverdue',
                            type: 'POST',
                            data: form_data,
                            dataType: 'json',
                            success: function (msg) {
                            }
                        });
                    }
                    else if (data_time > new_time) {
                        form_data = {
                            id: value['id'],
                            overdue: 0
                        };
                        $.ajax({
                            url: '/ajax/updateTaskOverdue',
                            type: 'POST',
                            data: form_data,
                            dataType: 'json',
                            success: function (msg) {
                            }
                        });
                    }
                }
            });
        }
    });


    /**
     * INVITATION AJAX
     *
     **/

    $("#invite-ajax-btn").click(function () {
        var form_data = {
            email: $('#email_invite').val(),
            first_name: $('#first_name_invite').val(),
            last_name: $('#last_name_invite').val(),
            role: $('#role_invite').val(),
            user_id: $('#user_invite_id').val()

        };
        $.ajax({
            url: '/ajax/invitation',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg.email == false) {
                    $('#check_email').css('display', 'block');
                    $('#check_email').html('<i class="fa fa-exclamation-circle"></i>&nbsp;This email is already registered');
                }
                else {
                    $('#check_email').css('display', 'none');
                }

                if (msg.empty == false) {
                    $('#check_empty').css('display', 'block');
                }
                if (msg.empty == true) {
                    $('#check_empty').css('display', 'none');
                }
                if (msg.check_email == false) {
                    $('#check_email_f').css('display', 'block');
                    $('#check_email_f').html('<i class="fa fa-exclamation-circle"></i>&nbsp;email address is invalid');
                }
                else {
                    $('#check_email_f').css('display', 'none');
                }

                if (msg.send == true) {
                    $('#send_mail').css('display', 'block');
                    setTimeout(function () {
                        $('#check_email_f, #check_email').css('display', 'none');
                        $("input[type=text], textarea").val("");
                        $('#invite').modal('hide');
                    }, 2000);
                }
            }
        });
    });


    /**
     *
     * Sidebar left ON/OFF
     */

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

// clear fields after close modal
    $('#close-project-create').click(function () {
        $('#save_project_modal, #check_empty_project, #check_title_project').css('display', 'none');
        $("input[type=text], textarea").val("");
    });

    /**
     * Add project
     *
     **/

    $("#addproject_btn").click(function () {
        var form_data = {
            project_title: $('#project_title').val(),
            project_desc: $('#project_desc').val(),
            user_id: $('#user_added_id').val()
        };
        $.ajax({
            url: '/ajax/addproject',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg.empty == false) {
                    $('#check_empty_project').css('display', 'block');
                }
                if (msg.empty == true) {
                    $('#check_empty_project').css('display', 'none');
                }

                if (msg.project == false) {
                    $('#check_title_project').css('display', 'block');
                }
                if (msg.project == true) {
                    $('#check_title_project').css('display', 'none');
                }

                if (msg.send == true && msg.project == true && msg.empty == true) {
                    $('#save_project_modal').css('display', 'block');
                    setTimeout(function () {
                        $('#save_project_modal, #check_empty_project, #check_title_project').css('display', 'none');
                        $("input[type=text], textarea").val("");

                        $('#addproject_modal').modal('hide');
                    }, 2000);
                }
            }
        });
        setInterval(function () {
            $.get('/ajax/countProjects', function (data) {
                if (data > 0) {
                    $('#badge-count-projects,#badge-count-mini-projects').html(data);
                }
            }, "json");
        }, 3000);
    });


    /**
     *  Upload avatar
     **/

    $('#upload_file').submit(function () {
        $.ajaxFileUpload({
            url: "/ajax/do_upload",
            secureuri: false,
            fileElementId: 'userfile',
            dataType: 'json',
            data: {
                'user_id': $('#user_id').val()
            },
            success: function (data, status) {
                if (data.status != 'error') {
                    $('#avatar-true').hide();
                    $('#avatar-true-ajax').show();
                    $('.avatar-img').hide();
                    $('.avatar-img-ajax').show();
                    $('.avatar-img-ajax').html("<a href='" + window.location.protocol + "profile'><img src='" + window.location.protocol + "/uploads/avatar/" + data.new_avatar + "' alt='avatar' height='45'></a>");
                    $('#ajax-temp').html("<img src='" + window.location.protocol + "/uploads/avatar/" + data.new_avatar + "' alt='Smiley face' height='100'>");
                }

                $('#files').show();
                $('#files').empty();
                $('#files').html('<p class="lead">' + data.msg + '</p>');
                $('#files').delay(1500).fadeOut();
            }
        });
        return false;
    });

    $(".help-button").click((function () {
        var i = 0;
        return function () {
            $('.help-block').animate({
                height: (++i % 2) ? 490 : 10,
                background: 'rgb(255, 144, 11)', opacity: 0.9
            }, 200);
            $('.help-content').slideToggle('fast');
        }
    })());

    /**
     * AJAX online/offline status
     */

    setInterval(function () {
        current_time = $.now();
        $.ajax({
            url: '/ajax/check_online',
            type: 'GET',
            dataType: 'json',
            success: function (msg) {
                msg.status.forEach(function (entry) {
                    var name = entry['first_name'] + ' ' + entry['last_name'];
                    var id = entry['id'];
                    var time = entry['status_time'];
                    var status = entry['status'];
                    if (current_time < (entry['status_time'] + 100)) {
//           ONLINE
                        if (entry['status'] == '1') {
                            $('.show-info-online').show();
                            $('.show-info-online').children(".show-info-content-online").html('<span class="label label-xs label-success label-round"></span>' + name + ' is online');

                            $('#status-online-' + id).removeClass('grey').addClass('green');
                            $('#status-online-comment-' + id).removeClass('grey').addClass('green');
                            $('#status-assign-user-' + id).removeClass('grey').addClass('green');
                            $('.show-info-online').delay(2500).fadeOut();
                        }
                        else if (entry['status'] == '0') {
                            $('.show-info-online').show();
                            $('.show-info-online').children(".show-info-content-online").html('<span class="label label-xs label-primary label-round"></span>' + name + ' is offline');
                            $('#status-online-' + id).removeClass('green').addClass('grey');
                            $('#status-online-comment-' + id).removeClass('green').addClass('grey');
                            $('#status-assign-user-' + id).removeClass('green').addClass('grey');
                            $('.show-info-online').delay(2500).fadeOut();
                        }
                    }
                });
            }
        });
    }, 5900);

    $(".btn-update-ttp").click(function (event) {
        var current_id = event.target.id;
        var input_id = event.target.id + '_input';
        var input_val = $('#' + input_id).val();
        var form_data = {
            title: input_val,
            id: current_id
        };
        $.ajax({
            url: '/ajax/changeTaskType',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg.empty == true) {
                    $('#check_empty_' + input_id).fadeIn('slow').css('display', 'block');
                }
                else {
                    if (msg.check['title'] != input_val) {
                        $('#' + current_id).html('applied');
                    }
                    $('#check_empty_' + input_id).fadeOut('slow').css('display', 'none');
                }
            }
        });
    });

    $("#addtask_pr_btn").click(function (event) {
        var myString = $.trim($('#choose_project_modal').text().toUpperCase());
        var newABB = myString.substr(0, myString.length - 3);

        var form_data = {
            title: $('#task_pr_title').val(),
            desc: $('#task_pr_desc').val(),
            project: $('#choose_project_modal').val(),
            dueto: $('#dueto_modal').val(),
            label: $('#task_type_choose').val(),
            priority: $('#task_priority_choose').val(),
            implementor: $('#implementor_choose_modal').val(),
            owner: $('#user_added_task_pr_id').val()
        };
        $.ajax({
            url: '/ajax/createTask',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg.empty == true) {
                    $('#check_empty_task_pr').fadeIn('slow').css('display', 'block');
                }
                else {
                    $('#check_empty_task_pr').fadeIn('slow').css('display', 'none');
                }
                if (msg.result == true) {
                    $('#save_task_pr_modal').fadeIn('slow').css('display', 'block');
                    setTimeout(function () {
                        $('#save_task_pr_modal,#save_error_task_pr_modal').css('display', 'none');
                        $("input[type=text], textarea").val("");
                        $('#addtask_pr_modal').modal('hide');
                        var idtr = 'tr-dashboard-task-' + msg["id"];
                        $("#approve-task-table").find('tbody:first')
                            .prepend("<tr id='" + idtr + "'><td class='text-left'>#" + msg['newtask']['id'] + "</td><td class='text-left'><span style='color:#5cb85c;'>created now</span></td>+" +
                                "<td class='text-left'><span class='label label-xs " + getLabelTask(msg['newtask']['label']) + " '>" + msg['text_label']['title'] + "</span></td>+" +
                                "<td class='text-left'><a href='#' class='hover-td-name qm-send-comment' data-uid='" + msg['newtask']['implementor'] + "'>" + msg['imp_name'] + "</a></td>" +
                                "<td class='text-left'><a href='#' class='hover-td-name qm-send-comment' data-uid='" + msg['newtask']['uid'] + "'>" + msg['cur_name'] + "</a></td>" +
                                "<td class='text-left'>" + msg['newtask']['title'] + "</td>+" +
                                "<td class='text-left'>" + msg.project_task + "</td>+" +
                                "<td class='text-left'>" + msg['newtask']['desc'] + "</td>+" +
                                "<td class='text-left'><span><i class='fa fa-circle circle-priority' style=" + getPriorityTaskClass(msg['newtask']['priority']) + "></i></span> " + getPriorityTask(msg['newtask']['priority']) + "</td>+" +
                                "<td class='text-left'>" + msg.dueto + "</td>+" +
                                "<td class='text-left'> <a href='#' class='task-ready' data-id='" + msg['newtask']['id'] + "' style='text-decoration: none;'><i class='fa fa-play'></i></a><a href='#'" +
                                "data-id='" + msg['newtask']['id'] + "' class='task-edit' style='text-decoration: none;'><i class='fa fa-pencil'></i></a><a href='#' class='task-view' data-id='" + msg['newtask']['id']+"><i class='fa fa-eye'></i></a>" +
                                "<a href='#' data-toggle='confirmation-delete-current-task' data-singleton='true' data-target='" + msg['newtask']['id'] + "' style='text-decoration: none;cursor: pointer;'>" +
                                "<span class='icon-remove'></span></a></td></tr>");

                        idtr = 'tr-task-task-' + msg["id"];
                        $("#common-tasks-table").find('tbody:first')
                            .prepend("<tr id='" + idtr + "'><td class='text-left'>#" + msg['newtask']['id'] + "</td><td class='text-left'><span style='color:#5cb85c;'>created now</span></td>+" +
                                "<td class='text-left'>" + msg['newtask']['label'] + "</td>+" +
                                "<td class='text-left'><a href='#' class='hover-td-name qm-send-comment' data-uid='" + msg['newtask']['implementor'] + "'>" + msg['imp_name'] + "</a></td>" +
                                "<td class='text-left'><a href='#' class='hover-td-name qm-send-comment' data-uid='" + msg['newtask']['uid'] + "'>" + msg['cur_name'] + "</a></td>" +
                                "<td class='text-left'>" + msg['newtask']['title'] + "</td>+" +
                                "<td class='text-left'>" + msg['newtask']['pid'] + "</td>+" +
                                "<td class='text-left'>" + msg['newtask']['desc'] + "</td>+" +
                                "<td class='text-left'>" + msg['newtask']['status'] + "</td>+" +
                                "<td class='text-left'><span><i class='fa fa-circle circle-priority' style=" + getPriorityTaskClass(msg['newtask']['priority']) + "></i></span> " + getPriorityTask(msg['newtask']['priority']) + "</td>+" +
                                "<td class='text-left'>-" +
                                "<td class='text-left'>" + msg['newtask']['due_time'] + "</td>+" +
                                "<td class='text-left'> <a href='#' class='task-edit' data-id='" + msg['newtask']['id'] + "' style='text-decoration: none;'><i class='fa fa-play'></i></a><a href='#'" +
                                "data-id='" + msg['newtask']['id'] + "' class='task-edit' style='text-decoration: none;'><i class='fa fa-pencil'></i></a><a href='#' class='task-view' data-id='" + msg['newtask']['id'] + "' style='text-decoration: none;'><i class='fa fa-eye'></i></a>" +
                                "<a href='#' data-toggle='confirmation-delete-current-task' data-singleton='true' data-target='" + msg['newtask']['id'] + "' style='text-decoration: none;cursor: pointer;'>" +
                                "<span class='icon-remove'></span></a></td></tr>");

                    }, 2000);

                    setInterval(function () {
                        $.get('/ajax/countTasks', function (data) {
                            if (data.length > 0) {
                                $('#badge-count-tasks,#badge-count-mini-tasks').html(data.length);


                            }
                        }, "json");
                    }, 3000);

                }
                else {
                    $('#save_task_pr_modal').css('display', 'none');
                }
            }
        });
    });

    $(".toggle-div-help").click(function (event) {
        var check = false;
        if ($('#toggle-help-btn').is(":checked")) {
            check = 0;
        }
        else {
            check = 1;
        }
        var form_data = {
            help_block: check,
            user_id: $('#user_id_help').val()
        };
        $.ajax({
            url: '/ajax/switchHelp',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
            }
        });
    });

    $(".toggle-div-dialog").click(function (event) {
        var check = false;
        if ($('#toggle-dialog-btn').is(":checked")) {
            check = 1;
        }
        else {
            check = 0;
        }
        var form_data = {
            introduce: check,
            user_id: $('#user_id_dialog').val()
        };
        $.ajax({
            url: '/ajax/settingsDialog',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
            }
        });
    });

    $(".toggle-div-message").click(function (event) {
        var check = false;
        if ($('#toggle-message-btn').is(":checked")) {
            check = 0;
        }
        else {
            check = 1;
        }
        var form_data = {
            check: check,
            id: $('#user_id_message').val()
        };
        $.ajax({
            url: '/ajax/messageToEmail',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
            }
        });
    });

    $('#qm-clear-form-btn').click(function () {
        $("#qm-text, #qm-subject-field").val("");
    });


//      Autocomplete names
    $.ajax({
        url: '/ajax/getUserNames',
        type: 'GET',
        dataType: 'json',
        success: function (msg) {
            names = msg.users_names;

            var full_names = [];
            var full_names_id = [];
            $.each(names, function (index, value) {
                full_names.push(value);
                full_names_id.push(index);
            });
            $('#qm-autocomplete').autocomplete(full_names, {
                autoFill: true,
                selectFirst: true,
                width: '240px'
            });

        }
    });


    /**
     * Delete confirmation task
     **/


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



    $.ajax({
        url: '/ajax/getCurrentTime',
        type: 'GET',
        dataType: 'json',
        success: function (time) {

            $('#dueto_modal').datetimepicker({
                theme:'light',
                format:'d.m.Y H:i',
                minDate: time,
                minTime:0
            });

        }
    });


    $('.toggle-comment').click(function () {
        idComment = $(this).attr('data-comment');
        if ( $('#toggle-comment-'+idComment).is( ":checked" ) ) {
            var form_data = {
                id: idComment,
                check: '1'
            };
            $.ajax({
                url: '/ajax/publishComment',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                    $('#adjust-comment-'+idComment).addClass('disabled');
                }
            });
        }
        else {
                form_data = {
                id: idComment,
                check: '0'
            };
            $.ajax({
                url: '/ajax/publishComment',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                    $('#adjust-comment-'+idComment).removeClass('disabled');
                }
            });

        }
    });

//      Check if title is already registered
    $( "#client_title" ).blur(function() {
        var form_data = {
            title: $(this).val()
        };
        $.ajax({
            url: '/ajax/check_client',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if(msg.result!=null) {
                    $('#create_company').attr('disabled','disabled');
                    $('#check_client').show();
                    $("#check_client").empty().append(msg.result);
                }
                else {
                    $('#create_company').removeAttr('disabled');
                    $('#check_client').hide();
                }
            }
        });
    });

// Check if email already registered
    $( "#client_email" ).blur(function() {
        var form_data = {
            email: $(this).val()
        };
        $.ajax({
            url: '/ajax/check_emails',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if(msg.result!=true) {
                    $('#create_company').attr('disabled','disabled');
                    $('#check_email').show();
                    $("#check_email").empty().append(msg.result);
                }
                else {
                    $('#create_company').removeAttr('disabled');
                    $('#check_email').hide();
                }
            }
        });
    });
});
//  END READY FUNCTION


