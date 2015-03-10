function taskToRestore($data) {
    $.ajax({
        type: 'GET',
        url: '/ajax/taskToEdit',
        data: { tid: $data},
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
}


function taskToUpdate($tid) {
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
                    $('#approve_tasks_table').find('#tr-dashboard-task-'+$tid).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html('<a href="#" class="task-edit" data-id="'+$tid+'" style="text-decoration: none;"><i class="fa fa-play"></i></a><a href="#" class="task-edit" data-id="'+$tid+'" style="text-decoration: none;"><i class="fa fa-pencil"></i></a><a href="#" class="task-view" data-id="'+$tid+'" style="text-decoration: none;"><i class="fa fa-eye"></i></a><a href="#;" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="'+$tid+'" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>');
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

}