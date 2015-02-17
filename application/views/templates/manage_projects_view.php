<?php if ($projects != false AND $user[0]['role'] == 5 OR $projects != false AND $user[0]['role'] == 4): ?>
    <div class="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <p class="lead">Administer Projects <b>(IN DEVELOPMENT)</b></p>
            <div class="row">
                <?php foreach ($projects as $pk => $pv): ?>
                    <?php if (isset($user_projects[$pv['pid']])): ?>
                <?php if ($user_projects[$pv['pid']] == $user[0]['id'] OR $user[0]['role'] == 5): ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="well well-sm" style="background-color: rgb(231, 231, 231); border-color: #BDBDBD;">
                            <div class="media" style="margin-bottom: 20px">
                                <div class="media-body" style="padding-bottom: 20px;border-bottom: 1px solid rgb(208, 208, 208);">
                                    <h4 class="media-heading" style="margin-bottom: 10px;border-bottom: 1px solid rgb(208, 208, 208);padding-bottom: 10px;">#<?php print($pv['pid']); ?>&nbsp;(<?php print($pv['title']); ?>)</h4>
                                    <p>Owner:&nbsp;<a href="javascript:void(0);" onClick="qmSendComment(<?php print($pv['owner']); ?>)"><?php print(short_name($user_name[$pv['owner']])); ?></a></p>
                                    <p>Created:&nbsp;<b><?php print($pv['date_created']); ?></b></p>
                                    <p>Description:&nbsp;<b><?php print($pv['description']); ?></b></p>
                                    <p>Status:&nbsp;&nbsp;<span class="label label-primary label-xs">open</span></p>
                                    <p>Total tasks:&nbsp;&nbsp;<span class="badge badge-task" id="route-task"><?php if (isset($project_tasks[$pv['pid']])): ?><?php print(count($project_tasks[$pv['pid']])); ?><?php else:?>0<?php endif ?></span></p>
                                    <p>Assigned users:&nbsp;&nbsp;
                                        <span id="assign-panel-<?php print($pv['pid']); ?>">
                                        <?php foreach ($all_projects as $ak => $av): ?>
                                            <?php if ($av['pid'] ==$pv['pid'] AND $users_title_roles[$av['uid']] !=5 AND $av['uid'] != $pv['owner'] AND $av['assign'] !=0): ?>
<span class="label label-default label-tag"><i class="fa fa-mail"></i>&nbsp;<span class="get_old_mail"><?php print(short_name($user_name[$av['uid']])); ?>&nbsp;(<?php print(show_role_abbr($users_title_roles[$av['uid']])); ?>)</span>
                            &nbsp;&nbsp;&nbsp;</span>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </span>
                                    </p>
                                </div>
                            </div>
                            <?php if ($projects[$pv['pid']]['owner'] == $user[0]['id']): ?>
                            <a href="javascript:void(0);"  onClick="frozeProject('<?php print($pv['pid']); ?>')" class="btn btn-danger">Froze project</a>&nbsp;
                                <a href="javascript:void(0);"  onClick="openAssignUsersProject('<?php print($pv['pid']); ?>')" class="btn btn-success test">Assign member</a>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>

<script type="text/javascript">

    /**
     * AJAX froze project
     * @param $data
     */

    function frozeProject($data){
        $('#froze-project-modal').modal('show');
        $('.froze-btn-project').click(function () {
            console.log($data);
            $('.froze-btn-cancel').addClass('disabled');

        });
        return false;
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url('ajax/frozeProject') ?>",
            data: { project: $data},
            beforeSend:function(){
                $('.loader').css('display','block');
            },
            complete: function()  {
                $('.loader').css('display','none');
            },
            success:function(data){
                $('#assign_users_details').html(data);
                $(".assign-users-jsscroll").mCustomScrollbar({
                    scrollButtons:{enable:true,scrollType:"stepped"},
                    theme:"rounded-dark",
                    autoExpandScrollbar:true,
                    snapOffset:65
                });

            },
            error:function(){
                alert('Something went with error')
            }
        });
    }
    </script>



