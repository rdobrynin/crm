<!--assign user modal-->
<div class="modal" id="assign_user_modal" tabindex="-1" role="dialog" aria-labelledby="assign_user_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <form  role="form">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input class="form-control" id="search-assign-users" placeholder="Search by name" type="text">
                            </div>
                        </div>
                    </form>
                    <ul class="assign-users-jsscroll">
                        <?php foreach ($users as $uk => $uv): ?>
                            <?php if ($users_title_roles[$uv['id']] !=5): ?>
                            <li id="assing-user-li-"<?php print($uv['id']); ?>>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="avatar-activity" style="1px solid rgb(221, 221, 221)">
                                            <span class="avatar-img"><a href="javascript:void(0)"><img src="<?php print(base_url());?>uploads/avatar/<?php if (isset($avatars[$uv['id']])): ?><?php print($avatars[$uv['id']]); ?><?php else: ?>placeholder_user.jpg<?php endif ?>" height="45"></a></span>
                                            <span id="status-assign-user-<?php print($uv['id']); ?>" class="mini-role  <?php if ($get_users_online[$uv['id']]==1): ?>green <?php else: ?>grey<?php endif ?>"><?php print(show_role_abbr($users_title_roles[$uv['id']])); ?></span>
                                        </div>
                                        <span class="assign-name"> <?php print($user_name[$uv['id']]); ?></span>
                                        <span class="pull-right"><a href="javascript:void(0)" class="btn btn-success">assign</a></span>
                                    </div>
                                </div>
                            </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-default" style="width: 100%">Close</a>
            </div>
        </div>
    </div>
</div> <!-- #/task_details_modal -->




<script type="text/javascript">

    function assignUsersProject($data){
        $('#assign_user_modal').modal('show');
        console.log($data);
    }

    $(function () {
        $(window).load(function(){
            $(".assign-users-jsscroll").mCustomScrollbar({
                scrollButtons:{enable:true,scrollType:"stepped"},
                theme:"rounded-dark",
                autoExpandScrollbar:true,
                snapOffset:65
            });
        });


    });
</script>
