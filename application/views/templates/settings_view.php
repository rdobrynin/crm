<div class="modal white-modal" id="settings">
  <div class="modal-dialog" id="settings-dialog-modal">

    <div class="modal-content" id="settings-content-modal">
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
                             <input type="hidden" value="<?php print($user->id); ?>" name="user_id_help" id="user_id_help">

                             <div class="toggle-div-help">
                                 <input type="checkbox" id="toggle-help-btn" data-off="OFF" data-on="ON" class="onoff"  <?php if ($user->helpblock == 1): ?> checked  <?php endif ?> data-onstyle="success" data-offstyle="danger" data-toggle="toggle">
                             </div>
                         </div>
                     </div>
             </fieldset>
         </div>
         </form>
          <form role="form" id="settings_form_introduce">
              <div class="well">
                  <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Intro modal</legend>
                      <div class="row-fluid">
                          <div class="col-md-12" style="padding-left: 0">
                              <div class="form-group">
                                  <input type="hidden" value="<?php print($user->id); ?>" name="user_id_dialog" id="user_id_dialog">
                                  <div class="toggle-div-dialog">
                                      <input type="checkbox" id="toggle-dialog-btn" data-off="OFF" data-on="ON"  class="onoff"  <?php if ($user->introduce==0): ?> checked  <?php endif ?> data-onstyle="success" data-offstyle="danger" data-toggle="toggle">
                                  </div>
                              </div>
                  </fieldset>
              </div>
          </form>

          <form role="form" id="settings_form_message">
              <div class="well">
                  <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Message to email</legend>
                      <div class="row-fluid">
                          <div class="col-md-12" style="padding-left: 0">
                              <div class="form-group">
                                  <input type="hidden" value="<?php print($user->id); ?>" name="user_id_message" id="user_id_message">
                                  <div class="toggle-div-message">
                                      <input type="checkbox" id="toggle-message-btn" data-off="OFF" data-on="ON"  class="onoff"  <?php if ($user->message==1): ?> checked  <?php endif ?> data-onstyle="success" data-offstyle="danger" data-toggle="toggle">
                                  </div>
                              </div>
                  </fieldset>
              </div>
          </form>
          <?php if ($task_types != false AND $user->role ==5 OR $user->role==4): ?>
          <form role="form" id="settings_form_ttp">
              <div class="well">
                  <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Task category</legend>
                  <?php foreach ($task_types as $tk => $tv): ?>
                  <div class="row-fluid">
                      <div class="col-md-8" style="padding-left: 0">
                          <div class="form-group">
                              <input type="text" class="form-control form-control-default" id="ttp_<?php print($tk) ?>_input" value="<?php print($tv) ?>"/>
                          </div>
                          <div style="display: none; margin-bottom: 10px;" id="check_empty_ttp_<?php print($tk) ?>_input" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;Fields must be not empty</div>
                      </div>
                      <div class="col-md-2" style="padding-left: 0">
                          <div class="form-group">
                           <a href="javascript:void(0);" class="btn btn-primary btn-update-ttp"  id="ttp_<?php print($tk) ?>">apply</a>
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
          <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="window.location = '<?php print(site_url()) ?>';">Apply categories</button>
      </div>
    </div>

  </div>
</div>

<script>
    $(function () {
        $('.onoff').bootstrapToggle({
            size:'mini'
        });
    });
</script>

