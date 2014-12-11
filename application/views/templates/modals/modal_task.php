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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="task_log_title">Choose task</label>
                            <select class="form-control selectpicker" id="task_log_title" name="category">
                                <option>ECL_113</option>
                                <option>ECL_115</option>
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
               </div>
            <div class="modal-footer" style="padding-top: 10px;">
                <div class="form-group">
                    <button type="button" class="btn btn-success" id="addtask_pr_btn">Log task</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addtask_pr_modal -->