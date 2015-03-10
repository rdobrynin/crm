define(function () {
$.ajax({
    type: 'GET',
    url: '/ajax/calculateTasks',
    dataType: 'json',
//            beforeSend: function () {
//            },
    success: function (data) {
        var total_tasks = data.tasks;
        var completed_tasks = data.comp_tasks;
        var task_percent_ready = Math.floor((100/total_tasks)*completed_tasks);
        if(total_tasks == 0 || completed_tasks == 0) {
            task_percent_ready = 0;
        }
        $('#percent-completed-tasks').text(task_percent_ready+' %');
        $('#progress-tasks').attr('data-percentage',task_percent_ready+'%');
        $('#progress-tasks').attr('style','width:'+task_percent_ready+'%');

    },
    error: function () {
        alert('Something went with error')
    }
});
});

