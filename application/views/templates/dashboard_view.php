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
                                        <span class="item-title">Process Tasks</span> <span class="item-count animate-number semi-bold" data-value="551" data-animation-duration="700"><?php if ($process_tasks != false): ?><?php print(count($process_tasks)); ?><?php else:?>0<?php endif ?></span>
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
                <?php if ($tasks != FALSE): ?>
                    <div class="row-fluid" style="padding-top: 20px;">
                        <h3 class="h_title">Overdue tasks&nbsp;(<span id="calc-over-tasks" ><?php if ($over_tasks != false): ?><?php print(count($over_tasks)); ?><?php else:?>0<?php endif ?></span>)</h3>
                        <div class="panel panel-default">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th width="8%" class="text-left">Created</th>
                                            <th width="4%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Creator</th>
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

                                                <tr id="tr-dashboard-task-<?php print($tv['id']); ?>">
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
                <?php endif ?>
<!--                end overdue-->

                <?php if ($tasks != FALSE): ?>
                    <div class="row-fluid" style="padding-top: 20px;">

                        <?php if ($user[0]['role']==5 OR $user[0]['role']==4 OR $user[0]['role']==3): ?>
                        <h3 class="h_title">Tasks for approve&nbsp;(<span id="calc-appr-tasks" ><?php if ($approve_tasks != false): ?><?php print(count($approve_tasks)); ?><?php else:?>0<?php endif ?></span>)</h3>
                        <?php endif ?>

                        <?php if ($user[0]['role']==2 ): ?>
                            <h3 class="h_title">Ready to go&nbsp;(<span id="calc-appr-tasks" ><?php if ($approve_tasks != false): ?><?php print(count($approve_tasks)); ?><?php else:?>0<?php endif ?></span>)</h3>
                        <?php endif ?>

                        <div class="panel panel-default">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="approve-task-table">
                                        <thead>
                                        <tr>
                                            <th width="2%" class="text-left">id</th>
                                            <th width="8%" class="text-left">Created</th>
                                            <th width="4%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Implementor</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Creator</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                            <th width="6%" class="text-left" style="border-left: 1px solid #ddd;">Project to</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;">Priority</th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                            <?php if($user[0]['role']!=3):?>
                                            <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                                            <?php endif ?>
                                        </tr>
                                        </thead>
                                        <tbody id="approve_tasks_table">
<!--                                      --><?php //$tasks = array_reverse($tasks);?>
                                        <?php foreach ($tasks as $tk => $tv): ?>
                                            <?php if ($tv['status'] == 0 && $user[0]['role']==5 OR $tv['status'] == 0 && $user[0]['role']==4 OR $tv['status'] == 0 &&  $user[0]['role']==3): ?>

                                            <tr class="<?php if ($tv['status'] == 6): ?>danger<?php endif ?>" id="tr-dashboard-task-<?php print($tv['id']); ?>">
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
                                            <?php if ($tv['status'] == 1 && $user[0]['role']==2): ?>

                                                <tr class="<?php if ($tv['status'] == 6): ?>danger<?php endif ?>" id="tr-dashboard-task-<?php print($tv['id']); ?>">
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
                                                        <td>
                                                            <a href="#" onClick="processToReady(<?php print($tv['id']); ?>)" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                                            <a href="#" style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                                            <a href="#" onMouseDown="taskToView(<?php print($tv['id']); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a>

                                                        </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <ul class="pagination pagination-lg pager" id="pager_approve_tasks"></ul>
                        </div>
                    </div>
                <?php endif ?>
<!--                end last tasks-->
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Activity Stream</h3>
                    </div>
                    <div class="panel-body comment">
                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="#"><img src="<?php print(base_url());?>uploads/avatar/admin_avatar.jpg" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="#" class="activity-item-user activity-item-author" target="_parent">Roman D...</a>
                                &nbsp;<span class="label label-warning label-xs">approve</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation</a>
                                <div class="activity-item-description">

                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">30 min ago</span>&nbsp;
                                       <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="#"><img src="<?php print(base_url());?>uploads/avatar/TaskEasy-Logo.png" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="#" class="activity-item-user activity-item-author" target="_parent">Jevgeni S...</a>&nbsp;<span class="label label-default label-xs">closed</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation  for implementation </a>
                                <div class="activity-item-description">

                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">2 hours ago</span>&nbsp;
                                        <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="#"><img src="<?php print(base_url());?>uploads/avatar/admin_avatar.jpg" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="#" class="activity-item-user activity-item-author" target="_parent">Roman D...</a>
                                &nbsp;<span class="label label-warning label-xs">approve</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation</a>
                                <div class="activity-item-description">
                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">3 hours ago</span>&nbsp;
                                        <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                        <form class="activity-item-comment-form ready" method="post" action="" style="">
                                            <fieldset><input type="hidden" name="replyTo" value="">
                                                <input type="hidden" name="xsrfToken" value=""><textarea rows="6" name="comment"></textarea>
                                            </fieldset><div class="pull-left"><span class="btn btn-danger btn-xs">Add</span>&nbsp;
                                                <a href="#" class="btn btn-default btn-xs close-activity-form">Cancel</a></div></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="#"><img src="<?php print(base_url());?>uploads/avatar/TaskEasy-Logo.png" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="#" class="activity-item-user activity-item-author" target="_parent">Jevgeni S...</a>&nbsp;<span class="label label-default label-xs">closed</span>&nbsp;
                                <a href="#" target="_parent"><span class="resolved-link">ECL-217</span> - LESS implemetation for implementation </a>
                                <div class="activity-item-description">
                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp">4 hours ago</span>&nbsp;
                                        <span class="activity-item-action"><a href="#" class="activity-item-comment-link">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="show-more-activity"> <button class="btn btn-default btn-xs" style="width: 100%">Show more</button></div>
                </div>
            </div>
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

