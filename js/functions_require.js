define(function () {



    /**
     * Convert date to timestamp
     * @param strDate
     * @returns {number}
     */

    function toTimestamp(strDate){
        var datum = Date.parse(strDate);
        return datum/1000;
    }

/**
 * Get Label Task
 * @param $status
 * @returns {number|*}
 */


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

/**
 * Priority task status shows
 * @param $status
 * @returns {number|*}
 */

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

/**
 * Priority color task
 * @param $status
 * @returns {number|*}
 */


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


function startCount() {
    timer = setInterval(count,1000);
}

function count() {
    var time_shown = $("#task-timer").text();
    var time_chunks = time_shown.split(":");
    var  mins, secs;
    mins=Number(time_chunks[0]);
    secs=Number(time_chunks[1]);
    secs++;
    if (secs==60){
        secs = 0;
        mins=mins + 1;
    }

    $("#task-timer").text(plz(mins) + ":" + plz(secs));
    if (typeof(Storage) !== "undefined") {
        localStorage.ctime= $('#task-timer').text();
    }
    else {
        localStorage.ctime= '00:00';
    }
}

    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }

function plz(digit) {
    var zpad = digit + '';
    if (digit < 10) {
        zpad = "0" + zpad;
    }
    return zpad;
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

    return {
        toTimestamp: toTimestamp,
        plz: plz,
        count: count,
        startCount: startCount,
        next:next,
        goTo: goTo,
        getPriorityTaskClass:  getPriorityTaskClass,
        getPriorityTask:getPriorityTask,
        getLabelTask:getLabelTask,
        previous:previous
    }

});


