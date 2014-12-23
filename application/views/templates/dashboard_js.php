<script>
    $(function () {
        var total_tasks = '<?php if ($tasks != false): ?><?php print(count($tasks));?><?php else:?>0<?php endif ?>';
        var completed_tasks = '<?php if ($comp_tasks != false): ?><?php print(count($comp_tasks));?><?php else:?>0<?php endif ?>';
        var task_percent_ready = Math.floor((100/total_tasks)*completed_tasks);
        if(total_tasks == 0 || completed_tasks == 0) {
            task_percent_ready = 0;
        }
        $('#percent-completed-tasks').text(task_percent_ready+' %');

//      id="progress-tasks" data-percentage="43%"

        $('#progress-tasks').attr('data-percentage',task_percent_ready+'%');
        $('#progress-tasks').attr('style','width:'+task_percent_ready+'%');
    });


</script>