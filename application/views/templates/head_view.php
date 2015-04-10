<!DOCTYPE html>
<html lang="<?php print(show_pref_lang($current_language))?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Project management app">
    <meta name="author" content="Roman Dobrynin">

    <!--


888       888                                                        888                888             888   888                      .d8888b.
888   o   888                                                        888                888             888   888                     d88P  Y88b
888  d8b  888                                                        888                888             888   888                          .d88P
888 d888b 888 8888b. 88888b. 88888b.  8888b.    88888b.d88b.  8888b. 888  888 .d88b.    88888b.  .d88b. 888888888888 .d88b. 888d888      .d88P"
888d88888b888    "88b888 "88b888 "88b    "88b   888 "888 "88b    "88b888 .88Pd8P  Y8b   888 "88bd8P  Y8b888   888   d8P  Y8b888P"        888"
88888P Y88888.d888888888  888888  888.d888888   888  888  888.d888888888888K 88888888   888  88888888888888   888   88888888888          888
8888P   Y8888888  888888  888888  888888  888   888  888  888888  888888 "88bY8b.       888 d88PY8b.    Y88b. Y88b. Y8b.    888
888P     Y888"Y888888888  888888  888"Y888888   888  888  888"Y888888888  888 "Y8888    88888P"  "Y8888  "Y888 "Y888 "Y8888 888          888



8888888b. 8888888b.
888   Y88b888  "Y88b
888    888888    888
888   d88P888    888
8888888P" 888    888
888 T88b  888    888
888  T88b 888  .d88P
888   T88b8888888P"


         Best,
         Roman Dobrynin
         email: roman.dobrynin@gmail.com
         linkedin: ee.linkedin.com/in/rdobrynin/
         skype: roman.dobrynin
         github: https://github.com/rdobrynin

         -->

    <link rel="apple-touch-icon" href="http://brilliant-solutions.eu/ico/icon.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="http://brilliant-solutions.eu/ico/icon-72.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="http://brilliant-solutions.eu/ico/icon@2x.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="http://brilliant-solutions.eu/ico/icon-72@2x.png"/>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="http://brilliant-solutions.eu/ico/favicon.ico"/>
    <title>Brilliant Project Management</title>
    <link href="<?php print(base_url()); ?>css/style.css" rel="stylesheet">
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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet/less" type="text/css" href="<?php print(base_url()); ?>less/style.less">
<!--    <script src="--><?php //print(base_url()); ?><!--assets/js/less.min.js" type="text/javascript"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php print(base_url()); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
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