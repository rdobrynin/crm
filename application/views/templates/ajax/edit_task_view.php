<!--AJAX HTML GET METHODS-->
<div class="modal-header">
    <h2 class="modal-title">Update task&nbsp;#<?php print($task->id); ?></h2>
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
        <a href="#" class="btn btn-success btn-lg pull-left" data-id="<?php print($task->id)?>" id="edittask_pr_btn">Update task</a>
        <a href="#" class="btn btn-default btn-lg pull-right" id="close-form-edit-task">Close</a>
        <a href="#" class="btn btn-primary btn-lg pull-right"  data-id="<?php print($task->id)?>" id="clear-form-edit-task">Restore</a>
    </div>
</div>