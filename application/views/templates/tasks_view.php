<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <p class="lead"><?php print(lang('task_tasks_in_process'))?>&nbsp;(<span id="calc-all-pr_tasks" ></span>)</p>
                </div>
            <?php if ($process_tasks != FALSE): ?>
            <div class="col-lg-2 col-md-4 search-form">
                <input type="text" id="search-task-process-table" class=" form-control lights" placeholder="<?php print(lang('task_search'))?>"/>
            </div>
            <?php endif ?>
            </div>
        <?php if ($process_tasks != FALSE): ?>
            <div class="row-fluid">
                <div class="panel">
                    <div class="panel-body-table">
                        <div class="table-responsive">
                            <table class="table table-condensed" id="table-task-process">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-left"><?php print(lang('task_th_article'))?></th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_created'))?></th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_label'))?></th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_implementer'))?></th>
                                    <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_creator'))?></th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_title'))?></th>
                                    <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_project'))?></th>
                                    <th width="6%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_description'))?></th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_status'))?></th>
                                    <th width="2%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_priority'))?></th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_cts'))?></th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_dueto'))?></th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_action'))?></th>
                                </tr>
                                </thead>
                                <tbody id="proccess_task_table">
                                <?php $process_tasks = array_reverse($process_tasks);?>
                                <?php foreach ($process_tasks as $tk => $tv): ?>
                                        <tr class="<?php print(check_deadline(date('jS F Y G:i', $tv['due_time']))); ?>">
                                        <td>#<?php print($tv['id']); ?></td>
                                        <td><span class="muted"><?php print(date('jS F Y G:i', $tv['date_created'])); ?></span></td>
                                        <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['implementor']); ?>"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['uid']); ?>"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                        <td><?php print($tv['title']); ?></td>
                                        <td><?php print($project_title[$tv['pid']]); ?></td>
                                        <td><span class="muted"><?php print(substr($tv['desc'], 0,20)).' '.'...';?></span></td>
                                        <td>
                                            <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                        </td>
                                        <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                        <td><?php print(check_cts($tv['cts'])); ?></td>
                                        <td class="text-left"><?php print(date('jS F Y G:i', $tv['due_time'])); ?></td>
                                            <td>
                                                <a href="javascript:void(0);"  class="task-view" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                                <?php if ($user->id == $tv['implementor']): ?>
                                                    <a href="javascript:void(0);" data-id="(<?php print($tv['id']); ?>" data-cts="<?php print(check_cts($tv['cts'])); ?>" class="btn btn-xs imp-adjust-btn imp-complete" data-toggle="tooltip" data-placement="top" title="complete"><i class="fa fa-check-circle"></i></a>
                                                    <a href="javascript:void(0);" style="color:#d9534f;" class="btn btn-xs imp-adjust-btn imp-control" data-id="<?php print($tv['id']); ?>" data-action="1" data-toggle="tooltip" data-placement="top" title="unwant"><i class="fa fa-eye-slash"></i></a>
                                                <?php endif ?>
                                            </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of process task not found</div></div>
        <?php endif ?>
        <!--                end last tasks-->
    </div>
