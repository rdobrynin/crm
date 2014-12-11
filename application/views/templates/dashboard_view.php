<!-- Page content -->
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-8">
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
                                        <span class="item-title">Current Team</span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700">2</span>

                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title">Overall hours</span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700">143</span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="43%" style="width: 64.8%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description ">43% project <span class="blend">completed</span></span></div>
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
                                        <span class="item-title">Process Tasks</span> <span class="item-count animate-number semi-bold" data-value="551" data-animation-duration="700">1</span>
                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title">Overdue Tasks</span> <span class="item-count animate-number semi-bold" data-value="1450" data-animation-duration="700">1</span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="25%" style="width: 54%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description ">25% tasks <span class="blend">completed</span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($tasks != FALSE): ?>
                    <div class="row-fluid" style="padding-top: 20px;">
                        <h3 class="h_title">Last 8 tasks</h3>
                        <div class="panel panel-default">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">#ID</th>
                                            <th width="15%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                            <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                            <th width="15%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                            <th width="20%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                            <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                            <th width="15%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach (array_slice($tasks, 1, 8) as $tk => $tv): ?>
                                            <tr>
                                                <td><?php print($tv['id']); ?></td>
                                                <td><span class="muted"><?php print($tv['date_created']); ?></span></td>
                                                <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                                <td><?php print($tv['title']); ?></td>
                                                <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                                <td>
                                                    <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                                </td>
                                                <td class="text-left"><?php print($tv['due_time']); ?></td>
                                                <td class="text-center"><a href="#"><i class="fa fa-pencil"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
<!--                end last tasks-->
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading clickable">
                        <h3 class="panel-title">Activity Stream</h3>
                        <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-minus"></i></span>
                    </div>
                    <div class="panel-body">
                        <div class="sub-activity">
                            <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/bg_man@2x.jpg" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Roman D...</a>
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
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/TaskEasy-Logo.png" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Jevgeni S...</a>&nbsp;<span class="label label-default label-xs">closed</span>&nbsp;
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
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/bg_man@2x.jpg" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Roman D...</a>
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
                                    <a href="http://localhost/prm/profile"><img src="http://localhost/prm/uploads/avatar/TaskEasy-Logo.png" height="45"></a>
                                </span>
                            </div>
                            <div class="activity-item-summary">
                                <a href="/secure/ViewProfile.jspa?name=romdo" class="activity-item-user activity-item-author" target="_parent">Jevgeni S...</a>&nbsp;<span class="label label-default label-xs">closed</span>&nbsp;
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
<?php include('logs_view.php'); ?>

