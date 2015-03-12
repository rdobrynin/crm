define(function () {
    $(function () {
        //add class "highlight" when hover over the row
        $('#approve_tasks_table tr, #all_task_table tr, #all_comments_table tr, #log-table tr, #comp_task_table tr, #tbody-new-users tr, #tbody-current-users tr, #proccess_task_table tr, #ready_tasks_table tr').hover(function () {
            $(this).addClass('highlight');
        }, function () {
            $(this).removeClass('highlight');
        });

        //    $('#approve_tasks_table').pageMe({pagerSelector:'#pager_approve_tasks',showPrevNext:true,hidePageNumbers:true,perPage:35});
//        $('#logs-tbody').pageMe({pagerSelector:'#pager_all_logs',showPrevNext:true,hidePageNumbers:true,perPage:25});
//    $('#comp_task_table').pageMe({pagerSelector:'#pager_comp_tasks',showPrevNext:true,hidePageNumbers:true,perPage:15});

        var count_approve_tasks = $('#approve_tasks_table').children().length;
        var count_all_tasks = $('#all_task_table').children().length;
        var count_all_comments = $('#all_comments_table').children().length;
        var count_all_comp_tasks = $('#comp_task_table').children().length;
        var count_all_pr_tasks = $('#proccess_task_table').children().length;
        var count_all_dsb_pr_tasks = $('#proccess_task_table').children().length;

        $('#calc-appr-tasks').html(count_approve_tasks);

        $('#calc-all-tasks').html(count_all_tasks);
        $('#calc-all-comp_tasks').html(count_all_comp_tasks);
        $('#calc-all-comments').html(count_all_comments);
        $('#calc-all-pr_tasks').html(count_all_pr_tasks);
        $('#calc-all-dsb_pr_tasks').html(count_all_dsb_pr_tasks);
        $('#badge-count-comments-top').html(count_all_comments);

        $("#mytable #checkall").click(function () {
            if ($("#mytable #checkall").is(':checked')) {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });

            } else {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });


    });
});