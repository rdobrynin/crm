<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Logs activity</p>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body-table">
                                    <div class="table-responsive">
                                        <table class="table table-condensed" id="log-table">
                                            <thead>
                                            <tr>
                                                <td style="width: 5%;"><strong>#ID</strong></td>
                                                <td class="text-left" style="width:13%;border-left: 1px solid #ddd;"><strong>Date</strong></td>
                                                <td class="text-left" style="width:10%;border-left: 1px solid #ddd;"><strong>User</strong></td>
                                                <td class="text-left" style="width:10%;border-left: 1px solid #ddd;"><strong>item</strong></td>
                                                <td class="text-left" style="width:2%;border-left: 1px solid #ddd;"><strong>Act</strong></td>
                                                <td class="text-left" style="width:10%;border-left: 1px solid #ddd;"><strong>Title</strong></td>
                                                <td class="text-left" style="width:50%;border-left: 1px solid #ddd;"><strong>Description</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody id="logs-tbody">
                                            <?php $all_events = array_reverse($all_events);?>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <?php foreach ($all_events as $ek => $ev): ?>
                                                <?php if ($ev['type'] != 2): ?>
                                                <tr id="current-tr-<?php print($ev['id']); ?>">
                                                <td><?php print($ev['id']); ?></td>
                                                <td class="text-left"><?php print(date_format(date_create($ev['time']),"F d H:i")); ?></td>
                                                <td class="text-left"><a href="#" onClick="qmSendComment(<?php print($ev['uid']); ?>)"><?php print(short_name($user_name[$ev['uid']])); ?></a></td>
                                                <td class="text-left"> <?php if ($ev['type'] == 0): ?><i class="fa fa-cube"></i>&nbsp;project<?php endif ?>  <?php if ($ev['type'] == 1 OR $ev['type'] == 3 OR $ev['type'] == 4): ?><i class="fa fa-gavel"></i>&nbsp;Task (<?php print($ev['key']); ?>)<?php endif ?> <?php if ( $ev['type'] == 5): ?><i class="fa fa-pencil"></i>&nbsp;Task (<?php print($ev['key']); ?>)<?php endif ?></td>
                                                <td class="text-left"><?php if ($ev['type'] == 1 OR $ev['type'] == 0): ?><i class="fa fa-plus-circle" style="color:#5cb85c;"></i><?php endif ?><?php if ($ev['type'] == 3): ?><i class="fa fa-times-circle" style="color:#d9534f;"></i><?php endif ?><?php if ($ev['type'] == 4): ?><i class="fa fa-check-circle" style="color:#428BCA;font-size:14px !important;"></i><?php endif ?><?php if ($ev['type'] == 5): ?><i class="fa fa-check-circle" style="color:#428BCA;font-size:14px !important;"></i><?php endif ?></td>
                                                <td class="text-left"><?php print($ev['title']); ?></td>
                                                <td class="text-left"><?php print($ev['event']); ?></td>
                                            </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <ul class="pagination pagination-lg pager" id="pager_all_logs"></ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- ./row-->
        </div>
    </div>


</div>

