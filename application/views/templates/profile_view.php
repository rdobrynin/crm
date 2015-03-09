<div class="errors alert alert-danger alert-dismissible" role="alert"><?php echo validation_errors(); ?></div>
<?php include('navtop_view.php'); ?>
<?php include('sidebar_view.php'); ?>
<!-- Page content -->
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row-fluid">
            <!--FORM-->
            <div class="col-md-8">
        <div class="row">
            <?php echo $this->session->flashdata('success_update_profile'); ?>
        </div>
                <form role="form" class="form-horizontal" action="<?php print(base_url()); ?>update_profile" method="POST" autocomplete="on">
                    <div class="row">
                        <div class="address-wrapper" style="height: 100%;">
                            <p class="lead"><?php print(lang('req_info'))?></p>
<!--NAME-->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="first_name"><?php print(lang('first_name'))?></label>
                                    <input type="text" value="<?php print($user->first_name); ?>" class="form-control" name="first_name" id="first_name" placeholder="First name">
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" ><?php print(lang('last_name'))?></label>
                                    <input type="text" value="<?php print($user->last_name); ?>" class="form-control" name="last_name" id="last_name" placeholder="Last name">
                                </div>
                            </div>

<!--PASSWORD-->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="password-profile"><?php print(lang('new_password'))?></label>
                                    <input type="text" value="" class="form-control" name="password" id="passworde" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <label for="password-profile-confirm" ><?php print(lang('password_confirm'))?></label>
                                    <input type="text" value="" class="form-control" name="password2" id="password2" placeholder="Password confirm">
                                </div>
                            </div>
<!--PHONE-->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="phone"><?php print(lang('phone'))?></label>
                                    <input type="text" value="<?php print($user->phone); ?>" class="form-control" name="phone" id="basic_phone" placeholder="Phone number">
                                </div>
                                <!--                additional phones-->
                                <div class="form-group">
                                    <div class="col-md-12" style="padding-left: 20px;">
                                        <?php foreach ($phones as $k => $phone): ?>
                                            <?php if (isset($phone['phone'])): ?>
                                                <span><input type="hidden" name="<?php print($phone['id']); ?>">
                        <span class="label label-default label-tag delete-add-phone" style="margin-left: 10px;"><span class="get_old_phone"><i class="fa fa-phone"></i>&nbsp;<?php print($phone['phone']); ?></span>
&nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i></span></span>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="delete_phone_data"></div>
                            </div>
<!--ADD PHONE-->
                            <div class="form-group">
                            <div class="col-md-12" style="margin-bottom: 10px;">
                                <div class="btn btn-xs btn-success" id="add_phone"><?php print(lang('add_phone'))?></div>
                            </div>
                                <div id="items_phone"></div>
                                <div id="items_remove_phone"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6" style="margin-bottom: 10px;">
                                    <p><span class="label label-primary"><?php print(lang('prim_email'))?> :</span>  <span><span class="lead">&nbsp;<?php print($user->email); ?></span></span></p>
                                    </div>
<!--ADD EMAIL-->
                                <div class="form-group">
                                    <div class="col-md-12" style="padding-left: 20px;">
                                        <?php foreach ($emails as $k => $email): ?>
                                            <?php if (isset($email['email'])): ?>
                                                <span><input type="hidden" name="<?php print($email['id']); ?>">
                        <span class="label label-default label-tag delete-add-email" style="margin-left: 10px;"><i class="fa fa-mail"></i>&nbsp;<span class="get_old_mail"><?php print($email['email']); ?></span>
                            &nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i></span></span>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="delete_email_data"></div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <div class="btn btn-xs btn-success" id="add_email"><?php print(lang('add_email'))?></div>
                                </div>
                                <div id="items_email"></div>
                                <div id="items_remove_email"></div>
                                <span id="check_email_profile"></span>
                            </div>

                            <input type="hidden" value="<?php print($user->role); ?>" name="role-select" id="role-select">
                        </div>
<!--ADD INFO-->
                        <div class="address-wrapper" style="height: 100%;">
                            <p class="lead"><?php print(lang('add_info'))?></p>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="skype_address">Skype</label>
                                    <input type="text" value="<?php print($user->skype_address); ?>" class="form-control" id="skype_address" name="skype_address" placeholder="Skype address">

                            </div>
                                <div class="col-md-6">
                                    <label for="facebook_address">Facebook</label>
                                    <input type="text" value="<?php print($user->facebook_address); ?>" class="form-control" id="facebook_address" name="facebook_address" placeholder="Facebook address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="linkedin_address">Linkedin</label>
                                    <input type="text" value="<?php print($user->linkedin_address); ?>" class="form-control" id="linkedin_address" name="linkedin_address" placeholder="Linkedin address">
                                </div>
                            </div>
                        </div>
                        <div class="pull-left"><a href="javascript:history.back()" class="btn btn-primary"><?php print(lang('back'))?></a></div>
                        <input type="hidden" value="<?php print(time()); ?>" name="date_edited">
                        <button type="submit" id="profile-update-btn" class="btn btn-primary pull-right"><?php print(lang('submit'))?></button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="address-wrapper" style="height: 100%;">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="" id="upload_file">
                                <label for="userfile"><?php print(lang('upload'))?></label>
                                <input type="file" name="userfile" id="userfile" size="20"/>
                                <input type="hidden" value="<?php print($user->id); ?>" name="user_id" id="user_id">
                                <br/>
                                <input type="submit" class="btn btn-info" name="<?php print(lang('submit'))?>" id="submit"/>
                            </form>
                            <?php if ($avatar != FALSE): ?>
                                <div id="avatar-true">
                                <div class="avatar-wrapper pull-right" ><img src="<?php print base_url().'uploads/avatar/'.($avatar); ?>" height="100">
                                </div>
                                </div>
                                <?php else: ?>
                                <div id="avatar-true">
                                    <div class="avatar-wrapper pull-right" ><img src="<?php print base_url().'uploads/avatar/placeholder_user.jpg'; ?>" height="100">
                                    </div>
                                </div>
                            <?php endif ?>
                                <div id="avatar-true-ajax">
                                    <span id="ajax-temp" class="avatar-wrapper pull-right"></span>
                                </div>

                            <div id="files"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php'); ?>
