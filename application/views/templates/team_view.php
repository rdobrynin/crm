<!-- Page content -->
<?php include('navtop_view.php'); ?>
<?php include('sidebar_view.php'); ?>
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Team</p>
                <!-- Keep all page content within the page-content inset div! -->
                        <?php foreach ($users as $ak => $u): ?>
                            <ul>
                                <?php if (($u['status'] == 1)): ?>
                                    <li><span
                                            class="label label-xs label-success label-round"></span><?php print($u['first_name'] . ' ' . $u['last_name']); ?>
                                    </li>
                                <?php else: ?>
                                    <li><span
                                            class="label label-xs label-default label-round"></span><?php print($u['first_name'] . ' ' . $u['last_name']); ?>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?php include('logs_view.php'); ?>
</div>
<?php include('add_role_view.php'); ?>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php'); ?>
