<!--AJAX HTML GET METHODS-->
<ul class="assign-users-jsscroll">
    <?php foreach ($users as $uv): ?>
        <?php if ($users_title_roles[$uv['id']] != 5): ?>
            <?php if (isset($assign_users[$uv['id']])): ?>
                <li id="assign-user-li-"<?php print($assign_users[$uv['id']]); ?>>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="avatar-activity" style="1px solid rgb(221, 221, 221)">
                                <span class="avatar-img"><a href="javascript:void(0)"><img src="<?php print(base_url()); ?>uploads/avatar/<?php if (isset($avatars[$assign_users[$uv['id']]])): ?><?php print($avatars[$assign_users[$uv['id']]]); ?><?php else: ?>placeholder_user.jpg<?php endif ?>" height="45"></a></span>
                            <span id="status-assign-user-<?php print($uv['id']); ?>" class="mini-role  <?php if ($get_users_online[$assign_users[$uv['id']]] == 1): ?>green <?php else: ?>grey<?php endif ?>">
                                <?php if ($users_title_roles[$assign_users[$uv['id']]] == 4): ?>M<?php endif ?>
                                <?php if ($users_title_roles[$assign_users[$uv['id']]] == 3): ?>C<?php endif ?>
                                <?php if ($users_title_roles[$assign_users[$uv['id']]] == 2): ?>I<?php endif ?>
                            </span>
                            </div>
                            <span class="assign-name"> <?php print($user_name[$uv['id']]); ?></span>
                            <span class="pull-right"><a href="javascript:void(0)" class="btn btn-success">assign</a></span>
                        </div>
                    </div>
                </li>
            <?php else: ?>
                <div style="margin-bottom: 10px; float: left; width: 100%" class="label label-danger label-signin"><i class="fa fa-exclamation-circle"></i>&nbsp;No found any more users for assign to this project</div>
                <?php return false; ?>
            <?php endif ?>
        <?php endif ?>
    <?php endforeach ?>
</ul>