<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-lg-10 col-md-8">
                <p class="lead"><?php print(lang('logs_activity'))?></p>
            </div>
            <div class="col-lg-2 col-md-4  pull-right search-form">
                <input type="text" id="search-logs-table" class=" form-control lights" placeholder="<?php print(lang('logs_search'))?>"/>
            </div>
            </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body-table">
                                    <div class="table-responsive">
                                        <table class="table table-condensed" id="log-table">
                                            <thead>
                                            <tr>
                                                <td style="width: 5%;"><strong><?php print(lang('logs_th_id'))?></strong></td>
                                                <td class="text-left" style="width:13%;border-left: 1px solid #ddd;"><strong><?php print(lang('logs_th_date'))?></strong></td>
                                                <td class="text-left" style="width:10%;border-left: 1px solid #ddd;"><strong><?php print(lang('logs_th_user'))?></strong></td>
                                                <td class="text-left" style="width:10%;border-left: 1px solid #ddd;"><strong><?php print(lang('logs_th_item'))?></strong></td>
                                                <td class="text-left" style="width:2%;border-left: 1px solid #ddd;"><strong><?php print(lang('logs_th_act'))?></strong></td>
                                                <td class="text-left" style="width:10%;border-left: 1px solid #ddd;"><strong><?php print(lang('logs_th_title'))?></strong></td>
                                                <td class="text-left" style="width:50%;border-left: 1px solid #ddd;"><strong><?php print(lang('logs_th_description'))?></strong></td>
                                            </tr>
                                            </thead>
                                            <tbody id="logs-tbody">
                                            <?php $all_events = array_reverse($all_events);?>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <?php foreach ($all_events as $ek => $ev): ?>
                                                <?php if ($ev['type'] != 2): ?>
                                                <tr id="current-tr-<?php print($ev['id']); ?>">
                                                <td>#<?php print($ev['id']); ?></td>
                                                <td class="text-left"><?php print(date_format(date_create($ev['time']),"F d H:i")); ?></td>
                                                <td class="text-left"><a href="javascript:void(0);" onClick="qmSendComment(<?php print($ev['uid']); ?>)"><?php print(short_name($user_name[$ev['uid']])); ?></a></td>
                                                <td class="text-left"> <?php if ($ev['type'] == 0): ?><i class="fa fa-cube"></i>&nbsp;project<?php endif ?>
                                                <?php if ($ev['type'] == 1 OR $ev['type'] == 3 OR $ev['type'] == 4): ?><i class="fa fa-gavel"></i>&nbsp;Task<?php endif ?>
                                                <?php if ( $ev['type'] == 5): ?><i class="fa fa-pencil"></i>&nbsp;Task<?php endif ?>
                                                <?php if ( $ev['type'] == 6): ?><i class="fa fa-cube"></i>&nbsp;Assign user<?php endif ?>
                                                </td>

                                                <td class="text-left"><?php if ($ev['type'] == 1 OR $ev['type'] == 0): ?><i class="fa fa-plus-circle" style="color:#5cb85c;"></i><?php endif ?>
                                                 <?php if ($ev['type'] == 3): ?><i class="fa fa-times-circle" style="color:#d9534f;"></i><?php endif ?>
                                                    <?php if ($ev['type'] == 4): ?><i class="fa fa-check-circle" style="color:#428BCA;font-size:14px !important;"></i><?php endif ?>
                                                    <?php if ($ev['type'] == 5): ?><i class="fa fa-check-circle" style="color:#428BCA;font-size:14px !important;"></i><?php endif ?>
                                                    <?php if ($ev['type'] == 6): ?><i class="fa fa-plus-circle" style="color:#5cb85c;font-size:14px !important;"></i><?php endif ?>
                                                </td>
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
            <!-- ./row-->
        </div>
    </div>
</div>

