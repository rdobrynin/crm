<!DOCTYPE html>
<html lang="<?php print(show_pref_lang($current_language))?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Project management app">
    <meta name="author" content="Roman Dobrynin">

        <!--

             ,ggg,      gg      ,gg
            dP""Y8a     88     ,8P                             I8          I8                                                    ,dPYb,                          I8
            Yb, `88     88     d8'                             I8          I8                                                    IP'`Yb                          I8
             `"  88     88     88                           88888888    88888888                                                 I8  8I                   gg  88888888
                 88     88     88                              I8          I8                                                    I8  8bgg,                ""     I8
                 88     88     88    ,gggg,gg   ,ggg,,ggg,     I8          I8      ,ggggg,         ,ggg,,ggg,,ggg,     ,gggg,gg  I8 dP" "8   ,ggg,        gg     I8
                 88     88     88   dP"  "Y8I  ,8" "8P" "8,    I8          I8     dP"  "Y8ggg     ,8" "8P" "8P" "8,   dP"  "Y8I  I8d8bggP"  i8" "8i       88     I8
                 Y8    ,88,    8P  i8'    ,8I  I8   8I   8I   ,I8,        ,I8,   i8'    ,8I       I8   8I   8I   8I  i8'    ,8I  I8P' "Yb,  I8, ,8I       88    ,I8,
                  Yb,,d8""8b,,dP  ,d8,   ,d8b,,dP   8I   Yb, ,d88b,      ,d88b, ,d8,   ,d8'      ,dP   8I   8I   Yb,,d8,   ,d8b,,d8    `Yb, `YbadP'     _,88,_ ,d88b,
                   "88"    "88"   P"Y8888P"`Y88P'   8I   `Y888P""Y88    88P""Y88P"Y8888P"        8P'   8I   8I   `Y8P"Y8888P"`Y888P      Y8888P"Y888    8P""Y888P""Y88



                                                           ad88888ba            ,a8a,    d8'
     ,dPYb,                 I8      I8                    d8"     "8b          ,8" "8,  d8'                      ,dPYb,                           ,dPYb,
     IP'`Yb                 I8      I8                    ""      a8P          d8   8b ""                        IP'`Yb                           IP'`Yb
     I8  8I              8888888888888888                      ,a8P"           88   88                           I8  8I                           I8  8I      gg
     I8  8'                 I8      I8                        d8"              88   88                           I8  8'                           I8  8bgg,   ""
     I8 dP        ,ggg,     I8      I8     ,ggg,    ,gggggg,  88               Y8   8P     ,ggg,,ggg,,ggg,       I8 dP    ,ggggg,      ,ggggg,    I8 dP" "8   gg    ,ggg,,ggg,     ,gggg,gg
     I8dP   88gg i8" "8i    I8      I8    i8" "8i   dP""""8I  88               `8, ,8'    ,8" "8P" "8P" "8,      I8dP    dP"  "Y8ggg  dP"  "Y8ggg I8d8bggP"   88   ,8" "8P" "8,   dP"  "Y8I
     I8P    8I   I8, ,8I   ,I8,    ,I8,   I8, ,8I  ,8'    8I              8888  "8,8"     I8   8I   8I   8I      I8P    i8'    ,8I   i8'    ,8I   I8P' "Yb,   88   I8   8I   8I  i8'    ,8I
    ,d8b,  ,8I   `YbadP'  ,d88b,  ,d88b,  `YbadP' ,dP     Y8, aa          `8b,  ,d8b,    ,dP   8I   8I   Yb,    ,d8b,_ ,d8,   ,d8'  ,d8,   ,d8'  ,d8    `Yb,_,88,_,dP   8I   Yb,,d8,   ,d8I
    8P'"Y88P"'  888P"Y88888P""Y8888P""Y88888P"Y8888P      `Y8 88            "Y88P" "Y8   8P'   8I   8I   `Y8    8P'"Y88P"Y8888P"    P"Y8888P"    88P      Y88P""Y88P'   8I   `Y8P"Y8888P"888
                                                                                                                                                                                       ,d8I'
                                                                                                                                                                                     ,dP'8I
                                                                                                                                                                                    ,8"  8I
                                                                                                                                                                                    I8   8I
                                                                                                                                                                                    `8, ,8I
                                                                                                                                                                                     `Y8P"

     ,dPYb,                                                                                     I8    ,dPYb,                                                         I8
     IP'`Yb                                                                                     I8    IP'`Yb                                                         I8
     I8  8I                                                                                  88888888 I8  8I                            gg                        88888888
     I8  8'                                                                                     I8    I8  8'                            ""                           I8
     I8 dP     ,ggggg,     ,gggggg,        ,gggg,gg   ,ggg,,ggg,        ,ggg,    ,ggg,,ggg,     I8    I8 dPgg,   gg      gg    ,g,      gg     ,gggg,gg    ,g,       I8
     I8dP     dP"  "Y8ggg  dP""""8I       dP"  "Y8I  ,8" "8P" "8,      i8" "8i  ,8" "8P" "8,    I8    I8dP" "8I  I8      8I   ,8'8,     88    dP"  "Y8I   ,8'8,      I8
     I8P     i8'    ,8I   ,8'    8I      i8'    ,8I  I8   8I   8I      I8, ,8I  I8   8I   8I   ,I8,   I8P    I8  I8,    ,8I  ,8'  Yb    88   i8'    ,8I  ,8'  Yb    ,I8,
    ,d8b,_  ,d8,   ,d8'  ,dP     Y8,    ,d8,   ,d8b,,dP   8I   Yb,     `YbadP' ,dP   8I   Yb, ,d88b, ,d8     I8,,d8b,  ,d8b,,8'_   8) _,88,_,d8,   ,d8b,,8'_   8)  ,d88b,
    PI8"8888P"Y8888P"    8P      `Y8    P"Y8888P"`Y88P'   8I   `Y8    888P"Y8888P'   8I   `Y888P""Y8888P     `Y88P'"Y88P"`Y8P' "YY8P8P8P""Y8P"Y8888P"`Y8P' "YY8P8P88P""Y88
     I8 `8,
     I8  `8,
     I8   8I
     I8   8I
     I8, ,8'
      "Y8P'


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