<script>
//convert datetime to timestamp

    $(function () {
//todo
        // Get last record from events du to current timestamp
        setInterval(function(){
            $.get( "<?php echo site_url('ajax/readEvent'); ?>", function( data ) {
                var data_time = toTimestamp(data.time);
                var dt = new Date().getTime();
                var n = dt.toString();
                var new_time = n.slice(0, -3);
                var name = data.name.slice(0,-5);
                name = name+'...';
                var new_time_int = parseInt(new_time);
                if(new_time_int-3 < data_time) {
                    // here we build html markup
//                    for projects
                    if (data['type'] == 0) {
                        $('.mini-inbox').append(
                            '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                '</button><a href="javascript:void(0)"><i class="fa fa-bell"></i>From: ' + name + '</a>' +
                                '<span class="message-mini">' + data.title + ' Project has been created</span></div>'
                        ).fadeIn('3000');
                    }
//                    for tasks
                    else if (data['type'] == 1) {
                        $('.mini-inbox').append(
                            '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                '</button><a href="javascript:void(0)"><i class="fa fa-bell"></i>From: ' + name + '</a>' +
                                '<span class="message-mini">' + data.title + ' Task has been added</span></div>'
                        ).fadeIn('3000');
                    }

                }

            }, "json" );
        }, 3000);
    });
</script>