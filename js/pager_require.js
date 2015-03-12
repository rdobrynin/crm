define(function () {
$(function () {
//    $('#all_task_table').pageMe({pagerSelector:'#pager_all_tasks',showPrevNext:true,hidePageNumbers:true,perPage:10});
    $('#comp_task_table').pageMe({pagerSelector:'#pager_all_comp_tasks',showPrevNext:true,hidePageNumbers:false,perPage:15});
    $('#logs-tbody').pageMe({pagerSelector:'#pager_all_logs',showPrevNext:true,hidePageNumbers:true,perPage:25});
});
});