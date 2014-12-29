<!-- Page content -->
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-9">
                <h3 class="h_title">Current activity</h3>
                <div class="row">
                    <div class="col-md-6 col-vlg-3 col-sm-6">
                        <div class="tiles green m-b-10">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                                <div class="tiles-title text-black">Projects</div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Overall Projects</span> <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700"><?php if ($projects != false): ?><?php print(count($projects));?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Current Team</span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700"><?php if ($users != false): ?><?php print(count($users));?><?php else:?>0<?php endif ?></span>

                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title">Overall workflow</span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700">143 h</span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"  data-percentage="43%" style="width: 64.8%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description ">43% all projects <span class="blend">completed</span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-vlg-3 col-sm-6">
                        <div class="tiles blue m-b-10">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                                <div class="tiles-title text-black">Tasks</div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Overall Tasks</span> <span class="item-count animate-number semi-bold" data-value="15489" data-="" animation-duration="700"><?php if ($tasks != false): ?><?php print(count($tasks));?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title">Process Tasks</span> <span class="item-count animate-number semi-bold" id="dash-process-task" data-value="551" data-animation-duration="700"><?php if ($process_tasks != false): ?><?php print(count($process_tasks)); ?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title">Overdue Tasks</span> <span class="item-count animate-number semi-bold" data-value="1450" data-animation-duration="700"><?php if ($over_tasks != false): ?><?php print(count($over_tasks)); ?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar" id="progress-tasks" data-percentage="25%" style="width: 54%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description "><span id="percent-completed-tasks">25%</span> all tasks <span class="blend">completed</span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                overdue tasks-->

                    <div class="row-fluid" style="padding-top: 20px;">

                        <h3 class="h_title">Overdue tasks&nbsp;(<span id="calc-over-tasks" ><?php if ($over_tasks != false): ?><?php print(count($over_tasks)); ?><?php else:?>0<?php endif ?></span>)</h3>
                        <?php if ($over_tasks != false): ?>
                        <div class="panel">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th width="2%" class="text-left">id</th>
                                            <th width="8%" class="text-left"  style="border-left: 1px solid #ddd;">Created</th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;">Label</th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Implementor</th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Creator</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                            <th width="6%" class="text-left" style="border-left: 1px solid #ddd;">Project to</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                            <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                                <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                                            <?php endif ?>
                                        </tr>
                                        </thead>
                                        <tbody id="over_tasks_table">
                                        <?php $tasks = array_reverse($tasks);?>
                                        <?php foreach ($tasks as $tk => $tv): ?>
                                            <?php if ($tv['status'] == 6): ?>

                                                <tr id="tr-dashboard-task-<?php print($tv['id']); ?>" class="<?php print(check_deadline($tv['due_time'])); ?>">
                                                    <td>#<?php print($tv['id']); ?></td>
                                                    <td><span class="muted"><?php print(date_format(date_create($tv['date_created']),"F d H:i")); ?></span></td>
                                                    <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                                    <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['implementor']); ?>)"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                                    <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['uid']); ?>)"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                                    <td><?php print($tv['title']); ?></td>
                                                    <td><?php print($project_title[$tv['pid']]); ?></td>
                                                    <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                                    <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                                    <td class="text-left"><?php print(date_format(date_create($tv['due_time']),"F d H:i")); ?></td>
                                                    <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                                        <td>
                                                            <a href="#" onClick="processToReady(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                                            <a href="#" style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                                            <a href="#" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                                            <a href="#" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv['id']); ?>" style="text-decoration: none;cursor: pointer;"><i class="fa fa-times"></i></a>
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
                        <div class="text-center">
                            <ul class="pagination pagination-lg pager" id="pager_over_tasks"></ul>
                        </div>

                    </div>
                    <?php else: ?>
                    <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of overdue tasks found</div></div>
                    </div>
                <?php endif ?>
