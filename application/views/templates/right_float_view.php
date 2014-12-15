<div class="right-float-sidebar">
    <div class="close-right-sidebar"><a href="#"><i class="fa fa-times" style="top: -2px !important;position: relative;"></i></a></div>
    <?php foreach ($users as $uk => $uv): ?>
        <div class="user-float-block">
            <div class="avatar-activity">
                <span class="avatar-img"><a href="#"><img src="<?php print base_url() . 'uploads/avatar/'.$uv['avatar']; ?>" height="45"></a></span>
            </div>
            <div class="sidebar-fullname"><?php print($uv['first_name']. ' '.$uv['last_name']); ?>&nbsp;<a href="#"  onClick="qmSendComment(<?php print($uv['id']); ?>)"><i class="fa fa-comment comment-sidebar" id="comm-<?php print($uv['id']); ?>"></i></a></div>
            <div class="user-details-count-wrapper">
                <div class="status-icon  <?php if ($uv['status']==1): ?>green <?php else: ?>grey<?php endif ?>"></div>
            </div>
            <div class="sidebar-position"><?php print(show_role($uv['role'])); ?></div>
            <div class="sidebar-position"><a href="mailto:<?php print($uv['email']); ?>"><?php print($uv['email']); ?></a></div>
            <div class="sidebar-position phone"><?php print($uv['phone']); ?>&nbsp;<span class="label label-xs label-primary sms sms-send-alert">sms</span></div>
        </div>
        <div class="close-right-sidebar"><a href="#"><i class="fa fa-times"></i></a></div>
    <?php endforeach ?>
</div>
