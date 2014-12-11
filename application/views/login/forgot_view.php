  <div class="container" id="main_login" style="display: block;">
      <?php $attributes = array('class' => 'form-signin', 'id' => 'forgotform', 'autocomplete'=>'off'); ?>
      <?php  echo form_open('forgot', $attributes);?>
      <div class="errors ">
        <?php echo validation_errors();?></div>
      <center><h2 class="text-muted">Forgot password ?</h2><small class="text-muted">Find your account</small></center><br>
<div id="avatar-login-forgot"> <img src="img/question.png" alt="Smiley face" height="100"></div>
      <input type="text" id="email"  name="email" class="form-control" placeholder="Email" />
      <div style="margin-top:20px;"><button type="submit" class="btn btn-lg btn-primary btn-block" id="login_btn">Email new password</button></div>
<div style="padding-bottom: 20px;">
  <small class="pull-left">
    <center><br><a href="signup" id="show_activate_form">Sign up</a>
    </center>
  </small>
  <small class="pull-right">
    <center><br><a href="admin" id="show_activate_form">Login</a>
    </center>
  </small>
</div>
      <?php echo form_close(); ?>
  </div>
