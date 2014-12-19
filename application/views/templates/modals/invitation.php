<!-- Modal -->
<div class="modal fade" id="invite" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-inverse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close-time">×</span></button>
                <h4 class="modal-title">
                    <small>Contact person invitaion</small>
                </h4>
            </div>
            <div class="modal-body">
                <?php $attributes = array('class' => 'form-signin', 'id' => 'invite-form', 'autocomplete' => 'on'); ?>
<?php echo form_open('#', $attributes); ?>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <input type="text" name="first_name" id="first_name_invite" class="form-control" placeholder="First Name">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <input type="text" name="last_name" id="last_name_invite" class="form-control" placeholder="Last Name">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="email" name="email" id="email_invite" class="form-control" placeholder="Email Address">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <select class="form-control selectpicker"  name="category" data-style="btn-info">
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
    <button type="button" class="btn btn-brilliant btn-xs pull-right" id="invite-ajax-btn">Invite</button>
</div>
</div>
</div>
</div> <!-- #/myModal -->