<div class="modal white-modal" id="invite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'invite-form', 'autocomplete' => 'off'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" aria-hidden="true"><span class="icon-remove"></span></a>
                <h4 class="modal-title" id="myModalLabel">
                    <small>Contact person invitation</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name_invite" id="first_name_invite" class="form-control form-control-default" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name_invite" id="last_name_invite" class="form-control form-control-default" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="email" name="email_invite" id="email_invite" class="form-control form-control-default" placeholder="Email Address">
                        </div>
                        <div style="display: none; margin-bottom: 10px;" id="check_email" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;This email is already in system</div>
                        <div style="display: none; margin-bottom: 10px;" id="check_email_f" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Email address is invalid</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <select class="form-control selectpicker" id="role_invite" name="role_invite">
                                <?php if ($user->role=5 OR $user->role=4): ?>
                                    <?php foreach ($roles as $rk => $rv): ?>
                                        <?php if ($rv['rid'] !=0 AND $rv['rid'] !=5): ?>
                                            <option value="<?php print($rv['rid']); ?>"><?php print(show_role($rv['rid'])); ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px;" id="send_mail" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully sent invitation</div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" id="user_invite_id" value="<?php print($user->id)?>">
                <div style="display: none; margin-bottom: 10px;" id="check_empty" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                <button type="button" class="btn btn-success btn-lg" id="invite-ajax-btn">Invite</button>
                <!-- <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>-->
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/myModal -->

<!--Create project modal window-->
<div class="modal white-modal" id="addproject_modal" tabindex="-1" role="dialog" aria-labelledby="addproject_formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'addproject_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" aria-hidden="true"><span class="icon-remove"></span></a>
                <h4 class="modal-title" id="myModalLabel">
                    <small>Create project</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="project_title">Project title</label>
                            <input type="text" name="project_title" id="project_title" class="form-control form-control-default" placeholder="Project title">
                        </div>

                        <span style="display:none;float: left; width: 100%; margin-bottom: 10px;" id="check_title_project" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;This project already exist</span>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="project_desc">Description</label>
                            <textarea name="project_desc" id="project_desc" class="form-control form-control-default" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px;" id="save_project_modal" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully added the project</div>
                </div>
            <div class="modal-footer">
                <input type="hidden" name="user_added_id" id="user_added_id" value="<?php print($user->id)?>">
                <div style="display: none; margin-bottom: 10px;" id="check_empty_project" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must not be empty</div>
                <button type="button" class="btn btn-success btn-lg pull-left" id="addproject_btn">Create</button>
                <button type="button" class="btn btn-default btn-lg" id="close-project-create" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addproject_moda -->
<!--Create task for project modal window-->
<div class="modal white-modal" id="addtask_pr_modal" tabindex="-1" role="dialog" aria-labelledby="addtask_pr_formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'addtask_pr_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" aria-hidden="true"><span class="icon-remove"></span></a>
                <h4 class="modal-title">
                    <small>Add task</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="task_pr_title">Task name</label>
                            <input type="text" name="task_pr_title" id="task_pr_title" class="form-control form-control-default" placeholder="Task name title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="task_pr_desc">Description</label>
                            <textarea name="task_pr_desc" id="task_pr_desc" class="form-control form-control-default" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="choose_project_modal">Choose project</label>
                            <select class="form-control selectpicker form-control-default" id="choose_project_modal" name="choose_project_modal">

                                <?php foreach ($projects as $pk=>$pv): ?>
                                    <?php if ($projects_froze[$pv['pid']] == 0): ?>
                                        <option value="<?php print($pv['pid']); ?>" ><?php print(ucfirst($pv['title'])); ?></option>
                                    <?php endif ?>
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
                                   <input type='text' class="form-control form-control-default"  id='dueto_modal' />
                               </div>
                       </div>
                   </div>
               </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="form-group">
                            <label for="task_type_choose">Label</label>
                            <select class="form-control form-control-default selectpicker" id="task_type_choose" name="task_type_choose">
                                <?php foreach ($task_types as $tk=>$tv): ?>
                                        <option value="<?php print($tk); ?>" ><?php print(ucfirst($tv)); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="task_priority_choose">Priority</label>
                            <select class="form-control form-control-default selectpicker" id="task_priority_choose" name="task_priority_choose">
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
                                <select class="form-control form-control-default selectpicker" id="implementor_choose_modal" name="implementor_choose_modal">
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
                <input type="hidden" name="user_added_task_pr_id" id="user_added_task_pr_id" value="<?php print($user->id)?>">
                <div style="display: none; margin-bottom: 10px;" id="check_empty_task_pr" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                <button type="button" class="btn btn-success btn-lg pull-left <?php if ($imps == false): ?>disabled<?php endif ?>" id="addtask_pr_btn">Add task</button>
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addtask_pr_modal -->
<!--Update task for project modal window-->
<div class="modal white-modal" id="edit-task-modal" tabindex="-1" role="dialog" aria-labelledby="edit-task-modal-formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-ajax-edit">

        </div>
    </div>
