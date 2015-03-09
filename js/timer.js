$(function () {
    var findTime = localStorage.getItem('ctime');
    if (typeof(Storage) !== "undefined") {
        var find_Time = localStorage.getItem('ctime');
        if(find_Time === null || findTime === undefined  ) {
            localStorage.ctime='00:00';
            $.ajax({
                url: '/ajax/getTimer',
                type: 'GET',
                dataType: 'json',
                success: function (msg) {
                    if(msg == false) {
                        localStorage.ctime='00:00';
                    }
                    else {
                        localStorage.ctime=msg+':00';
                    }
                }
            });
        }

        if(localStorage.ctime[0] !==0 && localStorage.ctime[1] !==0 && localStorage.ctime[3] !== 0 && localStorage.ctime[4] !== 0) {
            $("#task-timer").text(localStorage.ctime[0] + localStorage.ctime[1] + ":" + localStorage.ctime[3] + localStorage.ctime[4]);
        }
        if(localStorage.play ==='ok') {
            startCount();
        }
        if(localStorage.pause ==='ok') {
            timer=0;
            clearInterval(timer);
            $('#play-timer').removeClass('active-time');
            $('#play-timer').prop("disabled", false);
            $('#task-timer, #task-timer-pause, #task-timer-stop').show();
        }
        else if(localStorage.play ==='ok') {
            $('#play-timer').attr("disabled", "disabled");
        }
        else if(localStorage.stop ==='ok') {
            $('#play-timer').removeClass('active-time');
            $('#play-timer').prop("disabled", false);
            $('#task-timer, #task-timer-pause, #task-timer-stop').hide();
        }
    }

    if (typeof(Storage) !== "undefined") {
        if (localStorage.play === 'ok') {
            $('#play-timer').addClass('active-time');
            $('#play-timer').attr("disabled", "disabled");
            $('#task-timer, #task-timer-pause, #task-timer-stop').show();
        }

        if (localStorage.stop === 'ok') {
            $('#play-timer').removeClass('active-time');
            $('#play-timer').prop("disabled", false);
            $('#task-timer, #task-timer-pause, #task-timer-stop').hide();
        }
    }
    else {
        alert('local storage error');
    }

    $('#play-timer').click(function () {

        if (typeof(Storage) !== "undefined") {

            if(localStorage.pause !== 'ok') {
                timer=0;
                clearInterval(timer);
                startCount();
                $('#task-timer').text(plz(0) + ":" + plz(0));
            }
            else {

                $("#task-timer").text(localStorage.ctime[0] + localStorage.ctime[1] + ":" + localStorage.ctime[3] + localStorage.ctime[4]);
                startCount();
            }
            localStorage.play = 'ok';
            localStorage.pause = false;
            localStorage.stop = false;
        }
        else {
            alert('local storage error');
        }
        $(this).addClass('active-time');
        $('.active-time').attr("disabled", "disabled");
        $('#task-timer, #task-timer-pause, #task-timer-stop,#task-timer-clear ').show();
    });

    $('#task-timer-stop').click(function () {
        if (typeof(Storage) !== "undefined") {
            $('#task_modal_timer').modal({show:true});

            $( "#log_timer" ).val( function( index, val ) {
                val = localStorage.ctime;
                return val ;
            });
        }
        else {
            alert('fault with local storage');
        }
//            $('#play-timer').removeClass('active-time');
//            $('#play-timer').prop("disabled", false);
//            $('#task-timer, #task-timer-pause, #task-timer-stop').hide();
    });

    $('#task-timer-pause').click(function () {
        $('#play-timer').addClass('active-time');
//            clear interval
        clearInterval(timer);
        var pauseTime = $("#task-timer").text();
        if (typeof(Storage) !== "undefined") {
            localStorage.play = false;
            localStorage.pause = 'ok';
            localStorage.stop = false;
            localStorage.ctime = pauseTime;
        }
        else {
            alert('local storage error');
        }
        $('#play-timer').prop("disabled", false);
    });

    // Calculate total time in seconds
    currentTimeRecord = localStorage.getItem("ctime");
    var new0 = currentTimeRecord[0];
    var new1 = currentTimeRecord[1];
    var new3 = currentTimeRecord[3];
    var new4 = currentTimeRecord[4];
    currentTimeRecord_min =  parseFloat(currentTimeRecord[0]+currentTimeRecord[1]);
    currentTimeRecord_sec =  parseFloat(currentTimeRecord[3]+currentTimeRecord[4]);
    currentTimeRecord = currentTimeRecord_min;

    $.ajax({
        url: '/ajax/getTimer',
        type: 'GET',
        dataType: 'json',
        success: function (msg) {
            if(msg == false) {
                var getMin = 0;
            }
            else {
                var getMin = parseInt(msg);
            }
        }
    });


    $('#log_task_btn').click(function () {
        var form_data_ = {
            time: '0'
        };
        $.ajax({
            url: '/ajax/updateTimer',
            type: 'POST',
            data: form_data_,
            dataType: 'json',
            success: function (msg) {
                $('#task_modal_timer').modal('hide');
                var id_task = $('#task_log_title').val();
                var tts = $('#log_timer').val();
                var form_data = {
                    id: id_task,
                    status: '3',
                    tts: tts
                };

                $.ajax({
                    url: '/ajax/completeTask',
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (msg) {
                        if (typeof(Storage) !== "undefined") {
                            clearInterval(timer);
                            localStorage.play = false;
                            localStorage.pause = false;
                            localStorage.stop = 'ok';
                        }
                        $('#play-timer').removeClass('active-time');
                        $('#play-timer').prop("disabled", false);
                        $('#task-timer, #task-timer-pause, #task-timer-stop').hide();
                    }
                });
            }
        });
    });

    $('#task-timer-clear').click(function () {
        $('#modal-confirm-cancel-time').modal('show');
    });


    $('#modal-btn-cancel-time').click(function () {

        if (typeof(Storage) !== "undefined") {
            clearInterval(timer);
            localStorage.play = false;
            localStorage.pause = false;
            localStorage.stop = 'ok';
        }
        $('#play-timer').removeClass('active-time');
        $('#play-timer').prop("disabled", false);
        $('#modal-confirm-cancel-time').modal('hide');
        $('#task-timer, #task-timer-pause, #task-timer-stop, #task-timer-clear').hide();
    });

    window.onbeforeunload = function () {
        var form_data_ = {
            time: currentTimeRecord
        };
        $.ajax({
            url: '/ajax/updateTimer',
            type: 'POST',
            data: form_data_,
            dataType: 'json',
            success: function (msg) {

            }
        });
    }
});