<!--                end overdue-->
                <div class="row-fluid" style="padding-top: 20px;">
                <?php if ($tasks != FALSE): ?>
                        <?php if ($user[0]['role']==5 OR $user[0]['role']==4 OR $user[0]['role']==3): ?>
                        <h3 class="h_title">Tasks for approve&nbsp;(<span id="calc-appr-tasks" ><?php if ($approve_tasks != false): ?><?php print(count($approve_tasks)); ?><?php else:?>0<?php endif ?></span>)</h3>
                        <?php endif ?>

                        <?php if ($user[0]['role']==2 ): ?>
                            <h3 class="h_title">Ready to go&nbsp;(<span id="calc-ready-tasks"><?php if ($ready_tasks != false): ?><?php print($ready_tasks); ?><?php else:?>0<?php endif ?></span>)</h3>
                        <?php endif ?>
<!--                 START APPROVE  TASK      -->
                        <?php if ($user[0]['role']!=2): ?>
                        <?php if ($approve_tasks != false): ?>
                        <div class="panel">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="approve-task-table">
                                        <thead>
                                        <tr>
                                            <th width="2%" class="text-left">id</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                            <th width="4%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Creator</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                            <th width="6%" class="text-left" style="border-left: 1px solid #ddd;">Project to</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                            <?php if($user[0]['role']!=3):?>
                                            <th width="15%" class="text-left"></th>
                                            <?php endif ?>
                                        </tr>
                                        </thead>
                                        <tbody id="approve_tasks_table">
<!--                                      --><?php //$tasks = array_reverse($tasks);?>
                                        <?php foreach ($tasks as $tk => $tv): ?>
                                            <?php if ($tv['status'] == 0 && $user[0]['role']==5 OR $tv['status'] == 0 && $user[0]['role']==4 OR $tv['status'] == 0 &&  $user[0]['role']==3): ?>

                                            <tr class="<?php if ($tv['status'] == 6): ?>danger<?php endif ?> <?php print(check_deadline($tv['due_time'])); ?>" id="tr-dashboard-task-<?php print($tv['id']); ?>">
                                                <td>#<?php print($tv['id']); ?></td>
                                                <td><span class="muted"><?php print(date_format(date_create($tv['date_created']),"F d H:i")); ?></span></td>
                                                <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                                <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['implementor']); ?>)"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                                <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['uid']); ?>)"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                                <td><?php print($tv['title']); ?></td>
                                                <td><?php print($project_title[$tv['pid']]); ?></td>
                                                <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                                <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                                <td class="text-left"><?php print(date_format(date_create($tv['due_time']),"F d H:i")); ?></td>
                                                <?php if($user[0]['role']!=3):?>
                                                <td>
                                                    <a href="#" onClick="processToReady(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                                    <a href="#" style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                                    <a href="#" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv['id']); ?>" style="text-decoration: none;cursor: pointer;"><i class="fa fa-times"></i></a>
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
                            <?php else: ?>

                                <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of approve tasks found</div></div>
                            <?php endif ?>


                        <div class="text-center">
                            <ul class="pagination pagination-lg pager" id="pager_approve_tasks"></ul>
                        </div>
                        <?php endif ?>

