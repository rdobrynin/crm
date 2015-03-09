<!-- Page content -->
<?php include('navtop_view.php'); ?>
<?php include('sidebar_view.php'); ?>
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Team&nbsp;(<?php print(count($users)); ?>)</p>
                <div class="row">
                    <?php if ($users != null): ?>
                        <?php foreach ($users as $uk => $uv): ?>
<!--                            --><?php //var_dump($uv); ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="well well-sm" style="background-color: rgb(231, 231, 231); border-color: #BDBDBD;">
                                    <div class="media">
                                        <?php if (($uv['status'] == 1)): ?><span class="label label-xs label-success" style="left: -88px; position: relative;">Online</span><?php else: ?><span class="label label-xs label-default" style="left: -88px; position: relative;">Offline</span><?php endif ?>
                                        <div class="avatar-activity">
                                            <span class="avatar-img"><a href="javascript:void(0);"><img src="<?php print base_url() . 'uploads/avatar/' . $uv['avatar']; ?>" height="80"></a></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading" style="margin-bottom: 10px;"><?php print($uv['first_name'] . ' ' . $uv['last_name']); ?></h4>
                                          <p>Email:&nbsp;<a href="mailto:<?php print($uv['email']); ?>"><?php print($uv['email']); ?></a></p>

                                                <p>GSM:&nbsp;<?php if ($uv['phone'] !==''): ?><?php print($uv['phone']); ?><?php else: ?>absent<?php endif ?></p>
                                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                                <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>&nbsp;Message</a>&nbsp;
                                                <a href="#" class="btn btn-xs btn-primary " style="cursor: pointer">sms</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('logs_view.php'); ?>
</div>
<?php include('add_role_view.php'); ?>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php'); ?>
