<div class="modal" id="invite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'invite-form', 'autocomplete' => 'off'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
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
                                        <option value="<?php print($rv['rid']); ?>"><?php print(ucfirst($rv['title'])); ?></option>
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
<div class="modal" id="addproject_modal" tabindex="-1" role="dialog" aria-labelledby="addproject_formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'addproject_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
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
                            <input type="text" name="project_title" id="project_title" class="form-control btn-special" placeholder="Project title">
                        </div>

                        <span style="display:none;float: left; width: 100%; margin-bottom: 10px;" id="check_title_project" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;This project already exist</span>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="project_desc">Description</label>
                            <textarea name="project_desc" id="project_desc" class="form-control btn-special" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px;" id="save_project_modal" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully added the project</div>
                </div>
            <div class="modal-footer">
                <input type="hidden" name="user_added_id" id="user_added_id" value="<?php print($user[0]['id'])?>">
                <div style="display: none; margin-bottom: 10px;" id="check_empty_project" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must not be empty</div>
                <button type="button" class="btn btn-success" id="addproject_btn">Create</button>
<!--                <button type="button" class="btn btn-success" id="addproject_addtask_btn">Save & create task</button>-->
                <button type="button" class="btn btn-default" id="close-project-create" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addproject_moda -->

<!--Create task for project modal window-->
<div class="modal" id="addtask_pr_modal" tabindex="-1" role="dialog" aria-labelledby="addtask_pr_formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'addtask_pr_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
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
                            <input type="text" name="task_pr_title" id="task_pr_title" class="form-control btn-special" placeholder="Task name title">
                        </div>
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
                                        <option value="<?php print($tk); ?>" ><?php print(ucfirst($tv)); ?></option>
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





