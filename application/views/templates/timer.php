<script>
    //TIMER

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

    function plz(digit) {
        var zpad = digit + '';
        if (digit < 10) {
            zpad = "0" + zpad;
        }
        return zpad;
    }


    $(function () {


        unical_id = <?php print json_encode($user[0]['id']);?>;


//        localStorage.clear();


        var findTime = localStorage.getItem('ctime');


        if (typeof(Storage) !== "undefined") {
            var find_Time = localStorage.getItem('ctime');
            if(find_Time === null || findTime === undefined  ) {
                localStorage.ctime='00:00';



                $.ajax({
                    url: "<?php echo site_url('ajax/getTimer'); ?>",
                    type: 'POST',
                    data: form_data_,
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

//            localStorage.ctime='00:00';
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
            $('#task-timer, #task-timer-pause, #task-timer-stop').show();
        });

        $('#task-timer-stop').click(function () {
            if (typeof(Storage) !== "undefined") {
                $('#task_modal_timer').modal({show:true});

                $( "#log_timer" ).val( function( index, val ) {
                    val = localStorage.ctime;
                    return val ;
                });

                clearInterval(timer);
                localStorage.play = false;
                localStorage.pause = false;
                localStorage.stop = 'ok';
            }
            else {
                alert('fault with local storage');
            }
            $('#play-timer').removeClass('active-time');
            $('#play-timer').prop("disabled", false);
            $('#task-timer, #task-timer-pause, #task-timer-stop').hide();
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
        current_uid = <?php print json_encode($user[0]['id']);?>;
        currentTimeRecord = localStorage.getItem("ctime");
        var new0 = currentTimeRecord[0];
        var new1 = currentTimeRecord[1];
        var new3 = currentTimeRecord[3];
        var new4 = currentTimeRecord[4];
        currentTimeRecord_min =  parseFloat(currentTimeRecord[0]+currentTimeRecord[1]);
        currentTimeRecord_sec =  parseFloat(currentTimeRecord[3]+currentTimeRecord[4]);
        currentTimeRecord = currentTimeRecord_min;
        var form_data_ = {
            id: <?php print json_encode($user[0]['id']);?>
        };
        $.ajax({
            url: "<?php echo site_url('ajax/getTimer'); ?>",
            type: 'POST',
            data: form_data_,
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
                id: <?php print json_encode($user[0]['id']);?>,
                time: '0'
            };
            $.ajax({
                url: "<?php echo site_url('ajax/updateTimer'); ?>",
                type: 'POST',
                data: form_data_,
                dataType: 'json',
                success: function (msg) {
$('#task_modal_timer').modal('hide');
                }
            });
        });

        window.onbeforeunload = function () {
            var form_data_ = {
                id: <?php print json_encode($user[0]['id']);?>,
                time: currentTimeRecord
            };
            $.ajax({
                url: "<?php echo site_url('ajax/updateTimer'); ?>",
                type: 'POST',
                data: form_data_,
                dataType: 'json',
                success: function (msg) {

                }
            });
        }
    });
</script>