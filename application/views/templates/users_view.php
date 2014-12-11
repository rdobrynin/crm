<?php include('navtop_view.php');?>
<?php include('sidebar_view.php');?>
<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
      <div class="row">
        <!--      tabs-->
        <ul class="nav nav-tabs" id="admin-users-tab">
          <li class="active"><a href="#current-users" data-toggle="tab" title="Current users"><button class="btn btn-info">Current users</button></a></li>
          <li><a href="#new-users" data-toggle="tab" title="New users"><button class="btn btn-info">New users

                      <?php if ($count_new_users>0): ?>
                          <span class="badge badge-tab"><?php print($count_new_users); ?></span>
                      <?php endif ?>
                  </button></a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade in active" id="current-users">
            <!--                  current_users-->
            <div class="panel panel-primary filterable panel-tabs">
              <div class="panel-heading">

                <h3 class="panel-title">Administer current users</h3>
                <div class="pull-right">
                  <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
              </div>
              <table class="table">
                <thead>
                <tr class="filters">
                  <th><input type="text" class="form-control" placeholder="#" disabled></th>
                  <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                  <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                  <th><input type="text" class="form-control" placeholder="Role" disabled></th>
                  <th><input type="text" class="form-control" placeholder="Created" disabled></th>
                  <th><input type="hidden" class="form-control" placeholder="Edit" disabled></th>
                  <th><input type="hidden" class="form-control" placeholder="Delete" disabled></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $uk => $uv):?>
                  <tr>
                    <td><?php print($uv['id']);?></td>
                    <td><?php print($uv['first_name'].' '.$uv['last_name']);?></td>
                    <td><?php print($uv['email']);?></td>
                    <td><?php print(show_role($uv['role']));?></td>
                    <td><?php print($uv['date_created']);?></td>
                    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_user" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_user" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="new-users">
            <!--                  new users-->
              <div class="panel panel-primary filterable panel-tabs">
                  <div class="panel-heading">

                      <h3 class="panel-title">Joined users</h3>
                      <div class="pull-right">
                          <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                      </div>
                  </div>
                  <table class="table">
                      <thead>
                      <tr class="filters">
                          <th><input type="text" class="form-control" placeholder="#" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                          <th><input type="hidden" class="form-control" placeholder="Edit" disabled></th>
                          <th><input type="hidden" class="form-control" placeholder="Delete" disabled></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($new_users as $uk => $uv):?>
                          <tr>
                              <td><?php print($uv['id']);?></td>
                              <td><?php print($uv['first_name'].' '.$uv['last_name']);?></td>
                              <td><?php print($uv['email']);?></td>
                              <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_user" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                              <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_user" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                          </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
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
<?php include('footer_view.php');?>
<script>
  $('#admin-users-tab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
</script>