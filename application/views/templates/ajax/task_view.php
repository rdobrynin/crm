
<div class="modal-content">



    <div class="modal-header">
        <h4 class="modal-title" id="modal-view-title">
            #<?php print($task->id); ?>&nbsp;<?php print($task->title); ?>&nbsp;(project:&nbsp;<?php print($project[0]['title']); ?>)

        </h4>
    </div>
    <div class="modal-body" id="modal-view-body">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>label:</b></p>
            </div>
            <div class="col-lg-9">
                <span class="label <?php print(task_type_label($task->label)); ?>"><?php print($task_label); ?></span>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Status:</b></p>
            </div>
            <div class="col-lg-9">
                <span class="label <?php print(task_status_label($task->status)); ?>"><?php print(task_status($task->status)); ?></span>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Priority:</b></p>
            </div>
            <div class="col-lg-9">
                <span style="<?php if ($task->priority ==0): ?> color:#428bca;<?php endif ?><?php if ($task->priority ==1): ?> color:#f89406;<?php endif ?><?php if ($task->priority ==2): ?> color:#d9534f;<?php endif ?>"><?php print(priority_status_index($task->priority)); ?></span>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Due to date:</b></p>
            </div>
            <div class="col-lg-9">
                <?php print(date('jS F Y G:i', $task->due_time)); ?>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Created:</b></p>
            </div>
            <div class="col-lg-9">
                <?php print(date('jS F Y G:i', $task->date_created)); ?>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Last edited:</b></p>
            </div>
            <div class="col-lg-9">
                <?php print(date('jS F Y G:i', $task->date_edited)); ?>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Manager:</b></p>
            </div>
            <div class="col-lg-9">
                <?php print($manager); ?>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Implementor:</b></p>
            </div>
            <div class="col-lg-9">
                <?php print($implementor); ?>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-3">
                <p><b>Desctiption:</b></p>
            </div>
            <div class="col-lg-9">
               <?php print($task->desc); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-default" style="width: 100%">Close</a>
    </div>

</div>
