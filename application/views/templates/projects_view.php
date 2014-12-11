<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
    <h3>Administer projects&nbsp;<span class="curr-project"></span></h3>
      <div class="row-fluid">
          <?php if ($projects == false): ?>
              <p>no projects found</p>
            <?php else: ?>
              <div class="panel panel-primary filterable">
                  <div class="panel-heading">
                      <h3 class="panel-title">Current Projects</h3>
                      <div class="pull-right">
                          <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                      </div>
                  </div>
                <table class="table">
                    <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control filter-input" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Project name" disabled></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Tasks" disabled></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Curator" disabled></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Status" disabled></th>
                        <th><input type="hidden" class="form-control filter-input" placeholder="Edit" disabled></th>
                        <th><input type="hidden" class="form-control filter-input" placeholder="Delete" disabled></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="12">
                        <td>1</td>
                        <td class="current-title-project">Magendo shop</td>
                        <td><a href="#"><span class="badge badge-task" id="route-task">3</span></a></td>
                        <td><a href="#">Roman Dobrynin</a></td>
                        <td><span class="label label-xs label-success">Process</span></td>
                        <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                    </tr>
                    <!--TASK-->
                    <tr>
                        <td colspan="9" class="td-task" id="task-for-project">
                            <table class="table table-task">
                                <tbody class="tbody-task">
                                <tr class="current-tasks-table">
                                    <th>#</th>
                                    <th>Task name</th>
                                    <th>Started</th>
                                    <th>Due to</th>
                                    <th>CTS</th>
                                    <th>Curator</th>
                                    <th>Implementor</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Fix payment module</td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><a href="#"><span class="badge alert-danger" id="route-task">30 min</span></a></td>
                                    <td><a href="#">Andrei S.</a></td>
                                    <td><a href="#">Roman D.</a></td>
                                    <td><span class="label label-xs label-success">Process</span></td>
                                    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sort table</td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><a href="#"><span class="badge alert-danger" id="route-task">12h</span></a></td>
                                    <td><a href="#">Andrei S.</a></td>
                                    <td><a href="#">Roman D.</a></td>
                                    <td><span class="label label-xs label-success">Process</span></td>
                                    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </tr>
                                <tr id="status-id">
                                    <td>3</td>
                                    <td>Reform code</td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><a href="#"><span class="badge alert-danger" id="route-task">23h</span></a></td>
                                    <td><a href="#">Andrei S.</a></td>
                                    <td><a href="#">Roman D.</a></td>
                                    <td><span class="label label-xs label-danger">Overdue</span></td>
                                    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Reform code</td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><?php print(date('F j, Y'));?></td>
                                    <td><a href="#"><span class="badge alert-danger" id="route-task">3h</span></a></td>
                                    <td><a href="#">Andrei S.</a></td>
                                    <td><a href="#">Roman D.</a></td>
                                    <td><span class="label label-xs  label-success">Process</span></td>
                                    <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- TASK-->
                    <tr>
                        <td>2</td>
                        <td>Facebook application</td>
                        <td></td>
                        <td><a href="#">Roman Dobrynin</a></td>
                        <td><span class="label label-xs label-warning">Approve</span></td>
                        <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Website</td>
                        <td><a href="#"><span class="badge badge-task" id="route-task">1</span></a></td>
                        <td><a href="#">Roman Dobrynin</a></td>
                        <td><span class="label label-xs label-info">Complete</span></td>
                        <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                    </tr>

                    </tbody>
                </table>

        </div>
          <?php endif ?>
      </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Mohsin">
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
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
  </div>
</div>
<!--logs-->

<?php include('logs_view.php'); ?>

</div>

<?php include('footer_view.php');?>

<script>
  $(function () {
    $("#route-task").click(function () {
      var $panel = $('.filterable .btn-filter').parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
      $filters.val('').prop('disabled', true);
      $tbody.find('.no-result').remove();
      $tbody.find('tr').show();
      $(this).closest("tr").toggleClass("project-task-main");
      $(".current-title-project").toggleClass("label label-info label-cur-pr");
      $('#task-for-project').fadeToggle("fast", function () {
      });
      if ($("#route-task").closest("tr").hasClass('project-task-main')) {
        $('.btn-filter').attr('disabled', 'disabled');
      }
      else {
        $('.btn-filter').removeAttr('disabled');
      }
    });
  });
</script>
