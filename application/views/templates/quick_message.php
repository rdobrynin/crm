<div class="qm-body">
    <div class="qm-header"><span>New Comment</span><span class="pull-right close-qm"><i class="fa fa-times"></i></span></div>
    <div class="quick-message">
        <?php $attributes = array('class' => 'quick-message-form form-horizontal', 'id' => 'qm-form', 'autocomplete' => 'off'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="form-group qm" style="border-bottom:1px solid #ddd;">
            <label for="inputType" class="col-md-2 control-label">To</label>
            <div class="col-md-10">
                <input type="text" class="form-control qm" id="inputType">
            </div>
        </div>
        <div class="form-group qm" style="border-bottom:1px solid #ddd;">
            <label for="inputType" class="col-md-2 control-label">Subject</label>
            <div class="col-md-10">
                <input type="text" class="form-control qm" id="inputType">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="project_desc" id="qm-text" class="form-control qm" rows="14" style="padding-left: 15px;"></textarea>
                </div>
                </div>
            </div>
        </div>

        <?php form_close( );?>
</div>
</div>
