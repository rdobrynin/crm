$(function () {
    $('#all_task_table').pageMe({pagerSelector:'#pager_all_tasks',showPrevNext:true,hidePageNumbers:true,perPage:10});
    $('#all_comments_table').pageMe({pagerSelector:'#pager_all_comments',showPrevNext:true,hidePageNumbers:false,perPage:20});
});