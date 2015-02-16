<!--assign user modal-->
<div class="modal" id="assign_user_modal" tabindex="-1" role="dialog" aria-labelledby="assign_user_modalLabel" aria-hidden="true">
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
        $.get( "<?php echo base_url('ajax/getUsersProject') ?>", { 'project': $data }, function( data ) {
            $('#assign_users_details').html(data);
            $(".assign-users-jsscroll").mCustomScrollbar({
                scrollButtons:{enable:true,scrollType:"stepped"},
                theme:"rounded-dark",
                autoExpandScrollbar:true,
                snapOffset:65
            });
        });
    }

    /**
     *
     * @param $data
     */

    function assignUserProject($data) {
//        $('#assign-user-li-' + $data).fadeOut('slow');

        var form_data = {
            id: $data
        };
        $.ajax({
            url: "<?php echo site_url('ajax/assignUserProject'); ?>",
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (msg) {
             console.log(msg);
            }
        });


    }

</script>
