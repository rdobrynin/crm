define(function(){

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



// ANOTHER

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




//        $(".toggle-div-dialog").click(function (event) {
//            var check = false;
//            if ($('#toggle-dialog-btn').is(":checked")) {
//                check = 1;
//            }
//            else {
//                check = 0;
//            }
//            var form_data = {
//                introduce: check,
//                user_id: $('#user_id_dialog').val()
//            };
//            $.ajax({
//                url: '/ajax/settingsDialog',
//                type: 'POST',
//                data: form_data,
//                dataType: 'json',
//                success: function (msg) {
//                }
//            });
//        });



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




    });


});