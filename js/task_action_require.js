define(function () {

$(function () {
    /**
     * Task View
     */

    $( "body" ).delegate( ".task-view", "click", function() {
        var $data;
        $data= $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/ajax/getTask',
            data: { tid: $data},
            beforeSend: function () {
            },
            success: function (data) {
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

    $( "body" ).delegate( ".task-edit", "click", function() {
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




    $(function () {
        /**
         * Add project
         */

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




        $('#invite-person').click(function () {

            $('#invite').modal('show');


            $('.selectpicker').selectpicker({
                style: 'btn-special',
                size: 14
            });
        });

        $('#add_task_modal').click(function () {
            var pr_val;
            pr_val = $('#choose_project_modal').val();
            if(pr_val.length>0) {
                GetImpTask(pr_val);
            }
        });

        $( "body" ).delegate( "#btn_modal_miss_imp", "click", function(e) {
            $('#addtask_pr_modal').modal('hide');
            $('#invite').modal('show');
        });
    });

    function GetImpTask(arg) {
        var form_data = {
            id: arg
        };
        $.ajax({
            url: '/ajax/GetImpTask',
            type: 'GET',
            data: form_data,

            success: function (data) {
                $('#addtask_pr_modal').modal('show');
                $('#ajax-get-modal-imps').html(data);
                $('.selectpicker').selectpicker();
                $('#dueto_modal').datetimepicker();

            }
        });
    }


    $("#choose_project_modal").change(function(){
        var selectedProject;
        selectedProject = $("#choose_project_modal option:selected").val();
        UpdateImpTask(selectedProject);

    });



    function UpdateImpTask(arg) {
        var form_data = {
            id: arg
        };
        $.ajax({
            url: '/ajax/GetImpTask',
            type: 'GET',
            data: form_data,

            success: function (data) {

                $('#ajax-get-modal-imps').html(data);
                $('.selectpicker').selectpicker();
                $('#dueto_modal').datetimepicker();

            }
        });
    }




    /**
     * Task to Process
     */

    $( "body" ).delegate( ".task-process", "click", function() {
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

    $( "body" ).delegate( ".task-ready", "click", function() {
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
                $('#tr-task-task-' + $data).remove();
                $('#tr-project-task-' + $data).remove();
            }
        });
    });

    $( "body" ).delegate( ".imp-complete", "click", function() {
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

    $( "body" ).delegate( ".task-control", "click", function() {
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

    $( "#edit-task-modal" ).delegate( "#edittask_pr_btn", "click", function() {
        var $tid;
        $tid = $(this).attr('data-id');
        var priority = $('input[name=priority]:checked').val();
        var form_data = {
            title :$('#edit_task_pr_title').val(),
            desc :$('#edit_task_pr_desc').val(),
            project :$('#user_edit_project_id').val(),
            key :$('#user_edit_key_id').val(),
            dueto :$('#edit_dueto_modal').val(),
            label :$('#edit_task_type_choose').val(),
            priority :priority,
            implementor :$('#edit_implementor_choose_modal').val(),
            owner :$('#edit_curator_choose_modal').val(),
            id: $tid
        };

        $.ajax({
            url: '/ajax/updateEditTask',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg.empty == true) {
                    $('#check_empty_edit_task_pr').fadeIn('slow').css('display', 'block');
                }
                else {
                    $('#check_empty_edit_task_pr').fadeIn('slow').css('display', 'none');
                }
                if(msg.result == true) {
                    $('#edit_task_pr_modal').css('display','block');
                    $({blurRadius: 0}).animate({blurRadius: 1}, {
                        duration: 500,
                        easing: 'swing', // or "linear"
                        // use jQuery UI or Easing plugin for more options
                        step: function() {
                            $('#tr-dashboard-task-'+$tid).css({
                                "-webkit-filter": "blur("+this.blurRadius+"px)",
                                "filter": "blur("+this.blurRadius+"px)"
                            });
                        }
                    });
                    priority_color = '';

                    if (msg.new_priority == 0) {
                        priority_color = 'color:#428bca;';
                    }
                    else if(msg.new_priority == 2) {
                        priority_color = 'color:#d9534f;';
                    }
                    else {
                        priority_color = 'color:#f89406;';
                    }
                    setTimeout(function() {
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').html('#'+$tid);
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').html('<span style="color:#5cb85c;">updated now</span>');
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').html('<span class="label '+msg.new_label+' label-xs">'+msg.new_label_type+'</span>');
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').html('<a href="#" class="hover-td-name qm-send-comment" data-uid="'+msg.new['implementor']+'">'+msg.new_imp_name+'</a>');
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').html('<a href="#" class="hover-td-name qm-send-comment" data-uid="'+msg.new['implementor']+'">'+msg.new_uid+'</a>');
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').next('td').html(msg.new['title']);
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').html(msg.project_task);
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html(msg.new['desc']);
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html('<span><i class="fa fa-circle circle-priority" style="'+priority_color+'"></i></span>'+msg.new_priority_label);
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html(msg.dueto);
                        $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html('<a href="#" class="task-edit" data-id="'+$tid+'" style="text-decoration: none;"><i class="fa fa-play"></i></a><a href="#" class="task-edit" data-id="'+$tid+'" style="text-decoration: none;"><i class="fa fa-pencil"></i></a><a href="#" class="task-view" data-id="'+$tid+'" style="text-decoration: none;"><i class="fa fa-eye"></i></a><a href="#" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="'+$tid+'" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>');
                        blurRadius = 0;
                        $('#edit-task-modal').hide();
                        $('#tr-dashboard-task-'+$tid).css({
                            "-webkit-filter": "blur("+this.blurRadius+"px)",
                            "filter": "blur("+this.blurRadius+"px)"
                        });
                    }, 2000);
                }
                else {
                    $('#edit_error_task_pr_modal').css('display','block');
                }
            }
        });
    });


    $( "#edit-task-modal" ).delegate( "#close-form-edit-task", "click", function() {
        $('#edit-task-modal').hide();
    });

    $( "#edit-task-modal" ).delegate( "#clear-form-edit-task", "click", function() {
        var $tid;
        $tid = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/ajax/taskToEdit',
            data: { tid: $tid},
            beforeSend: function () {
                $('#modal-ajax-edit').html('<img style="left: 100px;position: relative;" src="/img/ajax-loader.gif" height="250" alt="">');
            },
            success:function(data){
                setTimeout(function() {
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
                },700);
            },
            error:function(){
                alert('Something went with error')
            }
        });
    });
});
});