<div class="form-group">
    <label for="implementor_choose_modal">Choose implementor: </label>
    <?php if ($imps != false): ?>
        <select class="form-control form-control-default selectpicker" id="implementor_choose_modal" name="implementor_choose_modal">
            <?php foreach ($imps as $k => $v): ?>
                <option value="<?php echo $v->id ?>"><?php echo $v->first_name . ' ' . $v->last_name ?></option>
            <?php endforeach ?>
        </select>
    <?php else: ?>
        <div style="display: block; margin-bottom: 10px;" id="no_imps_modal" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;No one implementors found.&nbsp;&nbsp;<span class="btn btn-xs btn-primary pull-right" id="btn_modal_miss_imp" style="position:relative;top:4px;">Invite first</span></div>
    <?php endif ?>
</div>
