<!-- Page content -->
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-9">
                <?php echo $this->session->flashdata('permission'); ?>
<!--                Current Activity Panel-->
                <p class="lead"><?php print(lang('dsb_current_activity'))?></p>
                <div class="row">
                    <div class="col-md-6 col-vlg-3 col-sm-6">
                        <div class="tiles green m-b-10">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:void();" class="reload"></a> <a href="javascript:void();" class="remove"></a> </div>
                                <div class="tiles-title text-black"><?php print(lang('dsb_projects'))?></div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title"><?php print(lang('dsb_overall_projects_short'))?></span> <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700"><?php if ($projects != false): ?><?php print(count($projects));?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title"><?php print(lang('dsb_users_short'))?></span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700"><?php if ($users != false): ?><?php print(count($users));?><?php else:?>0<?php endif ?></span>

                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title"><?php print(lang('dsb_overall_workflow_short'))?></span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700"><?php print(round_up($total_task_done,2)); ?> h</span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"  data-percentage="43%" style="width: 64.8%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description "><?php print(lang('dsb_projects_completed_1'))?><span class="blend">&nbsp;<?php print(lang('dsb_projects_completed_2'))?></span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-vlg-3 col-sm-6">
                        <div class="tiles blue m-b-10">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:void();" class="reload"></a> <a href="javascript:void();" class="remove"></a> </div>
                                <div class="tiles-title text-black"><?php print(lang('dsb_tasks'))?></div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title"><?php print(lang('dsb_overall_tasks_short'))?></span> <span class="item-count animate-number semi-bold" data-value="15489" data-="" animation-duration="700"><?php if ($tasks != false): ?><?php print(count($tasks));?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats">
                                    <div class="wrapper transparent">
                                        <span class="item-title"><?php print(lang('dsb_process_tasks_short'))?></span> <span class="item-count animate-number semi-bold" id="dash-process-task" data-value="551" data-animation-duration="700"><?php if ($process_tasks != false): ?><?php print(count($process_tasks)); ?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="widget-stats ">
                                    <div class="wrapper last">
                                        <span class="item-title"><?php print(lang('dsb_overdue_tasks_short'))?></span> <span class="item-count animate-number semi-bold" data-value="1450" data-animation-duration="700"><?php if ($over_tasks != false): ?><?php print(count($over_tasks)); ?><?php else:?>0<?php endif ?></span>
                                    </div>
                                </div>
                                <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                    <div class="progress-bar progress-bar-white animate-progress-bar" id="progress-tasks" data-percentage="25%" style="width: 54%;"></div>
                                </div>
                                <div class="description"> <span class="text-white mini-description "><span id="percent-completed-tasks">25%</span> <?php print(lang('dsb_tasks_completed_1'))?> <span class="blend"> <?php print(lang('dsb_tasks_completed_2'))?></span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                Overdue tasks-->
                    <div  style="padding-top: 20px;">
                     <div class="row">
                         <div class="col-lg-10 col-md-12">
                             <p class="lead"><?php print(lang('dsb_overdue_tasks'))?>&nbsp;(<span id="calc-over-tasks" ><?php if ($over_tasks != false): ?><?php print(count($over_tasks)); ?><?php else:?>0<?php endif ?></span>)</p>
                         </div>
                         <?php if ($over_tasks != false): ?>
                         <div class="col-lg-2 col-md-4 search-form">
                             <input type="text" id="search-dash-over-table" class=" form-control lights" placeholder="<?php print(lang('dsb_search'))?>"/>
                         </div>
                         <?php endif ?>
                     </div>
                        <?php if ($over_tasks != false): ?>

                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="dash-over-table">
                                        <thead>
                                        <tr>
                                            <th width="5%" class="text-left"><?php print(lang('dsb_th_article'))?></th>
                                            <th width="8%" class="text-left"  style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_created'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_label'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_implementer'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_creator'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_title'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_project'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_description'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_status'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_priority'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_cts'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_dueto'))?></th>
                                            <?php if($user->role==5 OR $user->role==4):?>
                                                <th width="10%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_action'))?></th>
                                            <?php endif ?>
                                        </tr>
                                        </thead>
                                        <tbody id="over_tasks_table">
                                        <?php $tasks = array_reverse($tasks);?>
                                        <?php foreach ($tasks as $tk => $tv): ?>
                                            <?php if ($tv['overdue'] == 1 && task_status($tv['status']) != 'complete'): ?>
                                                <tr id="tr-dashboard-task-<?php print($tv['id']); ?>">
                                                    <td>#<?php print($tv['id']); ?></td>
                                                    <td><span class="muted"><?php print(date('jS F Y G:i', $tv['date_created'])); ?></span></td>

                                                    <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                                    <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['implementor']); ?>"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                                    <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['uid']); ?>"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                                    <td><?php print($tv['title']); ?></td>
                                                    <td><?php print($project_title[$tv['pid']]); ?></td>
                                                    <td><span class="muted"><?php print(substr($tv['desc'], 0,20)).' '.'...';?></span></td>
                                                    <td><span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span></td>
                                                    <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                                    <td><?php print(check_cts($tv['cts'])); ?></td>
                                                    <td class="text-left"><?php print(date('jS F Y G:i', $tv['due_time'])); ?></td>
                                                    <?php if($user->role==5 OR $user->role==4):?>
                                                        <td>
                                                            <?php if($user->id==$tv['uid']):?>
                                                            <a href="javascript:void(0);" class="task-ready" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                                            <a href="javascript:void(0);" class="task-edit" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                                            <?php endif ?>
                                                            <a href="javascript:void(0);" class="task-view" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                                        <?php if($user->id==$tv['uid']):?>
                                                            <a href="javascript:void(0);" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv['id']); ?>" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>
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

