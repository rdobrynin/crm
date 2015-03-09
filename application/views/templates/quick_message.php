<div class="qm-body">
    <div class="qm-header"><span>New Comment</span><span class="pull-right close-qm"><span class="icon-remove"></span></span></div>
    <div class="quick-message">
        <?php $attributes = array('class' => 'quick-message-form form-horizontal', 'id' => 'qm-form'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="form-group qm" style="border-bottom:1px solid #ddd;height: 38px;">
            <label for="qm-autocomplete" class="col-md-2 control-label">To</label>
            <div class="col-md-10">
                <input type="text" class="form-control qm" placeholder="Search..." id="qm-autocomplete">
                <span class="label label-default label" id="qm-point-name"></span>
                <span class="label label-default label-tag point-name-tag" style="position: absolute;
top: 4px;"><span class="get_old_mail" id="qm-point-name"></span>&nbsp;&nbsp;&nbsp;<i class="fa fa-times" id="qm-close-point-name"></i></span>
            </div>
        </div>
        <div class="form-group qm">
            <label for="qm-subject-field" class="col-md-2 control-label">Subject</label>
            <div class="col-md-10">
                <input type="text" class="form-control qm" id="qm-subject-field">
            </div>
        </div>
        <hr class="qm">
        <div style="display: none; margin-top: 50px;" id="qm-empty-error" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Subject and message field must be filled</div>
        <div style="display: none; margin-top: 50px;" id="qm-result-info" class="label label-primary label-signin"><i class="fa fa-comment"></i>&nbsp;You have successfully added comment</div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="qm-text" id="qm-text" class="form-control qm" rows="14" style="padding-left: 15px;"></textarea>
                </div>
                </div>
            </div>
        <div class="bottom-panel-qm">
            <input type="hidden" id="user_qm_id" name="user_qm_id" value="" class="form-control"/>
            <a href="javascript:void(0);" class="btn btn-primary" id="qm-send-btn">Comment</a>
            <a href="javascript:void(0);" class="btn btn-default" id="qm-clear-form-btn">Clear</a>
            <a href="javascript:void(0);" id="qm-link-file-btn"><i class="fa fa-link"></i></a>
        </div>
        </div>
        <?php form_close( );?>
</div>
</div>