<!--                        END APPROVE-->
<!--STARTS READY-->
                        <?php if ($user[0]['role']==2): ?>
                        <div class="panel">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="ready-task-table" <?php if ($ready_tasks==0): ?> style="display: none;" <?php endif ?>>
                                        <thead>
                                        <tr>
                                            <th width="2%" class="text-left">id</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                            <th width="4%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Creator</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                            <th width="6%" class="text-left" style="border-left: 1px solid #ddd;">Project to</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                            <th width="3%" class="text-left" style="border-left: 1px solid #ddd;border-right: 1px solid #ddd;">View</th>
                                            <th width="15%" class="text-left"></th>

                                        </tr>
                                        </thead>
                                        <tbody id="ready_tasks_table">
                                        <?php foreach ($tasks as $tk => $tv): ?>
                                            <?php if ($tv['status'] == 5): ?>
                                                <tr id="ready-task-<?php print($tv['id']); ?>" class="<?php print(check_deadline($tv['due_time'])); ?>">
                                                    <td>#<?php print($tv['id']); ?></td>
                                                    <td><span class="muted"><?php print(date_format(date_create($tv['date_created']),"F d H:i")); ?></span></td>
                                                    <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                                    <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['implementor']); ?>)"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                                    <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($tv['uid']); ?>)"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                                    <td><?php print($tv['title']); ?></td>
                                                    <td><?php print($project_title[$tv['pid']]); ?></td>
                                                    <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                                    <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                                    <td class="text-left"><?php print(date_format(date_create($tv['due_time']),"F d H:i")); ?></td>
                                                    <td class="text-center"><a href="#" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a></td>
                                                    <?php if ($user[0]['id'] == $tv['implementor']): ?>
                                                    <td class="text-center">
                                                        <a href="#" style="color:#5cb85c;" class="btn btn-xs imp-adjust-btn"  onClick="impControl(<?php print($tv['id']); ?>,2)"  data-toggle="tooltip" data-placement="top" title="process"><i class="fa fa-play-circle"></i></a>
                                                        <a href="#"  onClick="impControl(<?php print($tv['id']); ?>,3)" class="btn btn-xs imp-adjust-btn" data-toggle="tooltip" data-placement="top" title="complete"><i class="fa fa-check-circle"></i></a>
                                                        <a href="#" style="color:#d9534f;" class="btn btn-xs imp-adjust-btn" onClick="impControl(<?php print($tv['id']); ?>,1)" data-toggle="tooltip" data-placement="top" title="unwant"><i class="fa fa-eye-slash"></i></a>


                                                        <?php else: ?>
<td class="text-center">
    -
</td>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="text-center">
                            <ul class="pagination pagination-lg pager" id="pager_ready_tasks"></ul>
                        </div>
                        <!--                        END READY-->
                <?php endif ?>
                    </div>
<!--                end last tasks-->
            </div>
        <?php if ($comments !=false): ?>
            <div class="col-md-3">
                <h3 class="h_title">Activity Stream</h3>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Last 7 comments</h3>
                    </div>
                    <div class="panel-body comment">
                        <?php $rev_comm = array_reverse($comments);?>
                        <?php foreach (array_slice($rev_comm, 0, 7) as $ck=>$cv): ?>
                            <?php if ($cv['public'] == 0): ?>
                        <div class="sub-activity">
                            <div class="activity-item-summary">
                                <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="#"><img src="<?php print(base_url());?>uploads/avatar/<?php if (isset($avatars[$cv['uid']])): ?><?php print($avatars[$cv['uid']]); ?><?php else: ?>placeholder_user.jpg<?php endif ?>" height="45"></a>
                                </span>
                                </div>
                                <a href="#" class="activity-item-user activity-item-author" target="_parent"><?php print(short_name($user_name[$cv['uid']])); ?></a>
                                &nbsp;<span class="label label-warning label-xs">subject</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link"><?php print($cv['subject']); ?></span></a>
                                <div class="com-last-text"><?php print($cv['text']); ?></div>
                                <div class="activity-item-description">

                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp"><?php print(time_ago($cv['date_created'])); ?></span>&nbsp;
                                       <span class="activity-item-action"><a href="#" class="activity-item-comment-link" onClick="qmSendComment(<?php print($cv['uid']); ?>)">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div class="show-more-activity"> <button class="btn btn-default btn-xs" id="show-more-comment" style="width: 100%">Show more</button></div>
                </div>
            </div>

        <?php endif ?>
    </div>
        <!-- ./row-->
    </div>
</div>
<!--logs-->
<!--test-->
<?php if ($introduce == 0): ?>
    <?php include('introduce.php'); ?>
<?php endif ?>

<?php include('logs_view.php'); ?>
<?php include('right_float_view.php'); ?>