<!--                        <div class="text-center">-->
<!--                            <ul class="pagination pagination-lg pager" id="pager_over_tasks"></ul>-->
<!--                        </div>-->
                    </div>
                    <?php else: ?>
                    <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;<?php print(lang('dsb_no_poverdue_tasks'))?></div></div>
                    </div>
                <?php endif ?>
<!--                End overdue-->
                <div style="padding-top: 20px;">
                <?php if ($tasks != FALSE): ?>
                        <?php if ($user->role==5 OR $user->role==4 OR $user->role==1 OR $user->role==3): ?>
                <div class="row">
                    <div class="col-lg-10 col-md-12">
                        <p class="lead"><?php print(lang('dsb_tasks_for_approval'))?>&nbsp;(<span id="calc-appr-tasks" ><?php if ($approve_tasks != false): ?><?php print(count($approve_tasks)); ?><?php else:?>0<?php endif ?></span>)</p>
                        </div>
                            <?php if ($approve_tasks != false): ?>
                    <div class="col-lg-2 col-md-4 search-form">
                        <input type="text" id="search-dash-approve-table" class=" form-control lights" placeholder="<?php print(lang('dsb_search'))?>"/>
                    </div>
                            <?php endif ?>
                </div>

                        <?php endif ?>
                        <?php if ($user->role
                        ==2 ): ?>
                <div class="row">
                    <div class="col-lg-10 col-md-12">
                            <p class="lead"><?php print(lang('dsb_tasks_ready_togo'))?>&nbsp;(<span id="calc-ready-tasks"><?php if ($ready_tasks != false): ?><?php print($ready_tasks); ?><?php else:?>0<?php endif ?></span>)<p>
                        </p>
                </div>
                            <?php if ($ready_tasks != false): ?>
                                <div class="col-lg-2 col-md-4 search-form">
                                    <input type="text" id="search-dash-ready-table" class=" form-control lights" placeholder="<?php print(lang('dsb_search'))?>"/>
                                </div>
                            <?php endif ?>
                    </div>
                        <?php endif ?>
