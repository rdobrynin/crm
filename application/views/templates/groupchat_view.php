<?php include('navtop_view.php'); ?>
<?php include('sidebar_view.php'); ?>
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <p class="lead"><?php print(lang('menu_groupchat')); ?> </p>
                <?php if ( $user[0]['id'] ==14): ?>

<!--                    TODO-->
<!--                    Chat wrapper here-->

                <div class="col-md-8">


</div>

                <?php else: ?>
                    <h2>In development phase</h2>
                <?php endif ?>
                </div>
        </div>
    </div>
</div>
<!--logs-->

<?php include('logs_view.php'); ?>

</div>
<!--MODAL-->
<?php include('add_role_view.php'); ?>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php'); ?>