</div> <!-- #/edittask_pr_modal -->
<!--Demo modal window-->
<div class="modal" id="demo_modal" tabindex="-1" role="dialog" aria-labelledby="demo_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'addproject_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content">
            <div class="modal-body">
                <p style="text-align: center; font-size: 18px; padding-top: 20px;">You have a <b>DEMO</b> account.</br> Some options are disabled.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/demo_modal -->

<!--Froze project modal window-->
<div class="modal white-modal" id="froze-project-modal" tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static"  aria-labelledby="froze-project-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <div class="row">
                <h4 style="text-align:center; padding-bottom: 40px;">Are you sure to froze the project ?!</h4>
            </div>

                <div style="margin-bottom: 10px; float: left; width: 100%; position: relative; top: -43px;" class="label label-danger label-signin" id="hide_return_process"><i class="fa fa-exclamation-circle"></i>&nbsp;<span id="return_process_false">
                </span></div>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <h4>Important!</h4>
                            <p><i class="fa fa-info-circle"></i>When you froze the project, all tasks moves to archive and tasks will be invisible when manager or administrator unfreeze them, and all users is no longer will be assigned to this project</p>
                            <p style="padding-bottom: 20px;"><i class="fa fa-info-circle"></i>All members will get notifications by email</p>
                            <p>
                                <button type="button" class="btn btn-danger froze-btn-project">Froze project</button>
                                <button type="button" class="btn btn-default pull-right froze-btn-cancel" data-dismiss="modal">Cancel</button>
                            </p>
                        </div>
            </div>
        </div>

    </div>
</div> <!-- #/froze_modal -->
<!--Unfroze project modal window-->
<div class="modal white-modal" id="unfroze-project-modal" tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static"
     aria-labelledby="unfroze-project-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <h4 style="text-align:center; padding-bottom: 40px;">Are you sure to unfroze the project ?!</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary unfroze-btn-project pull-left">Unfroze project</button>
                <button type="button" class="btn btn-default pull-right unfroze-btn-cancel" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div> <!-- #/froze_modal -->


<!--Froze project modal window-->
<div class="modal white-modal" id="remove-user-project-modal" tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static"  aria-labelledby="remove-user-project-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <h4 style="text-align:center; padding-bottom: 40px;">Are you sure to unsign user from the project ?!</h4>
                </div>
                <div style="margin-bottom: 10px; float: left; width: 100%; position: relative; top: -43px;" class="label label-success label-signin" id="user-remove-project-note"><i class="fa fa-exclamation-circle"></i>&nbsp;<span id="return_process_false">
                </span></div>

                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <h4>Important!</h4>
                    <p><i class="fa fa-info-circle"></i>If user will unsigned form the project, all tasks assigned to him get status "Aprrove"</p>
                    <p style="padding-bottom: 20px;"><i class="fa fa-info-circle"></i>User will get notification by email</p>
                    <p>
                        <button type="button" class="btn btn-danger unsign-user-btn-project">Unsign user</button>
                        <button type="button" class="btn btn-default pull-right unsign-user-btn-project-cancel" data-dismiss="modal">Cancel</button>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div> <!-- #/froze_modal -->


<!-- Modal -->
<div class="modal fade white-modal" id="update-user-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" aria-hidden="true"><span class="icon-remove"></span></a>
                <h4 class="modal-title">
                    <small>Update role</small>
                </h4>
            </div>
            <div class="modal-body">
                <?php $attributes = array('class' => 'form-signin', 'id' => 'update-user-form', 'autocomplete' => 'on'); ?>
                <?php echo form_open('#', $attributes); ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <select class="form-control selectpicker form-control-default" id="update-role-user-select"  name="category" data-style="btn-info">
                                <?php foreach ($roles as $rk => $rv): ?>
                                    <option value="<?php print($rv['rid']); ?>"><?php print(ucfirst($rv['title'])); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <div style="display: none; margin-bottom: 10px;" id="update-user-notificate" class="label label-info label-signin col-md-12"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully updated role</div>
                <button type="button" class="btn btn-success pull-left btn-lg" id="update-user-send-btn">Update</button>
            </div>
        </div>
    </div>
</div> <!-- #/myModal -->
<div class="modal" id="view_task_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="view_task_modalLabel" aria-hidden="true">
    <div class="modal-dialog" id="modal-ajax-view">
    </div>
</div> <!-- #/addproject_moda -->

<!--</div> <!-- #/task_details_modal -->-->
