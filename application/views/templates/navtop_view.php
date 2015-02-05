<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-left">
    <li class="sidebar-brand"><span class="avatar-top">
            <span class="avatar-img-ajax"></span>
            <span class="avatar-img">
               <?php if ($avatar != FALSE): ?>
                  <a href="<?php print(base_url());?>profile"><img src="<?php print base_url().'uploads/avatar/'.($avatar); ?>"  height="45"></a>
               <?php else: ?>
                 <a href="<?php print(base_url());?>profile"><img src="<?php print base_url().'uploads/avatar/'.($user[0]['avatar']); ?>"  height="45"></a>
               <?php endif ?>
            </span></span>

        <span class="avatar-name visible-lg"><?php print(show_role($user[0]['role'])); ?></span>
    </li>
  </ul>
<div class="show-info"><div class="show-info-content"></div><div class="expandable-image"></div></div>
  <div class="show-info-error"><div class="show-info-content"></div><div class="expandable-nagative-image"></div></div>
  <div class="show-info-online"><div class="show-info-content-online"></div></div>

  <ul class="nav navbar-nav navbar-right navbar-user">
      <li id="li-comments"> <a href="javascript:void(0);" onClick="SendComment(<?php print($user[0]['id'])?>)" ><span class="icon-comment"></a></li>
      <li id="float-users"> <a href="javascript:void(0);"><span class="icon-users"></span></a></li>
      <li class="dropdown user-dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown"><span class="icon-book"></span></a>
          <ul class="dropdown-menu dropdown-user">
              <li> <a href="javascript:void(0);">Agile Ansewrs</a></li>
              <li> <a href="javascript:void(0);">Online Help</a></li>
              <li> <a href="http://www.brilliant-solutions.eu" target="blank">Brilliant Solutions</a></li>
          </ul>
      </li>
      <li class="dropdown user-dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown"><span class="icon-add"></span></a>
          <ul class="dropdown-menu dropdown-user">
              <?php if ($client == FALSE): ?>
                  <?php if ($user[0]['role'] ==5 OR $user[0]['role']==4): ?>
                      <li class="add-client"><a href="<?php print(base_url());?>addclient"><i class="fa fa-plus"></i><?php print(lang('menu_add_client')); ?></a></li>
                  <?php endif ?>

              <?php endif ?>
              <?php if ($user[0]['role'] ==5 OR $user[0]['role']==4): ?>
              <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#invite" title="invite"><i class="fa fa-plus"></i><?php print(lang('menu_invite_person')); ?></a></li>

                  <li class="add-client"><a href="javascript:void(0);" data-toggle="modal" data-target="#addproject_modal" title="create project"><i class="fa fa-plus"></i><?php print(lang('menu_add_project')); ?></a></li>
                  <?php endif ?>
              <?php if ($projects != false): ?><li class="add-client"><a href="javascript:void(0);" data-toggle="modal" data-target="#addtask_pr_modal" title="create task"><i class="fa fa-plus"></i><?php print(lang('menu_add_task')); ?></a></li><?php endif ?>

          </ul>
      </li>

      <li class="dropdown user-dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> <span style="text-transform: capitalize;"><?php print(show_lang($current_language));?></span>
              <b class="caret"></b></a>
          <ul class="dropdown-menu dropdown-user">
              <li><a href='<?php print(base_url());?>langswitch/switchLanguage/estonian'>&nbsp;Eesti</a></li>
              <li><a href='<?php print(base_url());?>langswitch/switchLanguage/english'>&nbsp;English</a></li>
              <li><a href='<?php print(base_url());?>langswitch/switchLanguage/russian'>&nbsp;Русский</a></li>
          </ul>
      </li>
    <li class="dropdown user-dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown"><span class="icon-user"></span>&nbsp;
        <?php print($user[0]['first_name'].' '. lastname_letter($user[0]['last_name']))?>
        <b class="caret"></b></a>
      <ul class="dropdown-menu dropdown-user">
        <li><a href="<?php print(base_url());?>profile"><?php print(lang('menu_profile'))?></a></li>


        <li><a data-toggle="modal" href="#settings"><?php print(lang('menu_settings'))?></a></li>
        <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
          <li><a href="<?php print(base_url());?>users"><?php print(lang('menu_admin_users'))?></a></li>
        <? endif?>
        <li class="divider"></li>
        <li id="logout"><a href="<?php print(base_url());?>logout"><i class="fa fa-power-off"></i><?php print(lang('menu_logout'))?></a></li>
      </ul>
    </li>
  </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