<!--                 START APPROVE  TASK      -->
                        <?php if ($user->role!=2): ?>
                        <?php if ($approve_tasks != false): ?>
                        <div class="panel">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="approve-task-table">
                                        <thead>
                                        <tr>
                                            <th width="5%" class="text-left"><?php print(lang('dsb_th_article'))?></th>
                                            <th width="8%" class="text-left"  style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_created'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_label'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_implementer'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_creator'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_title'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_project'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_description'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_priority'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_dueto'))?></th>
                                            <?php if($user->role!=3):?>
                                            <th width="15%" class="text-left"></th>
                                            <?php endif ?>
                                        </tr>
                                        </thead>
                                        <tbody id="approve_tasks_table">
                                      <?php $tasks = array_reverse($tasks);?>
                                        <?php foreach ($tasks as $tk => $tv): ?>
                                            <?php if ($tv['overdue'] !=='1'): ?>
                                            <?php if ($tv['status'] == 0 && $user->role==5 OR $tv['status'] == 0 && $user->role==1   OR $tv['status'] == 0 && $user->role==4 OR $tv['status'] == 0 &&  $user->role==3): ?>
                                            <tr class="<?php if ($tv['status'] == 6): ?>danger<?php endif ?> <?php print(check_deadline(date('jS F Y G:i', $tv['due_time']))); ?>" id="tr-dashboard-task-<?php print($tv['id']); ?>">
                                                <td>#<?php print($tv['id']); ?></td>
                                                <td><span class="muted"><?php print(date('jS F Y G:i', $tv['date_created'])); ?></span></td>
                                                <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                                <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['implementor']); ?>"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>

                                                <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['uid']); ?>"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                                <td><?php print($tv['title']); ?></td>
                                                <td><?php print($project_title[$tv['pid']]); ?></td>
                                                <td><span class="muted"><?php print(substr($tv['desc'], 0,20)).' '.'...';?></span></td>
                                                <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                                <td class="text-left"><?php print(date('jS F Y G:i', $tv['due_time'])); ?></td>
                                                <?php if($user->role!=3):?>
                                                <td>
                                                    <?php if($user->role!=1):?>
                                                        <?php if ($user->id == $tv['uid'] ): ?>
                                                            <a href="javascript:void(0);" class="task-ready" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-play"></i></a>
                                                            <a href="javascript:void(0);" class="task-edit" data-id="<?php print($tv['id']); ?>"  style="text-decoration: none;"><i class="fa fa-pencil"></i></a>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                    <a href="javascript:void(0);"  class="task-view" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-eye"></i></a>
                                                    <?php if($user->role!=1 AND $user->id == $tv['uid'] ):?>
                                                    <a href="javascript:void(0);" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv['id']); ?>" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>
                                                    <?php endif ?>
                                                </td>
                                                <?php endif ?>
                                            </tr>
                                            <?php endif ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <?php else: ?>
                                <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;<?php print(lang('dsb_no_approve_tasks'))?></div></div>
                            <?php endif ?>
<!--                        <div class="text-center">-->
<!--                            <ul class="pagination pagination-lg pager" id="pager_approve_tasks"></ul>-->
<!--                        </div>-->
                        <?php endif ?>
