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
                <input type="hidden" class="form-control" id="client_owner" name="curator" value="<?php print($user[0]['id']);?>">

                <span class="pull-left" ><a href="javascript:history.back()"  class="btn btn-default">Back</a></span>
                <input type="submit"  class="btn btn-default pull-right" id="create_company" value="Create company">
          <?php echo form_close(); ?>
            </div>

      <div class="col-md-4 jumbotron-resp">
        <div class="jumbotron">
          <h2>Start your productivity here</h2>
          <p>You can read technical documentation here</p>
          <p><a href="#" class="btn btn-primary">Learn More&nbsp;&nbsp;<i class="fa fa-caret-right" style="padding-top: 2px; position: absolute;"></i></a>
          </p>
        </div>
      </div>
<!--      FORM-->
    </div>
  </div>
</div>
</div>
<?php include('footer_view.php');?>
<script>
  $(function () {
    $('#add_phone_client').click(function () {
      $("#items_phone_client").append('<div class="form-group"><div class="col-sm-4"><input type="text" placeholder="Additional phone number" style="margin-bottom:8px; margin-top: 2px;" class="form-control col-md-4" name="client_phone[]"></div><button  class="btn btn-xs btn-danger delete-phone-client">Delete</button></div></div><div>');
    });
    $("body").on("click", ".delete-phone-client", function (e) {
      $(this).parent("div").remove();
    });


    $('#add_manager_client').click(function () {
      manager_value = $("#select-manager option:selected").val();
      var manager_title = $("#select-manager option:selected").text();
      $('#items_manager_client').append('&nbsp;<span><input type="hidden" name="client_manager[]" value="input_manager_'+ manager_value + '"><div class="label label-default label-tag delete-manager-client" id="delete-manager-client' + manager_value + '">' + manager_title + '&nbsp;<i class="fa fa-times"></i></div></span>');

    });
    $("body").on("click", ".delete-manager-client", function (e) {;
      $(this).parent("span").remove();
    });


    $('#add_curator_client').click(function () {
      curator_value = $("#select-curator option:selected").val();
      var curator_title = $("#select-curator option:selected").text();
      $('#items_curator_client').append('&nbsp;<span><input type="hidden" name="client_curator[]" value="input_curator_'+ curator_value + '"><div class="label label-default label-tag delete-curator-client" id="delete-curator-client' + curator_value + '">' + curator_title + '&nbsp;<i class="fa fa-times"></i></div></span>');

    });
    $("body").on("click", ".delete-curator-client", function (e) {
      $(this).parent("span").remove();
    });


      res = $('.errors').text();
      if(res.length > 0 ) {
        $('.errors').show();
      }
      else {
        $('.errors').hide();
      }

    $('.errors').click(function () {
      $(this).slideToggle("fast");
    });

    $('body').click(function () {
      $('.errors').slideUp( "fast");
    });

//    AJAX CREATE COMPANY
<!--    $('#create_company').click(function () {-->
<!--      var form_data = {-->
<!--        title: $('#client_title').val(),-->
<!--        description: $('#client_description').val(),-->
<!--        email: $('#client_email').val(),-->
<!--        phone: $('#client_phone').val(),-->
<!--        address: $('#client_address').val(),-->
<!--        index: $('#client_index').val(),-->
<!--        url: $('#client_url').val(),-->
<!--        city: $('#client_city').val(),-->
<!--        country: $('#select-country option:selected').val(),-->
<!--        curator: $('#client_owner').val()-->
<!--      };-->
<!--      $.ajax({-->
<!--        url: "--><?php //echo site_url('ajax/addclient'); ?><!--",-->
<!--        type: 'POST',-->
<!--        data: form_data,-->
<!--        dataType: 'json',-->
<!--        success: function (msg) {-->
<!--    if(msg.error==0) {-->
<!--      $('.show-info').show();-->
<!--      $('.show-info').children( ".show-info-content").html(msg.result);-->
<!--      $('.show-info').delay(3500).fadeOut();-->
<!--    }-->
<!--          else if(msg.error==1){-->
<!--      $('.show-info-error').show();-->
<!--      $('.show-info-error').children( ".show-info-content").html(msg.result);-->
<!--      $('.show-info-error').delay(3500).fadeOut();-->
<!--          }-->
<!--        }-->
<!--      });-->
<!--      $(this).closest('form').find("input[type=text], textarea").val("");-->
<!--      });-->

//      Check if title is already registered
    $( "#client_title" ).blur(function() {
      var form_data = {
        title: $(this).val()
      };
      $.ajax({
        url: "<?php echo site_url('ajax/check_client'); ?>",
        type: 'POST',
        data: form_data,
        dataType: 'json',
        success: function (msg) {
          if(msg.result!=null) {
            $('#create_company').attr('disabled','disabled');
            $('#check_client').show();
            $("#check_client").empty().append(msg.result);
          }
          else {
            $('#create_company').removeAttr('disabled');
            $('#check_client').hide();
          }
        }
      });
    });

// Check if email already registered
      $( "#client_email" ).blur(function() {
          var form_data = {
              email: $(this).val()
          };
          $.ajax({
              url: "<?php echo site_url('ajax/check_emails'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  if(msg.result!=true) {
                      $('#create_company').attr('disabled','disabled');
                      $('#check_email').show();
                      $("#check_email").empty().append(msg.result);
                  }
                  else {
                      $('#create_company').removeAttr('disabled');
                      $('#check_email').hide();
                  }
              }
          });
      });
  });
</script>