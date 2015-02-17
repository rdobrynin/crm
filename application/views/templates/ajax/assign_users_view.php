<!--AJAX HTML GET METHODS-->
<?php if ($assign_users != false OR !empty($assign_users)): ?>
<ul class="assign-users-jsscroll">
    <?php foreach ($assign_users as $uk=>$uv): ?>
        <?php if ($uv->role !=5 AND $uv->pid !=$id): ?>



                <li id="assign-user-li-<?php print($uv->id); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="avatar-activity" style="1px solid rgb(221, 221, 221)">
                                <span class="avatar-img"><a href="javascript:void(0)"><img src="<?php print(base_url()); ?>uploads/avatar/<?php if (isset($avatars[$uv->id])): ?><?php print($avatars[$uv->id]); ?><?php else: ?>placeholder_user.jpg<?php endif ?>" height="45"></a></span>
                            <span id="status-assign-user-<?php print($uv->id); ?>" class="mini-role <?php if ($get_users_online[$uv->id] == 1): ?>green <?php else: ?>grey<?php endif ?>">
                                <?php if ($users_title_roles[$uv->id] == 4): ?>M<?php endif ?>
                                <?php if ($users_title_roles[$uv->id] == 3): ?>C<?php endif ?>
                                <?php if ($users_title_roles[$uv->id] == 2): ?>I<?php endif ?>
                            </span>
                            </div>
                            <span class="assign-name"> <?php print($user_name[$uv->id]); ?></span>
                            <span class="pull-right"><a href="javascript:void(0)"  onClick="assignUserProject('<?php print($uv->id); ?>','<?php print($id); ?>')" class="btn btn-success">Assign</a></span>
                        </div>
                    </div>
                </li>



        <?php endif ?>
    <?php endforeach ?>
</ul>
<?php endif ?>