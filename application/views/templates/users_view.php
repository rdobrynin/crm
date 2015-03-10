<?php //include('navtop_view.php'); ?>
<?php //include('sidebar_view.php'); ?>


<!-- Page content -->
<div class="page-content-wrapper">
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row-fluid">
            <p class="lead">Administer users</p>
            <!--      tabs-->
            <ul class="nav nav-tabs filter" id="admin-users-tab">
                <li class="active"><a href="#current-users" class="tabs-filter" data-toggle="tab" title="Current users">
                        <button class="btn btn-default">Current users</button>
                    </a></li>
                <li><a href="#new-users" class="tabs-filter" data-toggle="tab" title="New users">
                        <button class="btn btn-default">New users<?php if ($count_new_users > 0): ?>
                                <span class="badge badge-tab" id="calc-new-users"><?php print($count_new_users); ?></span><?php endif ?>
                        </button>
                    </a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="current-users">
                    <!--                  current_users-->
                    <div class="filterable panel-tabs">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <button class="btn btn-default btn-xs btn-filter">
                                    <span class="glyphicon glyphicon-filter"></span> Filter
                                </button>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="panel panel">
                                <div class="panel-body-table">
                                    <div class="table-responsive">
                                        <table class="table table-condensed" id="table-current-users">
                                            <thead>
                                            <tr class="filters">
                                                <th>
                                                    <input type="text" class="form-control filter" placeholder="#" disabled>
                                                </th>
                                                <th style="border-left: 1px solid #ddd;">
                                                    <input type="text" class="form-control filter" placeholder="Name" disabled>
                                                </th>
                                                <th style="border-left: 1px solid #ddd;">
                                                    <input type="text" class="form-control filter" placeholder="Email" disabled>
                                                </th>
                                                <th style="border-left: 1px solid #ddd;">
                                                    <input type="text" class="form-control filter" placeholder="Role" disabled>
                                                </th>
                                                <th style="border-left: 1px solid #ddd;">
                                                    <input type="text" class="form-control filter" placeholder="Created" disabled>
                                                </th>
                                                <th>
                                                    <input type="hidden" class="form-control filter" placeholder="Edit" disabled>
                                                </th>
                                                <th>
                                                    <input type="hidden" class="form-control filter" placeholder="Delete" disabled>
                                                </th>
                                                <th>
                                                    <input type="hidden" class="form-control filter" placeholder="Froze" disabled>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody-current-users">
                                            <?php foreach ($users as $uk => $uv): ?>
                                                <tr id="tr_current_user_<?php print($uv['id']); ?>" class="<?php if ($uv['froze'] == 1): ?>disabled<?php endif ?>">
                                                    <td><?php print($uv['id']); ?></td>
                                                    <td><?php print(short_name($user_name[$uv['id']])); ?></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="hover-td-name qm-send-comment" data-uid="<?php print($uv['id']); ?>"><?php print($uv['email']); ?></a>
                                                    </td>
                                                    <td><?php print(show_role($uv['role'])); ?></td>
                                                    <td><?php print($uv['date_created']); ?></td>

                                                    <td>
                                                        <?php if ($user->role ==5): ?>

                                                        <a href="javascript:void(0);" class="update-user" data-title="Edit" data-uid="<?php print($uv['id']); ?>"><i class="fa fa-pencil"></i></a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($uv['role'] !=5 AND $user->role ==5): ?>
                                                            <a href="javascript:void(0);" style="cursor: pointer;" data-toggle="confirmation-delete-current-user" data-singleton="true" data-target="<?php print($uv['id']); ?>">Remove</a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($user->role ==5 AND $user->id != $uv['id']): ?>
                                                            <?php if ($uv['froze'] == 1): ?>
                                                                <a href="javascript:void(0);" id="froze-<?php print($uv['id']); ?>"  style="cursor: pointer;" data-toggle="confirmation-unfroze-current-user" data-singleton="true" data-froze="1" data-target="<?php print($uv['id']); ?>">Unfroze</a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0);" id="froze-<?php print($uv['id']); ?>"  class="test" style="cursor: pointer;" data-toggle="confirmation-froze-current-user" data-singleton="true" data-froze="0" data-target="<?php print($uv['id']); ?>">Froze</a>
                                                            <?php endif ?>

                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="new-users">
                    <?php if ($new_users != false): ?>
                        <!--                  new users-->
                        <div class="filterable panel-tabs">
                            <div class="panel-heading">
                                <div class="pull-right">
                                    <button class="btn btn-default btn-xs btn-filter">
                                        <span class="glyphicon glyphicon-filter"></span> Filter
                                    </button>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="panel">
                                    <div class="panel-body-table">
                                        <div class="table-responsive">
                                            <table class="table table-condensed" id="table-new-users">
                                                <thead>
                                                <tr class="filters">
                                                    <th>
                                                        <input type="text" class="form-control filter" placeholder="#" disabled>
                                                    </th>
                                                    <th style="border-left: 1px solid #ddd;">
                                                        <input type="text" class="form-control filter" placeholder="First name" disabled>
                                                    </th>
                                                    <th style="border-left: 1px solid #ddd;">
                                                        <input type="text" class="form-control filter" placeholder="Last name" disabled>
                                                    </th>
                                                    <th style="border-left: 1px solid #ddd;">
                                                        <input type="text" class="form-control filter" placeholder="Email" disabled>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="tbody-new-users">
                                                <?php foreach ($new_users as $uk => $uv): ?>
                                                    <tr id="tr_new_user_<?php print($uv['id']); ?>">
                                                        <td><?php print($uv['id']); ?></td>
                                                        <td><?php print($uv['first_name']); ?></td>
                                                        <td><?php print($uv['last_name']); ?></td>
                                                        <td>
                                                            <a href="mailto:<?php print($uv['email']); ?>"><?php print($uv['email']); ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="confirmation-activate-user" data-singleton="true"  data-target="<?php print($uv['id']); ?>">Activate</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="confirmation-delete-new-user" data-singleton="true" data-target="<?php print($uv['id']); ?>">Remove</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="clearfix"></div>
                        <div class="info-new-users"><div class="alert alert-info text-center"><i class="fa fa-exclamation-circle"></i>&nbsp;No one of new users found</div></div>
                    <?php endif ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--      tabs-->
        </div>
    </div>
    <!--  New users-->
</div>
<!--logs-->

<?php include('logs_view.php'); ?>

</div>
<!--MODAL-->
<div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you
                    want to delete this Record?
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span> Yes
                </button>
                <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> No
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php include('add_role_view.php'); ?>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php'); ?>
