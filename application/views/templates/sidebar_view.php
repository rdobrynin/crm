<div id="wrapper">
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <a href="javascript:void(0);"><span class="icon-rightarrow mirror" id="switch-left-bar"></span></a>
    <a href="javascript:void(0);"><span class="icon-rightarrow" id="switch-left-bar-back"></span></a>
    <?php $url_arg = $this->uri->segment(1);?>

    <ul class="sidebar-nav">
      <li class="<? $url_arg=='dashboard' ? print('active') : print('') ?>"><a href="<?php print(base_url());?>dashboard"><span class="icon-menu"></span>&nbsp;<span class="left-resp-menu"><?php print(lang('menu_dashboard')); ?></span></a>
      </li>
      <?php if(!empty($client)):?>
      <li class="<? $url_arg=='clients' ? print('active') : print('') ?>"><a href="<?php print(base_url());?>clients"><span class="icon-client"></span>&nbsp;<span class="left-resp-menu"><?php print(lang('menu_clients')); ?></span></a>
        <?php endif ?>
      <li class="<? $url_arg=='projects' ? print('active') : print('') ?>"><a href="<?php print(base_url());?>projects"><span class="icon-projects"></span><?php if ($projects != false): ?><div class="badge-mini" id="badge-count-mini-projects"><?php print(count($projects));?></div><?php endif ?>&nbsp;<span class="left-resp-menu"><?php print(lang('menu_projects')); ?></span></a>
            <?php if ($projects != false): ?><span class="badge badge-resp" id="badge-count-projects"><?php print(count($projects));?></span> <?php else:?><span class="badge badge-resp" id="badge-count-projects">0</span> <?php endif ?>
      </li>
      <li class="<? $url_arg=='tasks' ? print('active') : print('') ?>"><a href="<?php print(base_url());?>tasks"><span class="icon-tasks"></span><?php if ($tasks != false): ?><div class="badge-mini" id="badge-count-mini-tasks"><?php print(count($tasks));?></div><?php endif ?>&nbsp;<span class="left-resp-menu"><?php print(lang('menu_tasks')); ?></span></a>
          <?php if ($tasks != false): ?><span class="badge badge-resp" id="badge-count-tasks"><?php print(count($tasks));?></span> <?php else:?><span class="badge badge-resp" id="badge-count-tasks">0</span> <?php endif ?>
      </li>
<!--        --><?php //if ($user->role==5 OR $user->role==4): ?>
<!--            <li class="--><?// $url_arg=='team' ? print('active') : print('') ?><!--"><a href="--><?php //print(base_url());?><!--users"><span class="icon-users"></span>&nbsp;<span class="left-resp-menu">--><?php //print(lang('menu_team')); ?><!--</span></a>-->
<!--            </li>-->
<!--        --><?php //endif ?>
<!--      <li class="--><?// $url_arg=='charts' ? print('active') : print('') ?><!-- disabled"><a href="--><?php //print(base_url());?><!--charts"><i class="glyphicon glyphicon-stats"></i>&nbsp;<span class="left-resp-menu">--><?php //print(lang('menu_chart')); ?><!--</span></a>-->
<!--      </li>-->
      <li class="<? $url_arg=='comments' ? print('active') : print('') ?> disabled"><a href="<?php print(base_url());?>comments"><span class="icon-comments"></span><?php if ($comments != false): ?><div class="badge-mini" id="badge-count-mini-comments"><?php print(count($comments));?></div> <?php endif ?>&nbsp;<span class="left-resp-menu"><?php print(lang('menu_comments')); ?></span></a> <?php if ($comments != false): ?><span class="badge badge-resp" id="badge-count-comments"><?php print(count($comments));?></span> <?php else:?><span class="badge badge-resp" id="badge-count-comments">0</span> <?php endif ?>
      </li>

        <li class="<? $url_arg=='group_chat' ? print('active') : print('') ?> disabled"><a href="<?php print(base_url());?>group_chat"> <i class="fa fa-comments"></i><span class="left-resp-menu"><?php print(lang('menu_groupchat')); ?></span></a>
        </li>

<div class="statistic-imps">
<!-- todo-->
</div>

      <!--MINI INBOX-->
      <div class="mini-inbox"></div>
      <!--END MINI INBOX-->
    </ul>
  </div>

<!--    <i class="fa fa-comments"></i>-->