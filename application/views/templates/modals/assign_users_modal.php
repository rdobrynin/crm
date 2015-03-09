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
                    <a href="#" data-dismiss="modal" class="btn btn-default" style="width: 100%"><?php print(lang('act_close'))?></a>
                </div>

           </div>
    </form>
</div>
