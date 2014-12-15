<div class="qm-body">
    <div class="qm-header"><span>New Comment</span><span class="pull-right close-qm"><i class="fa fa-times"></i></span></div>
    <div class="quick-message">
        <?php $attributes = array('class' => 'quick-message-form form-horizontal', 'id' => 'qm-form'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="form-group qm" style="border-bottom:1px solid #ddd;">
            <label for="qm-autocomplete" class="col-md-2 control-label">To</label>
            <div class="col-md-10">
                <input type="text" class="form-control qm" id="qm-autocomplete">
            </div>
        </div>
        <div class="form-group qm" style="border-bottom:1px solid #ddd;">
            <label for="qm-subject-field" class="col-md-2 control-label">Subject</label>
            <div class="col-md-10">
                <input type="text" class="form-control qm" id="qm-subject-field">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="qm-text" id="qm-text" class="form-control qm" rows="14" style="padding-left: 15px;"></textarea>
                </div>
                </div>
            </div>
        <div class="bottom-panel-qm">
            <input type="hidden" id="user_qm_id" name="user_qm_id" value="" class="form-control"/>
            <a href="#" class="btn btn-primary" id="qm-send-btn">Comment</a>
            <a href="#" class="btn btn-default" id="qm-clear-form-btn">Clear</a>
            <a href="#" id="qm-link-file-btn"><i class="fa fa-link"></i></a>
        </div>
        </div>


        <?php form_close( );?>
</div>
</div>