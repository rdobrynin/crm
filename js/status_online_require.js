define(['jquery'], function ($) {

    /**
     * AJAX online/offline status
     */

    setInterval(function () {
        current_time = $.now();
        $.ajax({
            url: '/ajax/check_online',
            type: 'GET',
            dataType: 'json',
            success: function (msg) {
                msg.status.forEach(function (entry) {
                    var name = entry['first_name'] + ' ' + entry['last_name'];
                    var id = entry['id'];
                    var time = entry['status_time'];
                    var status = entry['status'];
                    if (current_time < (entry['status_time'] + 100)) {
//           ONLINE
                        if (entry['status'] == '1') {
                            $('.show-info-online').show();
                            $('.show-info-online').children(".show-info-content-online").html('<span class="label label-xs label-success label-round"></span>' + name + ' is online');

                            $('#status-online-' + id).removeClass('grey').addClass('green');
                            $('#status-online-comment-' + id).removeClass('grey').addClass('green');
                            $('#status-assign-user-' + id).removeClass('grey').addClass('green');
                            $('.show-info-online').delay(2500).fadeOut();
                        }
                        else if (entry['status'] == '0') {
                            $('.show-info-online').show();
                            $('.show-info-online').children(".show-info-content-online").html('<span class="label label-xs label-primary label-round"></span>' + name + ' is offline');
                            $('#status-online-' + id).removeClass('green').addClass('grey');
                            $('#status-online-comment-' + id).removeClass('green').addClass('grey');
                            $('#status-assign-user-' + id).removeClass('green').addClass('grey');
                            $('.show-info-online').delay(2500).fadeOut();
                        }
                    }
                });
            }
        });
    }, 5900);
});

