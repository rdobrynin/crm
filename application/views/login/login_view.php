
  <div class="container" id="main_login" style="display: block;">
      <?php $attributes = array('class' => 'form-signin', 'id' => 'myform', 'autocomplete'=>'on'); ?>
      <?php  echo form_open('admin', $attributes);?>
      <?php echo $this->session->flashdata('auth_false'); ?>
      <?php echo $this->session->flashdata('validation'); ?>
<!--      <div class="errors ">-->
<!--        --><?php //echo validation_errors();?><!--</div>-->
      <h2 class="text-muted">Brilliant Management</h2><small class="text-muted center">user athorization</small><br>
<div id="avatar-login"> <img src="<?php print(base_url());?>img/ProfilePlaceholderSuit1.png" alt="Smiley face" height="100"></div>
        <div id="avatar-login-original"> <img src="<?php print(base_url());?>img/ProfilePlaceholderSuit1.png" alt="Smiley face" height="100"></div>
      <input type="text" id="email"  name="email" value="" class="form-control" placeholder="Email" />
      <span id="check_email_login"  class="label label-danger label-signin"></span>
      <input type="password" id="password" name="password" value="" placeholder="Password" class="form-control"/>
      <button class="btn btn-lg btn-primary btn-block" id="login_btn"> <i class="fa fa-check"></i></button>
<div style="padding-bottom: 20px;">
  <small class="pull-left"><br><a href="signup" id="show_activate_form">Sign up</a></small>
  <small class="pull-right">
<br><a href="forgot" id="show_activate_form_login">Forgot password ?</a></small>
</div>
      <?php echo form_close(); ?>
  </div>
