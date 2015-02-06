<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
      <p class="lead">Comments&nbsp;(<span id="calc-all-comments" ></span>)</p>
    <div class="row-fluid">
        <?php if ($comments != FALSE): ?>
            <div class="row-fluid">
                <div class="panel">
                    <div class="panel-body-table">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-left">#ID</th>
                                    <th width="8%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                    <th width="10%" class="text-" style="border-left: 1px solid #ddd;">Subject</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">From</th>
                                    <th width="10%" class="text-" style="border-left: 1px solid #ddd;">To</th>
                                    <th width="35%" class="text-left" style="border-left: 1px solid #ddd;">Message</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Time ago</th>
                                    <?php if($user[0]['role']==5 OR $user[0]['role']==4):?>
                                        <th width="3%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                    <? endif?>
                                </tr>
                                </thead>
                                <tbody id="all_comments_table">
                                <?php $comments = array_reverse($comments);?>
                                <?php foreach ($comments as $ck => $cv): ?>
                                    <?php if ($user[0]['role'] ==2 && $user[0]['id']==$cv['to'] OR $user[0]['role'] ==1 && $user[0]['id']==$cv['to']): ?>
                                    <tr class="<?php if ($cv['public'] == 1): ?>disabled<?php endif ?> ">
                                        <td><?php print($cv['id']); ?></td>
                                        <td><span class="muted"><?php print(date_format(date_create($cv['date_created']),"F d H:i")); ?></span></td>
                                        <td><?php print($cv['subject']); ?></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name" onClick="qmSendComment(<?php print($cv['uid']); ?>)"><?php print(short_name($user_name[$cv['uid']])); ?></a></td>
                                        <td><a href="javascript:void(0);" class="hover-td-name" onClick="qmSendComment(<?php print($cv['to']); ?>)"><?php print(short_name($user_name[$cv['to']])); ?></a></td>
                                        <td><span class="muted"><?php print($cv['text']); ?></span></td>
                                        <td><i class="fa fa-clock-o clock-activity"></i>&nbsp;<?php print(time_ago($cv['date_created'])); ?></td>
                                    </tr>
                                    <?php endif ?>
                                    <?php if ($user[0]['role'] ==4 OR $user[0]['role'] ==5 ): ?>
                                        <tr class="<?php if ($cv['public'] == 1): ?>disabled<?php endif ?>" id="adjust-comment-<?php print($cv['id']); ?>">
                                            <td><?php print($cv['id']); ?></td>
                                            <td><span class="muted"><?php print(date_format(date_create($cv['date_created']),"F d H:i")); ?></span></td>
                                            <td><?php print($cv['subject']); ?></td>
                                            <td><a href="javascript:void(0);" class="hover-td-name" onClick="qmSendComment(<?php print($cv['uid']); ?>)"><?php print(short_name($user_name[$cv['uid']])); ?></a></td>
                                            <td><a href="javascript:void(0);" class="hover-td-name" onClick="qmSendComment(<?php print($cv['to']); ?>)"><?php print(short_name($user_name[$cv['to']])); ?></a></td>
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
        <?php endif ?>
        <!--                end comments-->
    </div>
  </div>
</div>
<?php include('logs_view.php'); ?>
</div>

<?php include('right_float_view.php'); ?>
<?php include('footer_view.php');?>
<script>




    $(function () {
        $('.onoff').bootstrapToggle({
            size:'mini'
        });
        $('#all_comments_table').pageMe({pagerSelector:'#pager_all_comments',showPrevNext:true,hidePageNumbers:false,perPage:20});

        $('.toggle-comment').click(function () {
            idComment = $(this).attr('data-comment');
            if ( $('#toggle-comment-'+idComment).is( ":checked" ) ) {
                var form_data = {
                    id: idComment,
                    check: '1'
                };
                $.ajax({
                    url: "<?php echo site_url('ajax/publishComment'); ?>",
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (msg) {
                        $('#adjust-comment-'+idComment).addClass('disabled');
                    }
                });
            }
            else {
                var form_data = {
                    id: idComment,
                    check: '0'
                };
                $.ajax({
                    url: "<?php echo site_url('ajax/publishComment'); ?>",
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (msg) {
                        $('#adjust-comment-'+idComment).removeClass('disabled');
                    }
                });

            }
        });

    });
</script>

