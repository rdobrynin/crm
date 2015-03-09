$('.selectpicker').selectpicker({
    style: 'btn-special',
    size: 14
});

$(function() {

    $('#admin-users-tab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });

    $('#add_task_modal').click(function () {
        $('#addtask_pr_modal').modal('show');
        $('.selectpicker').selectpicker();
    });


    $('.onoff').bootstrapToggle({
        size:'mini'
    });

    /**
     * Live search in dashboard page over tasks
     */

    $("#search-dash-over-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#dash-over-table tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });


    $("#search-assign-users").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".assign-users-jsscroll").find("li"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    /**
     * Live search in dashboard page process tasks
     */

    $("#search-dash-process-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#dash-process-table tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });


    /**
     * Live search in dashboard page process tasks
     */

    $("#search-all-comments").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table-all-comments tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    /**
     * Live search logs
     */

    $("#search-logs-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#log-table tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    /**
     * Live search in dashboard page approve tasks
     */

    $("#search-dash-approve-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#approve-task-table tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });


    /**
     * Live search in sidebar user blocks
     */

    $("#search-sidebar-users").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".user-float-block"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    /**
     * Live search in activity stream
     */

    $("#search-dash-comment").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".search-filter-comment"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    /**
     * Live search in task page process table
     */

    $("#search-task-process-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table-task-process tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });


    /**
     * Live search in task page common table
     */

    $("#search-task-common-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#common-tasks-table tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    /**
     * Live search in project page common tasks
     */

    $("#search-project-task-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".table-task tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });
    /**
     * Live search in task page complete table
     */

    $("#search-task-complete-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table-task-complete tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    /**
     * Live search in dashboard page ready tasks
     */

    $("#search-dash-ready-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#ready-task-table tbody").find("tr"), function() {
//            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    $(document).ready(function () {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
    });

    $('.activity-item-comment-link').click(function () {
        $(".activity-item-comment-form").show();
    });

    $('.close-activity-form').click(function () {
        $(".activity-item-comment-form").hide();
    });


    $('#fullscreen').on('click', function(event) {
        event.preventDefault();
        window.parent.location =  $('#fullscreen').attr('href');
    });
    $('#fullscreen').tooltip();
    /* END DEMO OF JS */

    $('.navbar-toggler').on('click', function(event) {
        event.preventDefault();
        $(this).closest('.navbar-minimal').toggleClass('open');
    });

    $("li a").click(function(e) {
        $('li').removeClass('active');
        $(this).parent().addClass('active');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('#back-to-top').tooltip('show');

$('.closebox').click(function(e){
    $(this).parent().fadeOut( "slow", function() {
        // Animation complete.
    });
});

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

//    USERS
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');

        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();

        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });

    /**
     *
     * Sidebar left ON/OFF
     */

    $(".close-right-sidebar").click(function () {
        var posVar = -300;
        $(".right-float-sidebar").animate({right: posVar + 'px'});
    });

//    $('#approve_tasks_table').pageMe({pagerSelector:'#pager_approve_tasks',showPrevNext:true,hidePageNumbers:true,perPage:35});
    $('#logs-tbody').pageMe({pagerSelector:'#pager_all_logs',showPrevNext:true,hidePageNumbers:true,perPage:25});
//    $('#comp_task_table').pageMe({pagerSelector:'#pager_comp_tasks',showPrevNext:true,hidePageNumbers:true,perPage:15});

    var count_approve_tasks = $('#approve_tasks_table').children().length;
    var count_all_tasks = $('#all_task_table').children().length;
    var count_all_comments = $('#all_comments_table').children().length;

$('#calc-appr-tasks').html(count_approve_tasks);

$('#calc-all-tasks').html(count_all_tasks);
$('#calc-all-comments').html(count_all_comments);
$('#badge-count-comments-top').html(count_all_comments);


        //add class "highlight" when hover over the row
        $('#approve_tasks_table tr, #all_task_table tr, #all_comments_table tr, #log-table tr, #comp_task_table tr, #tbody-new-users tr, #tbody-current-users tr, #proccess_task_table tr, #ready_tasks_table tr').hover(function() {
            $(this).addClass('highlight');
        }, function() {
            $(this).removeClass('highlight');
        });

    $('.close-qm').click(function () {
        $('.qm-body').css('display', 'none');
        $('#li-comments').removeClass('active');
    });

    $('.sms-send-alert').click(function () {
        $('#demo_modal').modal('show');
    });

    $('#qm-link-file-btn, #edit-project-table, #delete-project-table').click(function () {
        $('#demo_modal').modal('show');
    });

    $('#qm-close-point-name').click(function () {
        $('#qm-autocomplete').show();
        $('.point-name-tag').hide();
    });

//    calculate percent of completed tasks


    $('#logout').click(function () {
        localStorage.setItem("dialog", "0");
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('#show-more-comment').click(function () {
        $('#demo_modal').modal('show');
    });

    $('#edit-btn-user').click(function () {
        $('#demo_modal').modal('show');
        return false;
    });



    $('#btn_modal_miss_imp').click(function () {
        $('#addtask_pr_modal').modal('hide');
        $('#invite').modal('show');
    });





});





$(window).load(function(){
    $(".comment-jsscroll").mCustomScrollbar({
        scrollButtons:{enable:true,scrollType:"stepped"},
        theme:"rounded-dark",
        autoExpandScrollbar:true,
        snapOffset:65
    });
});


