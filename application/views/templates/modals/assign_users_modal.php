<!--assign user modal-->
<div class="modal white-modal" id="assign_user_modal" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="assign_user_modalLabel" aria-hidden="true">
    <form role="form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-lg-12">
                                <input class="form-control" id="search-assign-users" placeholder="Search by name" type="text">
                            </div>
                        </div>
                    <div id="assign_users_details">
                        <div id="response"></div>
                    </div>
                    </div>
                    </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-default" style="width: 100%">Close</a>
                </div>

           </div>
    </form>
</div>
<script type="text/javascript">

    /**
     * AJAX data get HTML in tpl
     * @param $data
     */

    function openAssignUsersProject($data){
        $('#assign_user_modal').modal('show');
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url('ajax/getUsersProject') ?>",
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

    /**
     * @param $project
     * @param $data
     */

    function assignUserProject($data, $project) {
        var $user = '<?php print($user[0]['id'])?>';
        var form_data = {
            id: $data,
            pid: $project,
            uid: $user
        };
        $.ajax({
            url: "<?php echo site_url('ajax/assignUserProject'); ?>",
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
                if (msg.id != 'false') {
                    console.log(msg);
                 $('#assign-user-li-' + $data).fadeOut('slow');
                    $('#assign-panel-'+$project).append('&nbsp;<span class="label label-default label-tag" <i class="fa fa-mail"></i>&nbsp;<span class="get_old_mail">'+msg.full_name+
                        ' </span>&nbsp;');
                }
                else {
                    console.log('sadsd');
                }
            }
        });
    }

</script>
