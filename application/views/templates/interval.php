<script>
//convert datetime to timestamp
    $(function () {
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
                if(new_time_int-3.5 < data_time) {

                    // build html markup

//Get left sidebar status

                    $user = '<?php print($user[0]['id'])?>';
                    var form_data = {
                        id: $user
                    };
                    $.ajax({
                        url: "<?php echo site_url('ajax/getUserbyId'); ?>",
                        type: 'POST',
                        data: form_data,
                        dataType: 'json',
                        success: function (msg) {
                            var status = msg.user[0]['sidebar_left'];

                            if(status == '1') {
$('.mini-inbox').css('display','none');
                            }
                            else {
                                $('.mini-inbox').css('display','block');
                            }
                        }
                    });




//  for project add

                    if (data['type'] == 0) {
                        //                    insert to log table
                        var idtr =  'current-tr-'+data["id"];
                        $("#log-table").find('tbody:first')
                            .prepend("<tr id='"+idtr+"'><td class='text-left'>"+data['id']+"</td><td class='text-left'>"+data['time']+"</td>+" +
                                "<td class='text-left'><a href='#' onclick='qmSendComment("+data['uid']+")'>"+data['name']+"</a></td><td class='text-left'><i class='fa fa-cube'></i>&nbsp;project</td>" +
                                "<td class='text-left'><i class='fa fa-plus-circle' style='color:#5cb85c;'></i></td>" +
                                "<td class='text-left'>"+data['title']+"</td>+" +
                                "<td class='text-left'>"+data['event']+"</td></tr>");


                            $('.mini-inbox').append(
                                '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                    '</button><a href="javascript:void(0)"><i class="fa fa-bell"></i>From: ' + name + '</a>' +
                                    '<span class="message-mini">' + data.title + ' Project has been created</span></div>'
                            ).fadeIn('3000');


                    }
// for tasks added
                    else if (data['type'] == 1) {
                        //                      insert to log table
                        var idtr =  'current-tr-'+data["id"];
                        $("#log-table").find('tbody:first')
                            .prepend("<tr id='"+idtr+"'><td class='text-left'>"+data['id']+"</td><td class='text-left'>"+data['time']+"</td>+" +
                                "<td class='text-left'><a href='#' onclick='qmSendComment("+data['uid']+")'>"+data['name']+"</a></td><td class='text-left'><i class='fa fa-gavel'></i>&nbsp;task</td>" +
                                "<td class='text-left'><i class='fa fa-plus-circle' style='color:#5cb85c;'></i></td>" +
                                "<td class='text-left'>"+data['title']+"</td>+" +
                                "<td class='text-left'>"+data['event']+"</td></tr>");

                        $('.mini-inbox').append(
                            '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                '</button><a href="javascript:void(0)"><i class="fa fa-bell"></i>From: ' + name + '</a>' +
                                '<span class="message-mini">' + data.title + ' Task has been added</span></div>'
                        ).fadeIn('3000');


                    }
//for comments added
                    else if (data['type'] == 2) {

                        $('.mini-inbox').append(
                            '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                '</button><a href="javascript:void(0)"><i class="fa fa-comment"></i>From: ' + name + '</a>' +
                                '<span class="message-mini">' + data.title + ' comment has been added</span></div>'
                        ).fadeIn('3000');


                    }
// delete task
                    else if (data['type'] == 3) {
//                      insert to log table
                        var idtr =  'current-tr-'+data["id"];

                        $("#log-table").find('tbody:first')
                            .prepend("<tr id='"+idtr+"'><td class='text-left'>"+data['id']+"</td><td class='text-left'>"+data['time']+"</td>+" +
                                "<td class='text-left'><a href='#' onclick='qmSendComment("+data['uid']+")'>"+data['name']+"</a></td><td class='text-left'><i class='fa fa-gavel'></i>&nbsp;task</td>" +
                                "<td class='text-left'><i class='fa fa-times-circle' style='color:#d9534f;'></i></td>" +
                                "<td class='text-left'>"+data['title']+"</td>+" +
                                "<td class='text-left'>"+data['event']+"</td></tr>");



                        $('.mini-inbox').append(
                            '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                '</button><a href="javascript:void(0)"><i class="fa fa-gavel"></i>From: ' + name + '</a>' +
                                '<span class="message-mini">' + data.title + ' task has been deleted</span></div>'
                        ).fadeIn('3000');


                    }

// update event
                    else if (data['type'] == 4) {
//                      insert to log table
                        var idtr =  'current-tr-'+data["id"];

                        $("#log-table").find('tbody:first')
                            .prepend("<tr id='"+idtr+"'><td class='text-left'>"+data['id']+"</td><td class='text-left'>"+data['time']+"</td>+" +
                                "<td class='text-left'><a href='#' onclick='qmSendComment("+data['uid']+")'>"+data['name']+"</a></td><td class='text-left'><i class='fa fa-gavel'></i>&nbsp;task</td>" +
                                "<td class='text-left'><i class='fa fa-check-circle' style='color:#428BCA;font-size:14px !important;'></i></td>" +
                                "<td class='text-left'>"+data['title']+"</td>+" +
                                "<td class='text-left'>"+data['event']+"</td></tr>");



                        $('.mini-inbox').append(
                            '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                '</button><a href="javascript:void(0)"><i class="fa fa-check-circle"></i>From: ' + name + '</a>' +
                                '<span class="message-mini">' + data.title + ' task has been updated</span></div>'
                        ).fadeIn('3000');


                    }

// update event
                    else if (data['type'] == 5) {
//                      insert to log table
                        var idtr =  'current-tr-'+data["id"];

                        $("#log-table").find('tbody:first')
                            .prepend("<tr id='"+idtr+"'><td class='text-left'>"+data['id']+"</td><td class='text-left'>"+data['time']+"</td>+" +
                                "<td class='text-left'><a href='#' onclick='qmSendComment("+data['uid']+")'>"+data['name']+"</a></td><td class='text-left'><i class='fa fa-pencil'></i>&nbsp;task</td>" +
                                "<td class='text-left'><i class='fa fa-check-circle' style='color:#428BCA;font-size:14px !important;'></i></td>" +
                                "<td class='text-left'>"+data['title']+"</td>+" +
                                "<td class='text-left'>"+data['event']+"</td></tr>");

                        $('.mini-inbox').append(
                            '<div class="alert inbox"><button type="button" class="close" data-dismiss="alert">×' +
                                '</button><a href="javascript:void(0)"><i class="fa fa-check-circle"></i>From: ' + name + '</a>' +
                                '<span class="message-mini">' + data.title + ' task has been updated</span></div>'
                        ).fadeIn('3000');

                    }
                }

            }, "json" );

            $.ajax({
                url: "<?php echo site_url('ajax/countProcessTasks'); ?>",
                type: 'GET',
                dataType: 'json',
                success: function (msg) {
                    if (msg > 0) {
                        $('#dash-process-task').html(msg);
                    }
                    else {
                        $('#dash-process-task').html(0);
                    }
                }
            });

            $.ajax({
                url: "<?php echo site_url('ajax/countReadyTasks'); ?>",
                type: 'GET',
                dataType: 'json',
                success: function (msg) {
                    if (msg > 0) {
                        $('#calc-ready-tasks').html(msg);
                    }
                    else {
                        $('#calc-ready-tasks').html(0);
                        $('#ready-task-table').css('display','none');
                    }
                }
            });
        }, 3000);
    });
</script>