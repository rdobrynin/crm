<!DOCTYPE html>
<html lang="<?php print(show_pref_lang($current_language))?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Project management app">
    <meta name="author" content="Roman Dobrynin">

        <!--

        +++++++++++           ++++++++++
        +++++++++++           +++++++++++
        ++       ++           ++        ++
        ++       ++           ++         ++
        ++ ++++++++           ++          ++
        ++ ++++++++           ++          ++
        ++ +++                ++          ++
        ++   +++              ++          ++
        ++     +++            ++          ++
        ++      +++           ++         ++
        ++       +++    +++   ++        ++    +++
        ++        +++   +++   ++++++++++      +++


        Want to make it  better? I'm looking for an enthusiast :)))

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
    <!-- Bootstrap core CSS -->
<!--    <link rel="stylesheet/less" type="text/css" href="--><?php //print(base_url()); ?><!--less/style.less">-->
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