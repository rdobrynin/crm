<?php if ($projects != false AND $user[0]['role'] == 5 OR $projects != false AND $user[0]['role'] == 4): ?>
    <div class="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <p class="lead">Administer Projects</p>

            <div class="row">
                <?php foreach ($projects as $pk => $pv): ?>
                    <?php if (isset($user_projects[$pv['pid']])): ?>
                <?php if ($user_projects[$pv['pid']] == $user[0]['id'] OR $user[0]['role'] == 5): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="well well-sm" style="background-color: rgb(231, 231, 231); border-color: #BDBDBD;">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading" style="margin-bottom: 10px;">#<?php print($pv['pid']); ?>&nbsp;(<?php print($pv['title']); ?>)</h4>
                                    <p>Owner:&nbsp;<a href="javascript:void();" onClick="qmSendComment(<?php print($pv['owner']); ?>)"><?php print(short_name($user_name[$pv['owner']])); ?></a></p>
                                    <p>Created:&nbsp;<b><?php print($pv['date_created']); ?></b></p>
                                    <p>Description:&nbsp;<b><?php print($pv['description']); ?></b></p>
                                    <p>Status:&nbsp;&nbsp;<span class="label label-primary label-xs">open</span></p>
                                    <p>Total tasks:&nbsp;&nbsp;<span class="badge badge-task" id="route-task"><?php if (isset($project_tasks[$pv['pid']])): ?><?php print(count($project_tasks[$pv['pid']])); ?><?php else:?>0<?php endif ?></span></p>
                                    <p>Users in workflow:&nbsp;&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>

        </div>
    </div>
<?php endif ?>
