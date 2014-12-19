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





        window.onbeforeunload = function () {
          var form_data_ = {
           id: '14',
          time: '000'
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