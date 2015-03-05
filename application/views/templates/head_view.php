<!DOCTYPE html>
<html lang="<?php print(show_pref_lang($current_language))?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" href="http://brilliant-solutions.eu/ico/icon.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="http://brilliant-solutions.eu/ico/icon-72.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="http://brilliant-solutions.eu/ico/icon@2x.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="http://brilliant-solutions.eu/ico/icon-72@2x.png"/>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="http://brilliant-solutions.eu/ico/favicon.ico"/>
    <title>Brilliant Project Management</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php print(base_url()); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css/jquery.autocomplete.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css/font-awesome.css" rel="stylesheet">
    <?php if ($user->sidebar_left == '1'): ?>
        <link href="<?php print(base_url()); ?>css/sidebar_left_mini.css" rel="stylesheet">
        <?php else: ?>
        <link href="<?php print(base_url()); ?>css/sidebar_left.css" rel="stylesheet">
    <?php endif ?>
    <?php if ($user->sidebar_right == '1'): ?>
        <link href="<?php print(base_url()); ?>css/sidebar_right_open.css" rel="stylesheet">
    <?php else: ?>
        <link href="<?php print(base_url()); ?>css/sidebar_right_close.css" rel="stylesheet">
    <?php endif ?>
    <!-- Add custom CSS here -->
    <link href="<?php print(base_url()); ?>css/sidebar.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/add_client.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/users.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/mini_inbox.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/body.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/top.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/elements.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/dashboard.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/responsive.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/task_table.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/help_block.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/right_sidebar.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/modal.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/btn.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/logs.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>css/tasker_fonts.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <script src="<?php print(base_url()); ?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php print(base_url()); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/bootstrap-select.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/jquery.mCustomScrollbar.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/bootstrap-switch.min.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/jquery.bootstrap.wizard.min.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/ajaxfileupload.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/bootstrap-confirmation.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/jquery.datetimepicker.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/jquery.autocomplete.js"></script>
    <script src="<?php print(base_url()); ?>assets/js/bootstrap-toggle.js"></script>
    <script src="<?php print(base_url()); ?>js/dashboard.js"></script>
    <script src="<?php print(base_url()); ?>js/functions.js"></script>
    <script src="<?php print(base_url()); ?>js/interval.js"></script>
    <script src="<?php print(base_url()); ?>js/timer.js"></script>
    <script src="<?php print(base_url()); ?>js/script.js"></script>
    <script src="<?php print(base_url()); ?>js/onload.js"></script>
    <script src="<?php print(base_url()); ?>js/ajax.js"></script>
    <script src="<?php print(base_url()); ?>js/profile.js"></script>
    <script src="<?php print(base_url()); ?>js/pager.js"></script>


    <!-- Bootstrap core CSS -->
<!--    <link rel="stylesheet/less" type="text/css" href="--><?php //print(base_url()); ?><!--less/style.less">-->
    <script src="<?php print(base_url()); ?>assets/js/less.min.js" type="text/javascript"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php print(base_url()); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
<!--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
<!--    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>-->
<!--    <script data-main="--><?php //print(base_url());?><!--js/app_main.js" src="--><?php //print(base_url());?><!--assets/js/require.js"></script>-->

</head>
<body>
<div class="loader"></div>
<div class="b-overlay"></div>
<div class="task-view-wrapper">
<div class="tasks-view">
<div class="task-view-header"></div>
    <div class="task-view-body">
        <div class="row">
            <div class="col-xs-12 task-view-content">
            </div>
        </div>
    </div>
</div>
</div>

<div class="right-sidebar">
</div>