<!-- END APPROVE-->
<!--STARTS READY-->
                        <?php if ($user->role==2): ?>
                        <div class="panel">
                            <?php if ($ready_tasks!=0): ?>
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="ready-task-table">
                                        <thead>
                                        <tr>
                                            <th width="5%" class="text-left"><?php print(lang('dsb_th_article'))?></th>
                                            <th width="8%" class="text-left"  style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_created'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_label'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_implementor'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_creator'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_title'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_project_to'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_description'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_priority'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_dueto'))?></th>
                                            <th width="3%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_view'))?></th>
                                            <th width="15%" class="text-left"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="ready_tasks_table">
                                        <?php foreach ($tasks as $tk => $tv): ?>
                                            <?php if ($tv['status'] == 5): ?>
                                                <tr id="ready-task-<?php print($tv['id']); ?>" class="<?php print(check_deadline(date('jS F Y G:i', $tv['due_time']))); ?>">
                                                    <td>#<?php print($tv['id']); ?></td>
                                                    <td><span class="muted"><?php print(date('jS F Y G:i', $tv['date_created'])); ?></span></td>
                                                    <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                                    <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['implementor']); ?>"><?php print(short_name($user_name[$tv['implementor']])); ?></a></td>
                                                    <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($tv['uid']); ?>"><?php print(short_name($user_name[$tv['uid']])); ?></a></td>
                                                    <td><?php print($tv['title']); ?></td>
                                                    <td><?php print($project_title[$tv['pid']]); ?></td>
                                                    <td><span class="muted"><?php print(substr($tv['desc'], 0,20)).' '.'...';?></span></td>
                                                    <td><span><i class="fa fa-circle circle-priority" style="<?php if ($tv['priority'] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv['priority'] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv['priority'] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv['priority']) ?></td>
                                                    <td class="text-left"><?php print(date('jS F Y G:i', $tv['due_time'])); ?></td>
                                                    <td class="text-center"><a href="javascript:void(0);"  class="task-view" data-id="<?php print($tv['id']); ?>" style="text-decoration: none;"><i class="fa fa-eye"></i></a></td>
                                                    <?php if ($user->id == $tv['implementor']): ?>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" style="color:#5cb85c;" class="btn btn-xs imp-adjust-btn task-process" data-id="<?php print($tv['id']); ?>" data-toggle="tooltip" data-placement="top" title="process"><i class="fa fa-play-circle"></i></a>
                                                        <a href="javascript:void(0);" data-id="<?php print($tv['id']); ?>" data-action="3" class="btn btn-xs imp-adjust-btn imp-control" data-toggle="tooltip" data-placement="top" title="complete"><i class="fa fa-check-circle"></i></a>
                                                        <a href="javascript:void(0);" style="color:#d9534f;" class="btn btn-xs imp-adjust-btn imp-control" data-id="<?php print($tv['id']); ?>" data-action="1" data-toggle="tooltip" data-placement="top" title="unwant"><i class="fa fa-eye-slash"></i></a>
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

                            <?php else: ?>
                                <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;<?php print(lang('dsb_no_ready_tasks'))?></div></div>
                            <?php endif ?>
                        </div>
                        <?php endif ?>
<!--                        <div class="text-center">-->
<!--                            <ul class="pagination pagination-lg pager" id="pager_ready_tasks"></ul>-->
<!--                        </div>-->
                        <!--                        END READY-->
                <?php endif ?>
                    </div>
<!--                end last tasks-->
<div class="row">
    <div class="col-lg-10 col-md-8">
        <p class="lead"><?php print(lang('dsb_tasks_in_process'))?>&nbsp;(<span id="calc-all-dsb_pr_tasks" ></span>)</p>
    </div>
    <div class="col-lg-2 col-md-4  pull-right search-form">
        <input type="text" id="search-dash-process-table" class=" form-control lights" placeholder="<?php print(lang('dsb_search'))?>"/>
    </div>
