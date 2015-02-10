<div class="right-float-sidebar">
<div class="search-form-sidebar"><input type="text" id="search-sidebar-users" class=" form-control lights" placeholder="live search"/></div>
    <div class="close-right-sidebar"><a href="javascript:void(0);"><i class="fa fa-times" style="top: -2px !important;position: relative;"></i></a></div>

    <?php if ($users !=null): ?>

    <?php foreach ($users as $uk => $uv): ?>

        <?php if ($uv['id'] !== $user[0]['id']): ?>
        <div class="user-float-block">
            <div class="avatar-activity">
                <span class="avatar-img"><a href="javascript:void(0);"><img src="<?php print base_url() . 'uploads/avatar/'.$uv['avatar']; ?>" height="32"></a></span>
            </div>
            <div class="sidebar-fullname"><?php print($uv['first_name']. ' '.$uv['last_name']); ?></div>
            <div class="user-details-count-wrapper">
                <div class="status-icon  <?php if ($uv['status']==1): ?>green <?php else: ?>grey<?php endif ?>" id="status-online-<?php print($uv['id']); ?>"></div>
            </div>
            <div class="sidebar-position"><?php print(show_role($uv['role'])); ?></div>
            <div class="sidebar-position"><a href="mailto:<?php print($uv['email']); ?>"><?php print($uv['email']); ?></a></div>
            <div class="sidebar-position phone"><?php print($uv['phone']); ?>&nbsp;<span class="label label-xs label-primary sms sms-send-alert">sms</span>&nbsp;<a href="javascript:void(0);" class="pull-right" onClick="qmSendComment(<?php print($uv['id']); ?>)"><i class="fa fa-comment comment-sidebar" id="comm-<?php print($uv['id']); ?>"></i></a></div>
        </div>
        <?php endif ?>
        <div class="close-right-sidebar"><a href="javascript:void(0);"><span class="icon-remove"></span></a></div>
    <?php endforeach ?>

    <?php endif ?>

</div>