<!--Update task for project modal window-->
<div class="modal" id="edit-task-modal" tabindex="-1" role="dialog" aria-labelledby="edit-task-modal-formLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'edit_task_pr_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <a data-dismiss="modal" id="close-edit-task-modal" aria-hidden="true"><span class="icon-remove"></span></a>
                <h4 class="modal-title">
                    <small>Update task</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="edit_task_pr_title">Task name</label>
                            <input type="text" name="edit_task_pr_title" id="edit_task_pr_title" class="form-control btn-special" placeholder="Task name title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="edit_task_pr_desc">Description</label>
                            <textarea name="edit_task_pr_desc" id="edit_task_pr_desc" class="form-control btn-special" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="edit_dueto_modal">Due to</label>
                            <div class='input-group date'>
                                <input type='text' class="form-control btn-special"  id='edit_dueto_modal' />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="form-group">
                            <label for="edit_task_type_choose">Label</label>
                            <select class="form-control selectpicker" id="edit_task_type_choose" name="edit_task_type_choose">
                                <?php foreach ($task_types as $tk=>$tv): ?>
                                    <option value="<?php print($tk); ?>" ><?php print(ucfirst($tv)); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="task_priority_choose">Priority</label>
                            <select class="form-control selectpicker" id="edit_task_priority_choose" name="edit_task_priority_choose">
                                <option value="0" data-content="<span class='label label-xs label-primary'><?php echo priority_status_index(0) ?></span>"></option>
                                <option value="1" data-content="<span class='label label-xs label-warning'><?php echo priority_status_index(1) ?></span>"></option>
                                <option value="2" data-content="<span class='label label-xs label-danger'><?php echo priority_status_index(2) ?></span>"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="edit_curator_choose_modal">Reassign curator: </label>
                            <select class="form-control selectpicker" id="edit_curator_choose_modal" name="edit_curator_choose_modal">
                                <?php foreach ($curators as $k => $v): ?>
                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['first_name'] . ' ' . $v['last_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="edit_implementor_choose_modal">Assign implementor: </label>
                                <select class="form-control selectpicker" id="edit_implementor_choose_modal" name="edit_implementor_choose_modal">
                                    <?php foreach ($imps as $k => $v): ?>
                                        <option value="<?php echo $v['id'] ?>"><?php echo $v['first_name'] . ' ' . $v['last_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                        </div>
                    </div>
                </div>
                <div style="display: none; margin-bottom: 10px;" id="edit_task_pr_modal" class="label label-primary label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;You have successfully updatedthe task</div>
                <div style="display: none; margin-bottom: 10px;" id="edit_error_task_pr_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Error to update task</div>
            </div>
            <div class="modal-footer" style="padding-top: 10px;">
                <div class="form-group">
                    <input type="hidden" name="user_edit_task_pr_id" id="user_edit_task_pr_id" value="<?php print($user[0]['id'])?>">
                    <div style="display: none; margin-bottom: 10px;" id="check_empty_edit_task_pr" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                    <button type="button" class="btn btn-success <?php if ($imps == false): ?>disabled<?php endif ?>" id="edittask_pr_btn">Update the task</button>
                    <button type="button" class="btn btn-default" id="close-button-edit-task-modal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/edittask_pr_modal -->

<!--Create project modal window-->
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
</div> <!-- #/addproject_moda -->

<!-- Modal -->
<div class="modal fade" id="update-user-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-inverse">
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
                            <select class="form-control selectpicker" id="update-role-user-select"  name="category" data-style="btn-info">
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
                <button type="button" class="btn btn-success pull-right" id="update-user-send-btn">Update</button>
            </div>
        </div>
    </div>
</div> <!-- #/myModal -->



<div class="modal" id="view_task_modal" tabindex="-1" role="dialog" aria-labelledby="view_task_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-view-title"></h4>
            </div>
            <div class="modal-body" id="modal-view-body">

            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-default" style="width: 100%">Close</a>
            </div>
        </div>
    </div>
</div> <!-- #/addproject_moda -->


<div class="modal" id="view_detail_task_modal" tabindex="-1" role="dialog" aria-labelledby="view_detail_task_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-7 view-modal-left">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Title:</label>
                            <div class="col-lg-9">
                                <input class="form-control" value="Jane" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description:</label>
                            <div class="col-md-9">
                                <textarea class="form-control" row="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_dueto_modal">Due to</label>
                            <div class='date col-md-6'>
                                <input type='text' class="form-control"  id='edit_dueto_modal' />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Label:</label>
                            <div class="col-lg-9">
                                <div class="ui-select">
                                    <select id="user_time_zone" class="form-control">
                                        <option value="" selected="selected">Bug</option>
                                        <option value="">Story</option>
                                        <option value="">Analysis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Priority:</label>
                            <div class="col-lg-9">
                                <div class="ui-select">
                                    <select id="user_time_zone" class="form-control">
                                        <option value="" selected="selected">Minor</option>
                                        <option value="">Major</option>
                                        <option value="">Critical</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Reassign Curator:</label>
                            <div class="col-lg-9">
                                <div class="ui-select">
                                    <select id="user_time_zone" class="form-control">
                                        <option value="" selected="selected">Garry Koort</option>
                                        <option value="">Ken Koort</option>
                                        <option value="">First name Lastname</option>
                                    </select>
                                </div>
                            </div>
                        </div>

</form>

                </div>
                <div class="col-md-5 view-modal-right">
                    <div class="row">
                        <div class="search-form-sidebar" style="float: right !important;"><input type="text" id="search-sidebar-users" class=" form-control lights" placeholder="live search"></div>
                    </div>
                    <div class="panel">
                        <div class="panel-body comment" style="padding: 0">

                            <div tabindex="0" style="max-height: 551px; overflow: auto;">

                                <div class="sub-activity search-filter-comment">
                                    <div class="activity-item-summary">
                                        <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="javascript:void(0);"><img src="http://crm.brilliant-solutions.eu/uploads/avatar/placeholder_user.jpg" height="45" class="mCS_img_loaded"></a>
                                </span>
                                        </div>
                                        <a href="javascript:void(0);" class="activity-item-user activity-item-author" target="_parent" onclick="qmSendComment(46)">
                                            David S...</a>
                                        &nbsp;<span class="label label-warning label-xs">subject</span>&nbsp;
                                        <a href="javascript:void(0);" target="_parent" onclick="qmSubjectSendComment('чат','46')"><span class="resolved-link">чат</span></a>

                                        <div class="com-last-text">не закрывается сучье окно чата</div>
                                        <div class="activity-item-description">
                                            <div class="activity-item-info">
                                                <i class="fa fa-clock-o clock-activity"></i>
                                                <span class="timestamp">2 months</span>&nbsp;
                                                <span class="activity-item-action"><a href="javascript:void(0);" class="activity-item-comment-link" onclick="qmSendComment(46)">Comment</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                end activity-->
                                <div class="sub-activity search-filter-comment">
                                    <div class="activity-item-summary">
                                        <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="javascript:void(0);"><img src="http://crm.brilliant-solutions.eu/uploads/avatar/placeholder_user.jpg" height="45" class="mCS_img_loaded"></a>
                                </span>
                                        </div>
                                        <a href="javascript:void(0);" class="activity-item-user activity-item-author" target="_parent" onclick="qmSendComment(46)">
                                            David S...</a>
                                        &nbsp;<span class="label label-warning label-xs">subject</span>&nbsp;
                                        <a href="javascript:void(0);" target="_parent" onclick="qmSubjectSendComment('чат','46')"><span class="resolved-link">чат</span></a>

                                        <div class="com-last-text">не закрывается сучье окно чата</div>
                                        <div class="activity-item-description">
                                            <div class="activity-item-info">
                                                <i class="fa fa-clock-o clock-activity"></i>
                                                <span class="timestamp">2 months</span>&nbsp;
                                                <span class="activity-item-action"><a href="javascript:void(0);" class="activity-item-comment-link" onclick="qmSendComment(46)">Comment</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                                end activity-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            end row-->
              <div class="row">
                  <div class="col-md-7 view-modal-left">
                      <a href="#" data-dismiss="modal" class="btn btn-default pull-right send-comment">Close</a>

                  </div>
                  <div class="col-md-5 view-modal-right">
                      <form class="form-inline">
                          <div class="form-group">
                              <textarea class="form-control" id="input-task-comment" cols="30" rows="2"></textarea>
                          </div>
                          <button type="submit" class="btn btn-default pull-right send-comment"><i class="fa fa-paper-plane"></i></button>
                      </form>
                  </div>
              </div>



        </div>
    </div>
</div> <!-- #/addproject_moda -->
<script type="text/javascript">

    $(function () {
//        $('#view_detail_task_modal').modal('show');
        $('#dueto_modal').datetimepicker({
            theme:'dark',
            minDate: '<?php date("F j, Y, g:i a"); ?>',
            minTime:0
        });
        $('#btn_modal_miss_imp').click(function () {
            $('#addtask_pr_modal').modal('hide');
            $('#invite').modal('show');
        });
    });
</script>
