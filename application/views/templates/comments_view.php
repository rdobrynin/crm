<!-- Page content -->
<div class="page-content-wrapper">

  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
      <h3 class="h_title">Comments&nbsp;(<span id="calc-all-comments" ></span>) </h3>

    <div class="row-fluid">
        <?php if ($comments != FALSE): ?>
            <div class="row-fluid">
                <div class="panel panel-default">
                    <div class="panel-body-table">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-left">#ID</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                    <th width="10%" class="text-" style="border-left: 1px solid #ddd;">Subject</th>
                                    <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">From</th>
                                    <th width="10%" class="text-" style="border-left: 1px solid #ddd;">To</th>
                                    <th width="45%" class="text-left" style="border-left: 1px solid #ddd;">Message</th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                    <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="all_comments_table">
                                <?php $comments = array_reverse($comments);?>
                                <?php foreach ($comments as $ck => $cv): ?>
                                    <tr class="<?php if ($cv['public'] == 1): ?>disabled<?php endif ?> ">
                                        <td><?php print($cv['id']); ?></td>
                                        <td><span class="muted"><?php print($cv['date_created']); ?></span></td>
                                        <td><?php print($cv['subject']); ?></td>
                                        <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($cv['uid']); ?>)"><?php print(short_name($user_name[$cv['uid']])); ?></a></td>
                                        <td><a href="#" class="hover-td-name" onClick="qmSendComment(<?php print($cv['to']); ?>)"><?php print(short_name($user_name[$cv['to']])); ?></a></td>
                                        <td><span class="muted"><?php print($cv['text']); ?></span></td>
                                        <td class="center"><span class="muted"><input type="checkbox" data-off="enable" data-on="disable" class="onoff" <?php if ($cv['public'] == 0): ?> checked  <?php endif ?> data-size="small" data-onstyle="success" data-offstyle="danger"></span></td>
                                        <td class="text-center"><a href="#"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
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
        <!--                end last tasks-->
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

    });



</script>