</div>
<div class="page-content-wrapper">
  <div class="page-content inset">
      <div class="row">
          <div class="col-lg-10 col-md-12">
      <p class="lead"><?php print(lang('task_tasks'))?>&nbsp;(<span id="calc-all-tasks" ></span>)</p>
              </div>
          <?php if ($tasks != FALSE): ?>
          <div class="col-lg-2 col-md-4 search-form">
              <input type="text" id="search-task-common-table" class=" form-control lights" placeholder="<?php print(lang('task_search'))?>"/>
          </div>
          <?php endif ?>
          </div>
      <?php if ($tasks != FALSE): ?>
          <div class="row-fluid">
              <div class="panel">
                  <div class="panel-body-table">
                      <div class="table-responsive">
                          <table class="table table-condensed" id="common-tasks-table">
                              <thead>
                              <tr>
                                  <th width="5%" class="text-left"><?php print(lang('task_th_article'))?></th>
                                  <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_created'))?></th>
                                  <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_label'))?></th>
                                  <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_implementer'))?></th>
                                  <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_creator'))?></th>
                                  <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_title'))?></th>
                                  <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_project'))?></th>
                                  <th width="6%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_description'))?></th>
                                  <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_status'))?></th>
                                  <th width="2%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_priority'))?></th>
                                  <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_cts'))?></th>
                                  <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_dueto'))?></th>
                                  <?php if($user->role==5 OR $user->role==4):?>
                                      <th width="10%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_action'))?></th>
                                  <?php endif ?>
                              </tr>
                              </thead>
                              <tbody id="all_task_table">
                              <?php $tasks = array_reverse($tasks);?>
                              <?php foreach ($tasks as $tk => $tv): ?>
                              <?php if ($tv['status'] != 2 AND $tv['status'] != 3): ?>
                                  <tr id="tr-task-task-<?php print($tv['id']); ?>" class="<?php print(check_deadline(date('jS F Y G:i', $tv['due_time']))); ?>">
                                      <td>#<?php print($tv['id']); ?></td>
                                      <td><span class="muted"><?php print(date('jS F Y G:i', $tv['date_created'])); ?></span></td>
                                      <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                      <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['implementor']); ?>"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                      <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['uid']); ?>"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                      <td><?php print($tv['title']); ?></td>
                                      <td><?php print($project_title[$tv['pid']]); ?></td>
                                      <td><span class="muted"><?php print(substr($tv['desc'], 0,20)).' '.'...';?></span></td>
                                      <td>
                                          <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                      </td>
                                      <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                      <td><?php print(check_cts($tv['cts'])); ?></td>
                                      <td class="text-left"><?php print(date('jS F Y G:i', $tv['due_time'])); ?></td>
                                      <?php if($user->role==5 OR $user->role==4):?>
                                          <td>
                                              <?php if ($tv['status']!=5): ?>
                                              <a href="javascript:void(0);" class="task-ready" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                              <?php endif ?>
                                              <?php if($user->id==$tv['uid']):?>
                                                      <a href="javascript:void(0);" class="task-edit" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                              <?php endif ?>
                                              <a href="javascript:void(0);" class="task-view" data-id="<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                          <?php if ($tv['status']!=2 && $tv['status']!=3): ?>
                                              <?php if($user->id==$tv['uid']):?>
                                              <a href="javascript:void(0);" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv['id']); ?>" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>
                                      <?php endif ?>
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
<!--          <div class="col-md-12 text-center">-->
<!--              <ul class="pagination pagination-lg pager" id="pager_all_tasks"></ul>-->
<!--          </div>-->
      <?php else: ?>
          <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one task not found</div></div>

      <?php endif ?>
      <!--                end last tasks-->
  </div>
</div>
<div class="page-content-wrapper">
<div class="page-content inset">
    <div class="row">
        <div class="col-lg-10 col-md-12">
            <p class="lead"><?php print(lang('task_tasks_completed'))?>&nbsp;(<span id="calc-all-comp_tasks" ></span>)</p>
            </div>
        <?php if ($c_tasks != FALSE): ?>
        <div class="col-lg-2 col-md-4 search-form">
            <input type="text" id="search-task-complete-table" class=" form-control lights" placeholder="<?php print(lang('task_search'))?>"/>
        </div>
        <?php endif ?>
        </div>
    <?php if ($c_tasks != FALSE): ?>
        <div class="row-fluid">
            <div class="panel">
                <div class="panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-condensed" id="table-task-complete">
                            <thead>
                            <tr>
                                <th width="5%" class="text-left"><?php print(lang('task_th_article'))?></th>
                                <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_created'))?></th>
                                <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_label'))?></th>
                                <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_implementer'))?></th>
                                <th width="5%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_creator'))?></th>
                                <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_title'))?></th>
                                <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_project'))?></th>
                                <th width="6%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_description'))?></th>
                                <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_status'))?></th>
                                <th width="2%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_priority'))?></th>
                                <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_tts'))?></th>
                                <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_cts'))?></th>
                                <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_dueto'))?></th>
                                <th width="10%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('task_th_action'))?></th>
                            </tr>
                            </thead>
                            <tbody id="comp_task_table">
                            <?php $tasks = array_reverse($tasks);?>
                            <?php foreach ($tasks as $tk => $tv): ?>
                                <?php if ($tv['status'] == 3): ?>
                                    <tr>
                                        <td>#<?php print($tv['id']); ?></td>
                                        <td><span class="muted"><?php print(date('jS F Y G:i', $tv['date_created'])); ?></span></td>
                                        <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['implementor']); ?>"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['uid']); ?>"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                        <td><?php print($tv['title']); ?></td>
                                        <td><?php print($project_title[$tv['pid']]); ?></td>
                                        <td><span class="muted"><?php print(substr($tv['desc'], 0,20)).' '.'...';?></span></td>
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
                                        <td class="text-left"><?php print(date('jS F Y G:i', $tv['due_time'])); ?></td>
                                            <td>
                                                <a href="javascript:void(0);" class="task-view" data-id="<?php print($tv['id']); ?>"  style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                            </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <ul class="pagination pagination-lg pager" id="pager_all_comp_tasks"></ul>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one completed task not found</div></div>
    <?php endif ?>
    <!--                end comp tasks-->
</div>
</div>
<!--logs-->
<?php include('logs_view.php'); ?>
<?php include('right_float_view.php'); ?>
</div>

<?php include('footer_view.php');?>
