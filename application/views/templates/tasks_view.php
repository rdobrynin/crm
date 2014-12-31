<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <p class="lead">Tasks in process</p>
        <?php if ($tasks != FALSE): ?>
            <div class="row-fluid">
                <div class="panel">
                    <div class="panel-body-table">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th width="3%" class="text-left">#ID</th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Curator</th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Assigned project</th>
                                    <th width="18%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                    <th width="2%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">CTS</th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="proccess_task_table">
                                <?php $tasks = array_reverse($tasks);?>
                                <?php foreach ($tasks as $tk => $tv): ?>
                                <?php if ($tv['status'] == 2): ?>
                                        <tr class="<?php print(check_deadline($tv['due_time'])); ?>">
                                        <td><?php print($tv['id']); ?></td>
                                        <td><span class="muted"><?php print(date_format(date_create($tv['date_created']),"F d H:i")); ?></span></td>
                                        <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                        <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['implementor']); ?>)"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                        <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['uid']); ?>)"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                        <td><?php print($tv['title']); ?></td>
                                        <td><?php print($project_title[$tv['pid']]); ?></td>
                                        <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                        <td>
                                            <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                        </td>
                                        <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                        <td><?php print(check_cts($tv['cts'])); ?></td>
                                        <td class="text-left"><?php print(date_format(date_create($tv['due_time']),"F d H:i")); ?></td>
                                        <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                            <td>
                                                <a href="#" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                            </td>
                                        <?php endif ?>
                                    </tr>

                                    <?php endif ?>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="pager_all_tasks"></ul>
            </div>

        <?php endif ?>
        <!--                end last tasks-->
    </div>
</div>
<div class="page-content-wrapper">
  <div class="page-content inset">
      <p class="lead">Tasks&nbsp;(<span id="calc-all-tasks" ></span>)</p>
      <?php if ($tasks != FALSE): ?>
          <div class="row-fluid">
              <div class="panel">
                  <div class="panel-body-table">
                      <div class="table-responsive">
                          <table class="table table-condensed">
                              <thead>
                              <tr>
                                  <th width="3%" class="text-left">#ID</th>
                                  <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                  <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                  <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                  <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Creator</th>
                                  <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                  <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Assigned project</th>
                                  <th width="18%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                  <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                  <th width="2%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                  <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">CTS</th>
                                  <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                  <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                  <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                                  <?php endif ?>
                              </tr>
                              </thead>
                              <tbody id="all_task_table">
                              <?php $tasks = array_reverse($tasks);?>
                              <?php foreach ($tasks as $tk => $tv): ?>
                              <?php if ($tv['status'] != 2 AND $tv['status'] != 3): ?>
                                  <tr id="tr-task-task-<?php print($tv['id']); ?>" class="<?php print(check_deadline($tv['due_time'])); ?>">
                                      <td><?php print($tv['id']); ?></td>
                                      <td><span class="muted"><?php print(date_format(date_create($tv['date_created']),"F d H:i")); ?></span></td>
                                      <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                      <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['implementor']); ?>)"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                      <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['uid']); ?>)"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                      <td><?php print($tv['title']); ?></td>
                                      <td><?php print($project_title[$tv['pid']]); ?></td>
                                      <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                      <td>
                                          <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                      </td>
                                      <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                      <td><?php print(check_cts($tv['cts'])); ?></td>
                                      <td class="text-left"><?php print(date_format(date_create($tv['due_time']),"F d H:i")); ?></td>
                                      <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                          <td>
                                              <a href="#" onClick="taskToReady(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                              <?php if ($tv['status']!=3): ?>
                                                  <?php if($user[0]['role']==2):?>
                                                      <a href="#" onClick="taskToEdit(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                                  <?php endif ?>
                                              <?php endif ?>
                                              <a href="#" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                          <?php if ($tv['status']!=2 && $tv['status']!=3): ?>
                                              <a href="#" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv['id']); ?>" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>
                                          <?php endif ?>
                                          </td>
                                      <?php endif ?>
                                  </tr>
                                  <?php endif ?>
                              <?php endforeach ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-12 text-center">
              <ul class="pagination pagination-lg pager" id="pager_all_tasks"></ul>
          </div>
      <?php endif ?>
      <!--                end last tasks-->

  </div>
</div>

<div class="page-content-wrapper">
<div class="page-content inset">
    <p class="lead">Completed tasks</p>
    <?php if ($tasks != FALSE): ?>
        <div class="row-fluid">
            <div class="panel">
                <div class="panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th width="3%" class="text-left">#ID</th>
                                <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Creator</th>
                                <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Assigned project</th>
                                <th width="18%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                <th width="2%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">TTS</th>
                                <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">CTS</th>
                                <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                            </tr>
                            </thead>
                            <tbody id="comp_task_table">
                            <?php $tasks = array_reverse($tasks);?>
                            <?php foreach ($tasks as $tk => $tv): ?>
                                <?php if ($tv['status'] == 3): ?>
                                    <tr class="<?php print(check_deadline($tv['due_time'])); ?>">
                                        <td><?php print($tv['id']); ?></td>
                                        <td><span class="muted"><?php print(date_format(date_create($tv['date_created']),"F d H:i")); ?></span></td>
                                        <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                        <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['implementor']); ?>)"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                        <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['uid']); ?>)"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                        <td><?php print($tv['title']); ?></td>
                                        <td><?php print($project_title[$tv['pid']]); ?></td>
                                        <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                        <td>
                                            <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                        </td>
                                        <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                        <td>
                                            <?php if ($tv['tts'] == '0'): ?>
                                                <i class="fa fa-clock-o clock-activity"></i> 1 mins.
                                            <?php else: ?>
                                                <i class="fa fa-clock-o clock-activity"></i>  <?php print($tv['tts']); ?>&nbsp; mins
                                            <?php endif ?>
                                        </td>
                                        <td><?php print(check_cts($tv['cts'])); ?></td>
                                        <td class="text-left"><?php print(date_format(date_create($tv['due_time']),"F d H:i")); ?></td>
                                        <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                            <td>
                                                <a href="#" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                            </td>
                                        <?php endif ?>

                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <ul class="pagination pagination-lg pager" id="pager_comp_tasks"></ul>
        </div>
    <?php endif ?>
    <!--                end last tasks-->
</div>
</div>


<!--logs-->

<?php include('logs_view.php'); ?>
<?php include('right_float_view.php'); ?>
</div>

<?php include('footer_view.php');?>
<script>
    $(function () {
        $('#all_task_table').pageMe({pagerSelector:'#pager_all_tasks',showPrevNext:true,hidePageNumbers:true,perPage:10});
    });



</script>
