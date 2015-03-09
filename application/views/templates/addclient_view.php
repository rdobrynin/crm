<div class="errors alert alert-danger alert-dismissible" role="alert"><?php echo validation_errors();?></div>
<?php include('navtop_view.php');?>
<?php include('sidebar_view.php');?>
<!-- Page content -->
<div class="page-content-wrapper">
  <div class="page-content inset">
    <div class="row">
<!--FORM-->
      <div class="col-md-8">
        <h2>Add client</h2>
          <?php $attributes = array('class' => 'form-horizontal', 'id' => 'add-clientForm', 'autocomplete'=>'off'); ?>
          <?php  echo form_open('addclient_form', $attributes);?>
      <div class="address-wrapper" style="height: 100%;">
                  <p class="lead">add requirement data for company profile</p>
                <div class="form-group">
                  <label class="col-sm-12" for="client_title">Company<span class="req">*</span></label>
                  <div class="col-sm-5"><input type="text" class="form-control" name="title" id="client_title" placeholder="Company title here">
                      <span id="check_client" class="label label-danger"></span></div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12" for="client_description">Company description</label>
                  <div class="col-sm-12"><textarea rows="4" cols="50" class="form-control" name="description"  id="client_description"></textarea></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12" for="client_email">Email<span class="req">*</span></label>
                  <div class="col-sm-6"><input type="text" class="form-control" name="email"  id="client_email" placeholder="Email address here">
                      <span id="check_email" class="label label-danger"></span></div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-12" for="client_url">URL</label>
                  <div class="col-sm-6"><input type="text" class="form-control" name="url"  id="client_url" placeholder="Site url"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Phone<span class="req">*</span></label>
                  <div class="col-sm-4"><input type="text" class="form-control" name="phone" id="client_phone" placeholder="Phone number here"></div>
                  <div class="col-md-1" style="margin-bottom: 10px;">
                    <div class="btn btn-xs btn-success" id="add_phone_client">Add Phone</div>
                  </div>
                </div>
                <div id="items_phone_client"></div>
                  </div>
<!--                REGIONAL INFO-->
              <div class="address-wrapper" style="height: 100%;">
                <p class="lead">Regional information</p>
                <div class="form-group">
                  <label class="col-sm-8">Address<span class="req">*</span></label>
                  <label class="col-sm-4">Index</label>
                  <div class="col-sm-8"><input type="text" class="form-control" name="address"  id="client_address" placeholder="Address here"></div>
                  <div class="col-sm-4"><input type="text" class="form-control" name="index"  id="client_index" placeholder="Index here"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6">City<span class="req">*</span></label>
                  <label class="col-sm-6">Country<span class="req">*</span></label>
                  <div class="col-sm-6"><input type="text" class="form-control" name="city"  id="client_city" placeholder="City here"></div>
                  <div class="col-sm-6">
                    <select id="select-country" name="country" class="form-control selectpicker">
                      <?php  $countries = get_countries(); ?>
                      <?php  foreach($countries as $ck => $cv): ?>
                        <?php if ($ck == 'EE'): ?>
                          <option selected="selected" value="<?php  print($cv); ?>"><?php  print($cv); ?></option>
                        <?php endif ?>
                        <option value="<?php  print($cv); ?>"><?php  print($cv); ?></option>
                      <?php  endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
                <div id="contact_form">
                </div>
                <hr>
                <input type="hidden" class="form-control" id="client_owner" name="curator" value="<?php print($user->id);?>">

                <span class="pull-left" ><a href="javascript:history.back()"  class="btn btn-default">Back</a></span>
                <input type="submit"  class="btn btn-default pull-right" id="create_company" value="Create company">
          <?php echo form_close(); ?>
            </div>
      <div class="col-md-4 jumbotron-resp">
        <div class="jumbotron">
          <h2>Start your productivity here</h2>
          <p>You can read technical documentation here</p>
          <p><a href="javascript:void(0);" class="btn btn-primary">Learn More&nbsp;&nbsp;<i class="fa fa-caret-right" style="padding-top: 2px; position: absolute;"></i></a>
          </p>
        </div>
      </div>
<!--      FORM-->
    </div>
  </div>
</div>
</div>
<?php include('footer_view.php');?>
