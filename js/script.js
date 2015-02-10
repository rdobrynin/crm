function toTimestamp(strDate){
    var datum = Date.parse(strDate);
    return datum/1000;
}


function getLabelTask($status) {
    $result=0;
    if($status == 1) {
        $result = 'label-danger';
    }
    else if($status == 2) {
        $result = 'label-success';
    }
    else if($status == 3) {
        $result = 'label-warning';
    }
    else if($status == 4) {
        $result = 'label-primary';
    }
    else if($status == 5) {
        $result = 'label-info';
    }
    else if($status == 6) {
        $result = 'label-primary';
    }
    else if($status == 7) {
        $result = 'label-danger';
    }
    else if($status == 8) {
        $result = 'label-info';
    }
    return $result;
}


function getPriorityTask($status) {
    $result=0;
    if($status == 0) {
        $result = 'minor';
    }
    else if($status == 1) {
        $result = 'major';
    }
    else if($status == 2) {
        $result = 'critical';
    }
    return $result;
}


function getPriorityTaskClass($status) {
    $result=0;
    if($status == 0) {
        $result = 'color:#428bca';
    }
    else if($status == 1) {
        $result = ' color:#f89406';
    }
    else if($status == 2) {
        $result = ' color:#d9534f';
    }
    return $result;
}






//Pager

$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 10,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);

    var listElement = $this;
    var perPage = settings.perPage;
    var children = listElement.children();
    var pager = $('.pager');

    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }

    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }

    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);

    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }

    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }

    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }

    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active");

    children.hide();
    children.slice(0, perPage).show();

    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });

    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }

    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }

    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;

        children.css('display','none').slice(startAt, endOn).show();

        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }

        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }

        pager.data("curr",page);
        pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");

    }
};

$(function() {


    $("#search-dash-over-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#dash-over-table tbody").find("tr"), function() {
            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    $("#search-dash-process-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#dash-process-table tbody").find("tr"), function() {
            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    $("#search-logs-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#log-table tbody").find("tr"), function() {
            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    $("#search-dash-approve-table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#approve-task-table tbody").find("tr"), function() {
            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

//localStorage.clear();
//
//    $(document).on('click', '.panel-heading span.clickable', function (e) {
//        var $this = $(this);
//        if (!$this.hasClass('panel-collapsed')) {
//            $this.parents('.panel').find('.panel-body').slideUp();
//            $this.addClass('panel-collapsed');
//            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
//        } else {
//            $this.parents('.panel').find('.panel-body').slideDown();
//            $this.removeClass('panel-collapsed');
//            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
//        }
//    });
//    $(document).on('click', '.panel div.clickable', function (e) {
//        var $this = $(this);
//        if (!$this.hasClass('panel-collapsed')) {
//            $this.parents('.panel').find('.panel-body').slideUp();
//            $this.addClass('panel-collapsed');
//            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
//            $('.show-more-activity').hide();
//        } else {
//            $this.parents('.panel').find('.panel-body').slideDown();
//            $this.removeClass('panel-collapsed');
//            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
//            $('.show-more-activity').show();
//        }
//    });
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



    /* START OF DEMO JS - NOT NEEDED */
    if (window.location == window.parent.location) {
        $('#fullscreen').html('<span class="glyphicon glyphicon-resize-small"></span>');
        $('#fullscreen').attr('href', 'http://bootsnipp.com/mouse0270/snippets/PbDb5');
        $('#fullscreen').attr('title', 'Back To Bootsnipp');
    }
    $('#fullscreen').on('click', function(event) {
        event.preventDefault();
        window.parent.location =  $('#fullscreen').attr('href');
    });
    $('#fullscreen').tooltip();
    /* END DEMO OF JS */

    $('.navbar-toggler').on('click', function(event) {
        event.preventDefault();
        $(this).closest('.navbar-minimal').toggleClass('open');
    })

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


//
//    $(".hover-td-name").hover(
//        function () {
//            $(this).css("background","yellow");
//        },
//        function () {
//            $(this).css("background","");
//        }
//    );


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

});