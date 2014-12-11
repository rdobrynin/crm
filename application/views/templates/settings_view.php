<div class="modal" id="settings">
  <div class="modal-dialog" id="settings-dialog-modal">

    <div class="modal-content modal-content-inverse" id="settings-content-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading"><i class="fa fa-gear"></i>&nbsp;Settings</h4>
      </div>
      <div class="modal-body">
         <form role="form" id="settings_form_help">
         <div class="well">
             <fieldset class="scheduler-border">
                 <legend class="scheduler-border">Help panel</legend>
             <div class="row-fluid">
                 <div class="col-md-12" style="padding-left: 0">
                     <div class="form-group">
                         <label for="help_block">Switch help panel </label>
                         <input type="checkbox" name="help_block" id="help_block" <?php if($user[0]["helpblock"]==1):?> value="0" checked="checked" <?php else: ?>value="1"<?php endif?> />
                     </div>
                 </div>
                 <button type="button" class="btn btn-success" id="save_helpblock">Save</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
             </fieldset>
         </div>
         </form>
          <?php if ($task_types != false AND $user[0]['role'] ==5 OR $user[0]['role']==4): ?>
          <form role="form" id="settings_form_ttp">
              <div class="well">
                  <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Task category</legend>
                  <?php foreach ($task_types as $tk => $tv): ?>
                  <div class="row-fluid">
                      <div class="col-md-8" style="padding-left: 0">
                          <div class="form-group">
                              <input type="text" class="form-control btn-special" id="ttp_<?php print($tv['id']) ?>_input" value="<?php print($tv['title']) ?>"/>
                          </div>
                          <div style="display: none; margin-bottom: 10px;" id="check_empty_ttp_<?php print($tv['id']) ?>_input" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                      </div>
                      <div class="col-md-2" style="padding-left: 0">
                          <div class="form-group">
                           <a href="#" class="btn btn-primary btn-update-ttp"  id="ttp_<?php print($tv['id']) ?>">apply</a>
                          </div>
                      </div>
                      <?php endforeach ?>
                  </div>
                  <div class="row-fluid">
                      <div class="col-md-12" style="padding-left: 0">
                          <div style="display: none; margin-bottom: 10px;" id="check_empty_ttp" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                      </div>
                  </div>
                  </fieldset>
              </div>
          </form>
          <?php endif ?>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location = '<?php print(site_url()) ?>';">Save settings</button>
      </div>
    </div>

  </div>
</div>

