<?php if ($to[0]['id'] == $user->id): ?>
    <div class="sub-activity">
        <div class="activity-item-summary">
            <div class="avatar-activity">
              <span class="avatar-img">
                 <a href="javascript:void(0);"><img src="<?php print(base_url());?>uploads/avatar/<?php if (isset($avatars[$cv[0]['uid']])): ?><?php print($avatars[$cv[0]['uid']]); ?><?php else: ?>placeholder_user.jpg<?php endif ?>" height="45"></a>
                  <span class="mini-role  <?php if ($get_users_online[$cv[0]['uid']]==1): ?>green <?php else: ?>grey<?php endif ?>" id="status-online-comment-<?php print($cv[0]['uid']); ?>">
                      <?php print(show_role_abbr($users_title_roles[$cv[0]['uid']])); ?>
                      <?php if ($users_title_roles[$cv[0]['uid']] == 5): ?>A<?php endif ?>
                      <?php if ($users_title_roles[$cv[0]['uid']] == 4): ?>M<?php endif ?>
                      <?php if ($users_title_roles[$cv[0]['uid']] == 3): ?>C<?php endif ?>
                      <?php if ($users_title_roles[$cv[0]['uid']] == 2): ?>I<?php endif ?>
                  </span></span>
            </div>
            <a href="javascript:void(0);" class="activity-item-user activity-item-author" target="_parent" onClick="qmSendComment(<?php print($cv[0]['uid']); ?>)"> <?php print(short_name($user_name[$cv[0]['uid']])); ?></a>&nbsp;<span class="label label-warning label-xs">subject</span>&nbsp; <a href="javascript:void(0);" target="_parent" onClick="qmSubjectSendComment('<?php print($cv[0]['subject']); ?>','<?php print($cv[0]['uid']); ?>')"><span class="resolved-link"><?php print($cv[0]['subject']); ?></span></a>
            <div class="com-last-text"><?php print($cv[0]['text']); ?></div>
            <div class="activity-item-description">

                <div class="activity-item-info">
                    <i class="fa fa-clock-o clock-activity"></i>
                    <span class="timestamp"><?php print(time_ago($cv[0]['date_created'])); ?></span>&nbsp;
                    <span class="activity-item-action"><a href="javascript:void(0);" class="activity-item-comment-link" onClick="qmSendComment(<?php print($cv[0]['uid']); ?>)">Comment</a></span>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<?php //var_dump($to); ?>