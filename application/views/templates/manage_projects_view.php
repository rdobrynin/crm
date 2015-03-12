<?php if ($projects != false AND $user->role == 5 OR $projects != false AND $user->role == 4): ?>
    <div class="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <p class="lead">Administer Projects</p>
            <div class="row manage-project">
                <?php foreach ($projects as $pk => $pv): ?>
                    <?php if (isset($user_projects[$pv['pid']])): ?>
                <?php if ($user_projects[$pv['pid']] == $user->id OR $user->role== 5): ?>
                    <div class="col-md-4 col-lg-3 col-sm-12 manage-project-block">
                        <div class="well well-sm" style="background-color: rgb(231, 231, 231); border-color: #BDBDBD; min-height: 500px;">
                            <div class="media" style="margin-bottom: 20px">
                                <div class="media-body" style="padding-bottom: 20px;border-bottom: 1px solid rgb(208, 208, 208); min-height: 400px;">
                                    <h4 class="media-heading" style="margin-bottom: 10px;border-bottom: 1px solid rgb(208, 208, 208);padding-bottom: 10px;">#<?php print($pv['pid']); ?>&nbsp;(<?php print($pv['title']); ?>)</h4>
                                    <p>Owner:&nbsp;<a href="javascript:void(0);" class="qm-send-comment" data-uid="<?php print($pv['owner']); ?>"><?php print(short_name($user_name[$pv['owner']])); ?></a></p>
                                    <p>Created:&nbsp;<b><?php print(date('jS F Y', $pv['date_created'])); ?></b></p>
                                    <p>Last edited:&nbsp;<b> <?php if ($pv['date_edited'] == 0): ?>none<?php else: ?><?php print(date('jS F Y', $pv['date_edited'])); ?><?php endif ?></b></p>

                                    <p>Description:&nbsp;<b><?php print($pv['description']); ?></b></p>

                                    <p>Status:&nbsp;&nbsp;<?php if ($pv['froze'] == 0): ?><span class="label label-primary label-xs">open</span><?php else: ?><span class="label label-danger label-xs">frozen</span><?php endif ?></p>
                                    <p>Total tasks:&nbsp;&nbsp;<span class="badge badge-task" id="route-task"><?php if (isset($project_all_tasks[$pv['pid']])): ?><?php print(count($project_all_tasks[$pv['pid']])); ?><?php else:?>0<?php endif ?></span></p>
                                    <p>Assigned users:&nbsp;&nbsp;
                                        <span id="assign-panel-<?php print($pv['pid']); ?>">
                                        <?php foreach ($all_projects as $ak => $av): ?>
                                            <?php if ($av['pid'] ==$pv['pid'] AND $users_title_roles[$av['uid']] !=5 AND $av['uid'] != $pv['owner'] AND $av['assign'] !=0): ?>
<span class="label label-default label-tag" style="cursor: default"><i class="fa fa-mail"></i>&nbsp;<span class="get_old_mail"><?php print(short_name($user_name[$av['uid']])); ?>&nbsp;(<?php print(show_role_abbr($users_title_roles[$av['uid']])); ?>)&nbsp;<i class="fa fa-times unsign-user" data-uid="<?php print($av['uid']); ?>"></i></span>
                            &nbsp;&nbsp;&nbsp;</span>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </span>
                                    </p>
                                </div>
                            </div>
                            <?php if ($projects[$pv['pid']]['owner'] == $user->id): ?>
                                <?php if ($projects[$pv['pid']]['froze'] == 0): ?>
                                    <a href="javascript:void(0);" data-id="<?php print($pv['pid']); ?>" class="btn btn-danger froze-project">Froze project</a>&nbsp;
                                <?php else: ?>
                                    <a href="javascript:void(0);" data-id="<?php print($pv['pid']); ?>" class="btn btn-primary unfroze-project">Unfroze project</a>&nbsp;
                                <?php endif ?>
                                    <a href="javascript:void(0);" data-id="<?php print($pv['pid']); ?>" class="btn btn-success test assign-user-modal <?php if ($projects[$pv['pid']]['froze'] == 1):  ?><?php print('disabled'); ?><?php endif ?>">Assign member</a>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>



