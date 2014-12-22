<!--Create task for project modal window-->
<div class="modal fade" id="task_modal_timer" tabindex="-1" role="dialog" aria-labelledby="task_modal_timerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'task_log_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    <small>Log task</small>
                </h4>
            </div>
            <div class="modal-body">
                <?php if ($tasks != FALSE): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="task_log_title">Choose task</label>
                            <select class="form-control selectpicker" id="task_log_title" name="category">

                                <?php foreach ($tasks as $tk => $tv): ?>
                                    <option value="<?php print($tv['id']); ?>"><?php print($tv['title']); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="form-group">
                            <label for="log_timer">Worked</label>
                                <input type="text" class="form-control btn-special" id="log_timer" name="log_timer"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="task_log_desc">Comment</label>
                            <textarea name="task_pr_desc" id="task_log_desc" class="form-control btn-special" rows="5" placeholder="Comment"></textarea>
                        </div>
                    </div>
                </div>
                <?php else:?>
                    <div style="display: block; margin-bottom: 10px;" id="no_tasks_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;No one tasks found.</div>
                <?php endif ?>

               </div>
            <div class="modal-footer" style="padding-top: 10px;">
                <div class="form-group">
                    <button type="button" class="btn btn-success" id="log_task_btn">Log task</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addtask_pr_modal -->