</div>
                <?php if ($process_tasks != FALSE): ?>
                    <div class="row-fluid">
                        <div class="panel">
                            <div class="panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-condensed" id="dash-process-table">
                                        <thead>
                                        <tr>
                                            <th width="5%" class="text-left"><?php print(lang('dsb_th_article'))?></th>
                                            <th width="8%" class="text-left"  style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_created'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_label'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_implementer'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_creator'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_title'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_project'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_description'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_status'))?></th>
                                            <th width="4%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_priority'))?></th>
                                            <th width="5%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_cts'))?></th>
                                            <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_dueto'))?></th>
                                            <th width="10%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('dsb_th_action'))?></th>
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
                                                    <?php if ($user->id == $tv['implementor'] && $user->role==2): ?>
                                                        <a href="javascript:void(0);" data-id="<?php print($tv['id']); ?>" data-cts="<?php print(check_cts($tv['cts'])); ?>"  class="btn btn-xs imp-adjust-btn imp-complete" data-toggle="tooltip" data-placement="top" title="complete"><i class="fa fa-check-circle"></i></a>
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
                    <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;<?php print(lang('dsb_no_process_tasks'))?></div></div>
                <?php endif ?>
                <!--   end last tasks-->
        </div>
        <?php if ($comments !=false): ?>
            <div class="col-md-3">
               <div class="row">
                   <div class="col-md-8">
                       <p class="lead" style="float: left;"><?php print(lang('dsb_activity_stream'))?></p>
                   </div>
                   <div class="col-md-4">
                <span class="search-form">
                    <input type="text" id="search-dash-comment" class=" form-control lights" placeholder="<?php print(lang('dsb_search'))?>"/>
                </span>
                   </div>
               </div>
<!--                start ajax-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php print(lang('dsb_comments'))?></h3>
                    </div>
                    <div class="panel-body comment comment-jsscroll" style="padding-right:0;max-height: 581px;">
                        <div class="new-comment-dashboard-ajax">
                        </div>
                        <?php $rev_comm = array_reverse($comments);?>
                        <?php foreach ($rev_comm as $ck=>$cv): ?>
                            <?php if ($cv['public'] == 0): ?>
                        <?php if ($cv['to'] == $user->id): ?>
                        <div class="sub-activity search-filter-comment">
                            <div class="activity-item-summary">
                                <div class="avatar-activity">
                                <span class="avatar-img">
                                    <a href="javascript:void(0);"><img src="<?php print(base_url());?>uploads/avatar/<?php if (isset($avatars[$cv['uid']])): ?><?php print($avatars[$cv['uid']]); ?><?php else: ?>placeholder_user.jpg<?php endif ?>" height="45"></a>
                                    <span class="mini-role  <?php if ($get_users_online[$cv['uid']]==1): ?>green <?php else: ?>grey<?php endif ?>" id="status-online-comment-<?php print($cv['uid']); ?>"><?php print(show_role_abbr($users_title_roles[$cv['uid']])); ?></span>
                                </span>
                                </div>
                                <a href="javascript:void(0);" class="activity-item-user activity-item-author qm-send-comment" target="_parent" data-uid="<?php print($cv['uid']); ?>"> <?php print(short_name($user_name[$cv['uid']])); ?></a>
                                &nbsp;<span class="label label-warning label-xs">subject</span>&nbsp;
                                <a href="javascript:void(0);" class="send-comment-subject" target="_parent"  data-uid="<?php print($cv['uid']); ?>" data-title="<?php print($cv['subject']); ?>" ><span class="resolved-link"><?php print($cv['subject']); ?></span></a>
                                <div class="com-last-text"><?php print($cv['text']); ?></div>
                                <div class="activity-item-description">

                                    <div class="activity-item-info">
                                        <i class="fa fa-clock-o clock-activity"></i>
                                        <span class="timestamp"><?php print(time_ago($cv['date_created'])); ?></span>&nbsp;
                                       <span class="activity-item-action"><a href="javascript:void(0);" class="activity-item-comment-link qm-send-comment" data-uid="<?php print($cv['uid']); ?>">Comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
<!--                end ajax-->
            </div>
        <?php endif ?>
    </div>
        <!-- ./row-->
    </div>
</div>
<!--logs-->
<!--test-->

<?php //if ($introduce == 0): ?>
<!--    --><?php //include('introduce.php'); ?>
<?php //endif ?>

<?php include('logs_view.php'); ?>
<?php include('right_float_view.php'); ?>

