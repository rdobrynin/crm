<!--AJAX HTML GET METHODS-->
<div class="modal-header">
    <h2 class="modal-title">Update task&nbsp;#<?php print($task->id); ?></h2>
<!--    --><?php //var_dump($task); ?>
</div>
<div class="modal-body">


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_task_pr_title">Task name</label>
                <input type="text" name="edit_task_pr_title" id="edit_task_pr_title" value="<?php print($task->title); ?>" class="form-control form-control-default" placeholder="Task name">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="edit_task_pr_desc">Description</label>
                <textarea name="edit_task_pr_desc" id="edit_task_pr_desc" class="form-control form-control-default" rows="3" placeholder="Description"><?php print($task->desc); ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label for="edit_dueto_modal">Due to</label>
                <div class='input-group date'>
                    <input type='text' class="form-control form-control-default" value="<?php print(date('d.m.Y H:i', $task->due_time)); ?>"  id='edit_dueto_modal' />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="form-group">
                <label for="edit_task_type_choose">Label</label>
                <select class="form-control selectpicker form-control-default " id="edit_task_type_choose" name="edit_task_type_choose">
                    <?php foreach ($task_types as $tk=>$tv): ?>
                        <?php if ($tk ==$task->label): ?><?php endif ?>
                            <option value="<?php print($tk); ?>"  <?php if ($tk ==$task->label): ?>selected<?php endif ?> ><?php print(ucfirst($tv)); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-7">

            <label for="task_priority_choose" style="padding-bottom: 5px;">Priority</label>
            <div class="form-group">
                <?php switch ($task->priority):
                case 0: ?>
                    <label class="radio-inline">
                        <input type="radio" value="<?php echo $task->priority?>"  name="priority" checked="checked"><?php echo priority_status_index($task->priority) ?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="<?php echo 1 ?>"  name="priority"><?php echo priority_status_index(1) ?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="<?php echo 2 ?>"  name="priority"><?php echo priority_status_index(2) ?>
                    </label>
                 <?php break; ?>
                <?php case 1: ?>
                        <label class="radio-inline">
                            <input type="radio" value="<?php echo 0 ?>" name="priority"><?php echo priority_status_index(0) ?>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="<?php echo $task->priority ?>"  name="priority" checked="checked"><?php echo priority_status_index($task->priority) ?>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="<?php echo 2 ?>"   name="priority"><?php echo priority_status_index(2) ?>
                        </label>
                <?php break; ?>
                <?php case 2: ?>
                        <label class="radio-inline">
                            <input type="radio" value="<?php echo 0 ?>"  name="priority"><?php echo priority_status_index(0) ?>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="<?php echo 1 ?>" name="priority"><?php echo priority_status_index(1) ?>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="<?php echo $task->priority ?>" name="priority" checked="checked"><?php echo priority_status_index($task->priority) ?>
                        </label>
                <?php break; ?>
                <?php endswitch; ?>
            </div>
        </div>
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-primary" style="padding:20px; background-color: #fff">
    <label for="edit_curator_choose_modal" style="padding-top: 10px;">Curator:&nbsp;<?php print($user_name[$task->uid]); ?>&nbsp;<a href="javascript:void(0);" id="switch-curator-btn"><i class="fa fa-refresh large"></i></a></label>
    <?php if (isset($avatars[$task->uid])): ?>
        <div class="avatar-activity" style="border: 1px solid rgb(221, 221, 221);">
            <span class="avatar-img"><a href="javascript:void(0);"><img src="<?php print base_url() . 'uploads/avatar/' . $avatars[$task->uid]; ?>" height="45"></a></span>
        </div>
    <?php else: ?>
        <div class="avatar-activity" style="border: 1px solid rgb(221, 221, 221);">
            <span class="avatar-img"><a href="javascript:void(0);"><img src="/img/ProfilePlaceholderSuit1.png" height="45"></a></span>
        </div>
    <?php endif ?>
    <div class="form-group" id="switch-curator-group">
        <select class="form-control selectpicker form-control-default" id="edit_curator_choose_modal" name="edit_curator_choose_modal">
            <?php foreach ($curators as $k => $v): ?>
                <?php if ($v['id'] == $task->uid): ?>
                    <option value="<?php echo $v['id'] ?>" selected><?php echo $v['first_name'] . ' ' . $v['last_name'] ?></option>
                <?php endif ?>
                <?php if ($v['id'] != $task->uid): ?>
                    <option value="<?php echo $v['id'] ?>"><?php echo $v['first_name'] . ' ' . $v['last_name'] ?></option>
                <?php endif ?>

            <?php endforeach ?>
        </select>
    </div>
