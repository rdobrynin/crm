<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
      <div class="row">
          <div class="col-lg-10 col-md-8">
              <p class="lead"><?php print(lang('comment_comments'))?>&nbsp;(<span id="calc-all-comments" ></span>)</p>
          </div>
          <?php if ($comments != FALSE): ?>
          <div class="col-lg-2 col-md-4  pull-right search-form">
              <input type="text" id="search-all-comments" class=" form-control lights" placeholder="<?php print(lang('comment_search'))?>"/>
          </div>
          <?php endif ?>
      </div>
    <div class="row-fluid">
        <?php if ($comments != FALSE): ?>
            <div class="row-fluid">
                <div class="panel">
                    <div class="panel-body-table">
                        <div class="table-responsive">
                            <table class="table table-condensed" id="table-all-comments">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-left"><?php print(lang('comment_th_id'))?></th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('comment_th_created'))?></th>
                                    <th width="10%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('comment_th_subject'))?></th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('comment_th_from'))?></th>
                                    <th width="10%" class="text-" style="border-left: 1px solid #ddd;"><?php print(lang('comment_th_to'))?></th>
                                    <th width="35%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('comment_th_message'))?></th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('comment_th_time'))?></th>
                                    <?php if($user->role==5 OR $user->role==4):?>
                                        <th width="3%" class="text-left" style="border-left: 1px solid #ddd;"><?php print(lang('comment_th_status'))?></th>
                                    <? endif?>
                                </tr>
                                </thead>
                                <tbody id="all_comments_table">
                                <?php $comments = array_reverse($comments);?>
                                <?php foreach ($comments as $ck => $cv): ?>
                                    <?php if ($user->role ==2 && $user->id==$cv['to'] OR $user->role ==1 && $user->id==$cv['to']): ?>
                                    <tr class="<?php if ($cv['public'] == 1): ?>disabled<?php endif ?> ">
                                        <td>#<?php print($cv['id']); ?></td>
                                        <td><span class="muted"><?php print(date_format(date_create($cv['date_created']),"F d H:i")); ?></span></td>
                                        <td><?php print($cv['subject']); ?></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($cv['uid']); ?>"><?php print(short_name($user_name[$cv['uid']])); ?></a></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($cv['to']); ?>"><?php print(short_name($user_name[$cv['to']])); ?></a></td>
                                        <td><span class="muted"><?php print($cv['text']); ?></span></td>
                                        <td><i class="fa fa-clock-o clock-activity"></i>&nbsp;<?php print(time_ago($cv['date_created'])); ?></td>
                                    </tr>
                                    <?php endif ?>
                                    <?php if ($user->role ==4 OR $user->role ==5 ): ?>
                                        <tr class="<?php if ($cv['public'] == 1): ?>disabled<?php endif ?>" id="adjust-comment-<?php print($cv['id']); ?>">
                                            <td>#<?php print($cv['id']); ?></td>
                                            <td><span class="muted"><?php print(date_format(date_create($cv['date_created']),"F d H:i")); ?></span></td>
                                            <td><?php print($cv['subject']); ?></td>
                                            <td><a href="javascript:void(0);"  class="hover-td-name qm-send-comment" data-uid="<?php print($cv['uid']); ?>"><?php print(short_name($user_name[$cv['uid']])); ?></a></td>
                                            <td><a href="javascript:void(0);"  class="hover-td-name qm-send-comment" data-uid="<?php print($cv['to']); ?>"><?php print(short_name($user_name[$cv['to']])); ?></a></td>
                                            <td><span class="muted"><?php print($cv['text']); ?></span></td>
                                            <td><i class="fa fa-clock-o clock-activity"></i>&nbsp;<?php print(time_ago($cv['date_created'])); ?></td>
                                                <td class="center toggle-comment" data-comment="<?php print($cv['id']); ?>"><span class="muted"><input id="toggle-comment-<?php print($cv['id']); ?>" type="checkbox" data-off="disable" data-on="enable" class="onoff " <?php if ($cv['public'] == 0): ?> checked  <?php endif ?> data-size="small" data-onstyle="success" data-offstyle="danger"></span></td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="pager_all_comments"></ul>
            </div>
        <?php else: ?>
            <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one comments not found</div></div>
        <?php endif ?>
        <!--                end comments-->
    </div>
  </div>
</div>
<?php include('logs_view.php'); ?>
</div>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php');?>
