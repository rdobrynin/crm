function toTimestamp(strDate){
    var datum = Date.parse(strDate);
    return datum/1000;
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

    $("#float-users").click(function () {
        var posVar = 0;
        $(".right-float-sidebar").animate({right: posVar + 'px'});
        localStorage.setItem("sidebar", true);

    });


    $("#switch-left-bar").click(function () {
        var posVar = 50;
        $("#sidebar-wrapper").animate({width: posVar + 'px'});
        $("#wrapper").animate({paddingLeft: posVar + 'px'});
        $("#sidebar-wrapper").addClass('sidebar-wrapper-mini');
        $("#switch-left-bar").css('display','none');
        $('#switch-left-bar-back').fadeIn('slow');
        localStorage.setItem("sidebar-left", true);


    });


    $("#switch-left-bar-back").click(function () {
        var posVar = 198;
        $("#sidebar-wrapper").animate({width: posVar + 'px'});
        $("#sidebar-wrapper").removeClass('sidebar-wrapper-mini');
        $("#wrapper").animate({paddingLeft: posVar + 'px'});
        $("#switch-left-bar-back").css('display','none');
        $('#switch-left-bar').fadeIn('slow');
        localStorage.setItem("sidebar-left", false);

    });

    $(".close-right-sidebar").click(function () {
        var posVar = -300;
        $(".right-float-sidebar").animate({right: posVar + 'px'});
        $("#float-users").removeClass('active');
        localStorage.setItem("sidebar", false);
    });

// remember sidebar position
    var current_sidebar = localStorage.getItem("sidebar");
    if (current_sidebar == 'true') {
        var posVar = 0;
        $(".right-float-sidebar").animate({right: posVar + 'px'});
        $('#float-users').addClass('active');
    }
    else {
        $(".right-float-sidebar").css('right', '-300px');
        $('#float-users').removeClass('active');
    }

//
//    // remember sidebar left position
    var left_sidebar = localStorage.getItem("sidebar-left");
    if (left_sidebar == 'true') {
        $("#sidebar-wrapper").css('width','50px');
        $("#wrapper").css('padding-left','50px');
        $("#switch-left-bar").css('display','none');
        $('#switch-left-bar-back').fadeIn('slow');
    }
    else {
        $("#sidebar-wrapper").css('width','198px');
        $("#wrapper").css('padding-left','198px');
        $("#switch-left-bar-back").css('display','none');
        $("#switch-left-bar").css('display','block');

    }



    $('#approve_tasks_table').pageMe({pagerSelector:'#pager_approve_tasks',showPrevNext:true,hidePageNumbers:true,perPage:35});
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