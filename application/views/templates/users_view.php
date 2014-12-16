<?php include('navtop_view.php');?>
<?php include('sidebar_view.php');?>
<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
      <div class="row-fluid">
          <h3 class="h_title">Administer users</h3>
        <!--      tabs-->
        <ul class="nav nav-tabs filter" id="admin-users-tab">
          <li class="active"><a href="#current-users" class="tabs-filter" data-toggle="tab" title="Current users"><button class="btn btn-default">Current users</button></a></li>
          <li><a href="#new-users" class="tabs-filter"  data-toggle="tab" title="New users"><button class="btn btn-default">New users<?php if ($count_new_users>0): ?><span class="badge badge-tab"><?php print($count_new_users); ?></span><?php endif ?></button></a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade in active" id="current-users">



            <!--                  current_users-->
            <div class="filterable panel-tabs">
              <div class="panel-heading">
                <div class="pull-right">
                  <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
              </div>
                <div class="row-fluid">
                    <div class="panel panel-default">
                        <div class="panel-body-table">
                            <div class="table-responsive">
              <table class="table table-condensed">
                <thead>
                <tr class="filters">
                  <th><input type="text" class="form-control filter" placeholder="#" disabled></th>
                  <th style="border-left: 1px solid #ddd;"><input type="text" class="form-control filter" placeholder="Name" disabled></th>
                  <th style="border-left: 1px solid #ddd;"><input type="text" class="form-control filter" placeholder="Email" disabled></th>
                  <th style="border-left: 1px solid #ddd;"><input type="text" class="form-control filter" placeholder="Role" disabled></th>
                  <th style="border-left: 1px solid #ddd;"><input type="text" class="form-control filter" placeholder="Created" disabled></th>
                  <th><input type="hidden" class="form-control filter" placeholder="Edit" disabled></th>
                  <th><input type="hidden" class="form-control filter" placeholder="Delete" disabled></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $uk => $uv):?>
                  <tr>
                    <td><?php print($uv['id']);?></td>
                    <td><?php print(short_name($user_name[$uv['id']])); ?></td>
                      <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($uv['id']); ?>)"><?php print($uv['email']); ?></a></td>
                    <td><?php print(show_role($uv['role']));?></td>
                    <td><?php print($uv['date_created']);?></td>
                    <td><a href="#"  data-title="Edit" data-toggle="modal" data-target="#edit_user" ><i class="fa fa-pencil"></i></a> </td>
                    <td><a href="#"  data-title="Delete" data-toggle="modal" data-target="#delete_user">remove</a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          </div>
            <div class="tab-pane fade" id="new-users">

                <?php if ($new_users != false): ?>

                <!--                  new users-->
                <div class="filterable panel-tabs">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter">
                                <span class="glyphicon glyphicon-filter"></span> Filter
                            </button>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="panel panel-default">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control filter" placeholder="#" disabled></th>
                            <th style="border-left: 1px solid #ddd;"><input type="text" class="form-control filter" placeholder="First name" disabled></th>
                            <th style="border-left: 1px solid #ddd;"><input type="text" class="form-control filter" placeholder="Last name" disabled></th>
                            <th style="border-left: 1px solid #ddd;"><input type="text" class="form-control filter" placeholder="Email" disabled></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($new_users as $uk => $uv): ?>
                            <tr>
                                <td><?php print($uv['id']); ?></td>
                                <td><?php print($uv['first_name']); ?></td>
                                <td><?php print($uv['last_name']); ?></td>
                                <td><a href="mailto:<?php print($uv['email']); ?>"><?php print($uv['email']); ?></a></td>
                                <td>
                                    <a href="#" id="activate-user" data-user="<?php print($uv['id']); ?>">Activate</a>
                                </td>
                                <td><a href="#" data-title="Delete" data-toggle="modal" data-target="#delete_user">Remove</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <?php else: ?>
                    <div class="clearfix"></div>
<div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of new users found</div>

                <?php endif ?>

            </div>
          <div class="clearfix"></div>
        </div>
        <!--      tabs-->
      </div>
  </div>

<!--  New users-->
</div>
<!--logs-->

<?php include('logs_view.php'); ?>

</div>


<!--MODAL-->
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">

          <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
          <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


        </div>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
      <div class="modal-body">

        <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php include('add_role_view.php');?>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php');?>
<script>
  $('#admin-users-tab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
  $('#activate-user').confirmation(
      {
          placement: 'left',
          toggle:true,
          onConfirm: function() {
              var currentUser = $('#activate-user').data("user");



              var form_data = {
                  user :currentUser
              };
              $.ajax({
                  url: "<?php echo site_url('ajax/activateUser'); ?>",
                  type: 'POST',
                  data: form_data,
                  dataType: 'json',
                  success: function (msg) {
                      console.log(msg);

                  }
              });







          },
          onCancel: function() {
              $('#activate-user').confirmation('hide');
          }
      }
  );





</script>