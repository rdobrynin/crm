<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
      <p class="lead">Projects&nbsp;<span class="curr-project">(<?php print(count($projects));?>)</span></p>
      <div class="row-fluid">
          <?php if ($projects == false): ?>
              <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one projects found</div></div>
            <?php else: ?>
              <?php foreach ($projects as $pk => $pv): ?>
                  <?php if ($pv['froze'] != 1): ?>
                <table class="table" style="border: 0">
                    <tbody>
                    <tr onClick="projectToView(<?php print($pv['pid']); ?>)" style="cursor: pointer;">
                        <td style="width: 5%; text-align: left;">#<?php print($pv['pid']); ?></td>
                        <td style="width: 15%; text-align: left;" class="current-title-project"><?php print($pv['title']); ?></td>
                        <td style="width: 20%; text-align: left;"><?php print($pv['description']); ?></td>
                        <td style="width: 20%; text-align: center;"><a href="javascript:void(0);"><span class="badge badge-task" id="route-task">    <?php if (isset($project_tasks[$pv['pid']])): ?><?php print(count($project_tasks[$pv['pid']])); ?><?php else:?>0<?php endif ?></span></a></td>
                        <td style="width: 20%; text-align: center;"><a href="javascript:void(0);" onClick="qmSendComment(<?php print($pv['owner']); ?>)"><?php print(short_name($user_name[$pv['owner']])); ?></a></td>

                    </tr>
                    <!--TASK-->

                    <?php if (isset($project_tasks[$pv['pid']])): ?>
                    <tr>
                        <td colspan="9" class="td-task" id="task-for-project-<?php print($pv['pid']); ?>">
                            <div class="search-form-table">
                                <input type="text" id="search-project-task-table" class=" form-control lights" placeholder="Search"/>
                            </div>
                            <table class="table table-task">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-left">Article</th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Creator</th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                    <th width="6%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                    <th width="2%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">CTS</th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="all_task_table">
                                <?php $project_tasks[$pv['pid']] = array_reverse($project_tasks[$pv['pid']]);?>
                                <?php foreach ($project_tasks[$pv['pid']] as $tk => $tv): ?>







                                    <tr id="tr-project-task-<?php print($tv['id']); ?>"<?php if ($tv['status'] !=3): ?>class="<?php print(check_deadline($tv['due_time'])); ?>"<?php endif ?>>
                                        <td>#<?php print($tv['id']); ?></td>
                                        <td><span class="muted"><?php print(date_format(date_create($tv['date_created']),"F d H:i")); ?></span></td>
                                        <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name" onClick="qmSendComment(<?php print($tv['implementor']); ?>)"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name" onClick="qmSendComment(<?php print($tv['uid']); ?>)"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                        <td><?php print($tv['title']); ?></td>
                                        <td><span class="muted"><?php print(substr($tv['desc'], 0,20)).' '.'...';?></span></td>
                                        <td>
                                            <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                        </td>
                                        <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                        <td><?php print(check_cts($tv['cts'])); ?></td>
                                        <td class="text-left"><?php print(date_format(date_create($tv['due_time']),"F d H:i")); ?></td>
                                            <td>
                                                <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                                <?php if ($tv['status']!=3): ?>
                                                    <?php if($user[0]['role']==2):?>
                                                    <a href="javascript:void(0);" onClick="taskToReady(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                                        <a href="javascript:void(0);" onClick="taskToEdit(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                                    <?php endif ?>
                                                <?php endif ?>
                                                <a href="javascript:void(0);" onMouseDown="taskToView(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                                <?php if ($tv['status']!=2 && $tv['status']!=3): ?>
                                                        <?php if ($user[0]['id'] ==$tv['uid']): ?>

                                                    <a href="javascript:void(0);" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv['id']); ?>" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>
                                                        <?php endif ?>
                                                <?php endif ?>

                                                <?php else: ?>
                                                    <a href="javascript:void(0);" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                                <?php endif ?>
                                            </td>
                                    </tr>


                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php endif ?>




                    </tbody>
                </table>

                  <?php endif ?>
             <?php endforeach ?>



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
<?php include('manage_projects_view.php'); ?>
<!--logs-->
<?php include('logs_view.php'); ?>
<?php include('right_float_view.php'); ?>
</div>
<?php include('modals/assign_users_modal.php'); ?>
<?php include('footer_view.php');?>
<script>
    function projectToView($data){
        console.log($data);
        var $panel = $('.filterable .btn-filter').parents('.filterable'),
//            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
//        $filters.val('').prop('disabled', true);
        $tbody.find('.no-result').remove();
        $tbody.find('tr').show();
        $(this).closest("tr").toggleClass("project-task-main");
//        $(".current-title-project").css("label label-info label-cur-pr label-xs");
        $('#task-for-project-'+$data).fadeToggle("fast", function () {
        });
        if ($("#route-task").closest("tr").hasClass('project-task-main')) {
            $('.btn-filter').attr('disabled', 'disabled');
        }
        else {
            $('.btn-filter').removeAttr('disabled');
        }
    }

</script>
