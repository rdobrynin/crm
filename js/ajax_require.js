define(function(){

    /**
     * Get Label Task
     * @param $status
     * @returns {number|*}
     */


    function getLabelTask($status) {
        $result=0;
        if($status == 1) {
            $result = 'label-danger';
        }
        else if($status == 2) {
            $result = 'label-success';
        }
        else if($status == 3) {
            $result = 'label-warning';
        }
        else if($status == 4) {
            $result = 'label-primary';
        }
        else if($status == 5) {
            $result = 'label-info';
        }
        else if($status == 6) {
            $result = 'label-primary';
        }
        else if($status == 7) {
            $result = 'label-danger';
        }
        else if($status == 8) {
            $result = 'label-info';
        }
        return $result;
    }

    /**
     * Priority task status shows
     * @param $status
     * @returns {number|*}
     */

    function getPriorityTask($status) {
        $result=0;
        if($status == 0) {
            $result = 'minor';
        }
        else if($status == 1) {
            $result = 'major';
        }
        else if($status == 2) {
            $result = 'critical';
        }
        return $result;
    }

    /**
     * Priority color task
     * @param $status
     * @returns {number|*}
     */


    function getPriorityTaskClass($status) {
        $result=0;
        if($status == 0) {
            $result = 'color:#428bca';
        }
        else if($status == 1) {
            $result = ' color:#f89406';
        }
        else if($status == 2) {
            $result = ' color:#d9534f';
        }
        return $result;
    }



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




});