<div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'invite-form', 'autocomplete' => 'off'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                    <small>Contact person invitation</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name_invite" id="first_name_invite" class="form-control btn-special" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name_invite" id="last_name_invite" class="form-control btn-special" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="email" name="email_invite" id="email_invite" class="form-control btn-special" placeholder="Email Address">
                        </div>
                        <div style="display: none; margin-bottom: 10px;" id="check_email" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;This email is already in system</div>
                        <div style="display: none; margin-bottom: 10px;" id="check_email_f" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Email address is invalid</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <select class="form-control selectpicker" id="role_invite" name="role_invite">
                                <?php foreach ($roles as $rk => $rv): ?>
                                    <?php if ($rv['rid'] != 5): ?>
                                        <option value="<?php print($rv['rid']); ?>"><?php print(ucfirst($rv['title'])); ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px;" id="send_mail" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully sent invitation</div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" id="user_invite_id" value="<?php print($user[0]['id'])?>">
                <div style="display: none; margin-bottom: 10px;" id="check_empty" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                <button type="button" class="btn btn-success" id="invite-ajax-btn">Invite</button>
                <!-- <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>-->
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/myModal -->

<!--Create project modal window-->
<div class="modal fade" id="addproject_modal" tabindex="-1" role="dialog" aria-labelledby="addproject_formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'addproject_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                    <small>Create project</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="project_title">Project title</label>
                            <input type="text" name="project_title" id="project_title" class="form-control btn-special" placeholder="Project title">
                        </div>
                        <div style="display: none; margin-bottom: 10px;" id="check_title_project" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;This project already added</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="project_desc">Description</label>
                            <textarea name="project_desc" id="project_desc" class="form-control btn-special" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px;" id="save_project_modal" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully added project</div>
                </div>
            <div class="modal-footer">
                <input type="hidden" name="user_added_id" id="user_added_id" value="<?php print($user[0]['id'])?>">
                <div style="display: none; margin-bottom: 10px;" id="check_empty_project" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                <button type="button" class="btn btn-success" id="addproject_btn">Save</button>
                <button type="button" class="btn btn-success" id="addproject_addtask_btn">Save & create task</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addproject_moda -->

<!--Create task for project modal window-->
<div class="modal fade" id="addtask_pr_modal" tabindex="-1" role="dialog" aria-labelledby="addtask_pr_formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'addtask_pr_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    <small>Add task</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="task_pr_title">Task name</label>
                            <input type="text" name="task_pr_title" id="task_pr_title" class="form-control btn-special" placeholder="Task name title">
                        </div>
                        <div style="display: none; margin-bottom: 10px;" id="check_repeat_task_pr" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;This title already exists</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="task_pr_desc">Description</label>
                            <textarea name="task_pr_desc" id="task_pr_desc" class="form-control btn-special" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="choose_project_modal">Choose project</label>
                            <select class="form-control selectpicker" id="choose_project_modal" name="choose_project_modal">
                                <?php foreach ($projects as $pk=>$pv): ?>
                                    <option value="<?php print($pv['pid']); ?>" ><?php print(ucfirst($pv['title'])); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
               <div class="row">
                   <div class="col-xs-12 col-md-6">
                       <div class="form-group">
                           <label for="dueto_modal">Due to</label>
                               <div class='input-group date'>
                                   <input type='text' class="form-control btn-special"  id='dueto_modal' />
                               </div>
                       </div>
                   </div>
               </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="form-group">
                            <label for="task_type_choose">Label</label>
                            <select class="form-control selectpicker" id="task_type_choose" name="task_type_choose">
                                <?php foreach ($task_types as $tk=>$tv): ?>
                                        <option value="<?php print($tv['id']); ?>" ><?php print(ucfirst($tv['title'])); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="task_priority_choose">Priority</label>
                            <select class="form-control selectpicker" id="task_priority_choose" name="task_priority_choose">
                                    <option value="0" data-content="<span class='label label-xs label-primary'><?php echo priority_status_index(0) ?></span>"></option>
                                    <option value="1" data-content="<span class='label label-xs label-warning'><?php echo priority_status_index(1) ?></span>"></option>
                                    <option value="2" data-content="<span class='label label-xs label-danger'><?php echo priority_status_index(2) ?></span>"></option>
                            </select>
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="implementor_choose_modal">Choose implementor: </label>
                            <?php if ($imps != false): ?>
                                <select class="form-control selectpicker" id="implementor_choose_modal" name="implementor_choose_modal">
                                    <?php foreach ($imps as $k => $v): ?>
                                        <option value="<?php echo $v['id'] ?>"><?php echo $v['first_name'] . ' ' . $v['last_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            <?php else: ?>
                                <div style="display: block; margin-bottom: 10px;" id="no_imps_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;No one implementors found.&nbsp;&nbsp;<span class="btn btn-xs btn-primary pull-right" id="btn_modal_miss_imp" style="position:relative;top:4px;">Invite first</span></div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px;" id="save_task_pr_modal" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully added the task</div>
                <div style="display: none; margin-bottom: 10px;" id="save_error_task_pr_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Error to add task</div>
            </div>
            <div class="modal-footer" style="padding-top: 10px;">
                <div class="form-group">
                <input type="hidden" name="user_added_task_pr_id" id="user_added_task_pr_id" value="<?php print($user[0]['id'])?>">
                <div style="display: none; margin-bottom: 10px;" id="check_empty_task_pr" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                <button type="button" class="btn btn-success <?php if ($imps == false): ?>disabled<?php endif ?>" id="addtask_pr_btn">Add task</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addtask_pr_modal -->
<script type="text/javascript">
    $(function () {
        $('#dueto_modal').datetimepicker({theme:'dark',minDate: 0,minTime:0});
        $('#btn_modal_miss_imp').click(function () {
            $('#addtask_pr_modal').modal('hide');
            $('#invite').modal('show');
        });
    });
</script>