</div>
        </div>
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-primary" style="padding:20px; background-color: #fff">
            <label for="edit_implementor_choose_modal" style="padding-top: 10px;">Implementor:&nbsp;<?php print($user_name[$task->implementor]); ?><a href="javascript:void(0);" id="switch-implementor-btn"><i class="fa fa-refresh large"></i></a></label>
            <?php if (isset($avatars[$task->implementor])): ?>
                <div class="avatar-activity" style="border: 1px solid rgb(221, 221, 221);">
                    <span class="avatar-img"><a href="javascript:void(0);"><img src="<?php print base_url() . 'uploads/avatar/' . $avatars[$task->implementor]; ?>" height="45"></a></span>
                </div>
            <?php else: ?>
                <div class="avatar-activity" style="border: 1px solid rgb(221, 221, 221);">
                    <span class="avatar-img"><a href="javascript:void(0);"><img src="/img/ProfilePlaceholderSuit1.png" height="45"></a></span>
                </div>
            <?php endif ?>
            <div class="form-group"  id="switch-implementor-group">
                <select class="form-control selectpicker form-control-default" id="edit_implementor_choose_modal" name="edit_implementor_choose_modal">
                    <?php foreach ($imps as $k => $v): ?>
                    <?php if ($v['id'] == $task->implementor): ?>
                        <option value="<?php echo $v['id'] ?>" selected><?php echo $v['first_name'] . ' ' . $v['last_name'] ?></option>
                        <?php endif ?>
                        <?php if ($v['id'] != $task->implementor): ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['first_name'] . ' ' . $v['last_name'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        </div>
    </div>
    <div style="display: none; margin-bottom: 10px;" id="edit_task_pr_modal" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully updatedthe task</div>
    <div style="display: none; margin-bottom: 10px;" id="edit_error_task_pr_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Error to update task</div>
</div>
<div class="modal-footer" style="padding-top: 10px;">
    <div style="display: none; margin-bottom: 10px;" id="check_empty_edit_task_pr" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
    <div class="form-group">
        <input type="hidden" name="user_edit_task_pr_id" id="user_edit_task_pr_id" value="<?php print($user->id)?>">
        <input type="hidden" name="user_edit_project_id" id="user_edit_project_id" value="<?php print($task->pid)?>">
        <input type="hidden" name="user_edit_key_id" id="user_edit_key_id" value="<?php print($task->key)?>">
        <input type="hidden" name="user_task_edit_id" id="user_task_edit_id" value="<?php print($task->id)?>">
        <a href="#" class="btn btn-success btn-lg pull-left" id="edittask_pr_btn">Update task</a>
        <a href="#" class="btn btn-default btn-lg pull-right" id="close-form-edit-task">Close</a>
        <a href="#" class="btn btn-primary btn-lg pull-right" id="clear-form-edit-task">Restore</a>
    </div>
</div>

<script>
    $(function () {
        $('.selectpicker').selectpicker();
        $('#edit_dueto_modal').datetimepicker({
            theme:'light',
            format:'d.m.Y H:i',
            minDate: '<?php date("F j, Y, g:i a"); ?>',
            minTime:0
        });

        $('#switch-curator-btn').click(function () {
            $('#switch-curator-group').fadeIn('slow');
        });
        $('#switch-implementor-btn').click(function () {
            $('#switch-implementor-group').fadeIn('slow');
        });

        $('#clear-form-edit-task').click(function () {
            $user = '<?php print($user->id)?>';
            $tid = '<?php print($task->id)?>';
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url('ajax/taskToEdit') ?>",
                data: { tid: $tid, user:$user},
                beforeSend: function () {
                    $('#modal-ajax-edit').html('<img style="left: 100px;position: relative;" src="/img/ajax-loader.gif" height="250" alt="">');
                },
                success:function(data){
                    setTimeout(function() {
                        $('#modal-ajax-edit').html(data);
                    },700);
                },
                error:function(){
                    alert('Something went with error')
                }
            });
        });

        $('#close-form-edit-task').click(function () {
            $('#edit-task-modal').hide();
        });


        $('#edittask_pr_btn').click(function () {
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
                id: $('#user_task_edit_id').val()
            };

            $.ajax({
                url: "<?php echo site_url('ajax/updateEditTask'); ?>",
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
                                $('#tr-dashboard-task-'+<?php print($task->id); ?>).css({
                                    "-webkit-filter": "blur("+this.blurRadius+"px)",
                                    "filter": "blur("+this.blurRadius+"px)"
                                });
                            }
                        });
                        setTimeout(function() {
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').html('#'+<?php print($task->id); ?>);
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').html('<span style="color:#5cb85c;">updated now</span>');
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').html('<span class="label <?php print(task_type_label($task->label)); ?> label-xs"><?php print($task_types[$task->label]); ?></span>');
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').html('<a href="#;" class="hover-td-name" onClick="qmSendComment(<?php print($task->implementor); ?>)"><?php print(short_name($user_name[$task->implementor])); ?></a>');
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').next('td').html('<a href="#;" class="hover-td-name" onClick="qmSendComment(<?php print($task->uid); ?>)"><?php print(short_name($user_name[$task->uid])); ?></a>');
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').next('td').next('td').html(msg.new['title']);
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').html(msg.project_task);
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html(msg.new['desc']);
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html('<span><i class="fa fa-circle circle-priority" style="<?php if ($task->priority ==0): ?> color:#428bca;<?php endif ?><?php if ($task->priority): ?> color:#f89406;<?php endif ?><?php if ($task->priority ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($task->priority) ?>');
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html(msg.dueto);
                            $('#approve_tasks_table').find('#tr-dashboard-task-'+<?php print($task->id); ?>).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html('<a href="#;" onClick="taskToReady(<?php print($task->id); ?>)" style="text-decoration: none;"><i class="fa fa-play"></i></a><a href="#;" onClick="taskToEdit(<?php print($task->id); ?>)" style="text-decoration: none;"><i class="fa fa-pencil"></i></a><a href="#;" onMouseDown="taskToView(<?php print($task->id); ?>)" style="text-decoration: none;"><i class="fa fa-eye"></i></a><a href="#;" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($task->id); ?>" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>');
                            blurRadius = 0;
                            $('#edit-task-modal').hide();
                            $('#tr-dashboard-task-'+<?php print($task->id); ?>).css({
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


    });
</script>