define(function () {
    $(function () {

        $('#close-project-create').click(function () {
            $('#save_project_modal, #check_empty_project, #check_title_project').css('display', 'none');
            $("input[type=text], textarea").val("");
        });


        $('.project-view').click(function () {
            var $data;
            $data= $(this).attr('data-id');
            var $panel = $('.filterable .btn-filter').parents('.filterable'),
                $tbody = $panel.find('.table tbody');
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
            $(this).closest("tr").toggleClass("project-task-main");
            $('#task-for-project-'+$data).fadeToggle("fast", function () {
            });
            if ($("#route-task").closest("tr").hasClass('project-task-main')) {
                $('.btn-filter').attr('disabled', 'disabled');
            }
            else {
                $('.btn-filter').removeAttr('disabled');
            }
        });


        $('.froze-project').click(function () {
            var $data;
            $data= $(this).attr('data-id');

            $('#froze-project-modal').modal('show');
            $('.froze-btn-project').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '/ajax/frozeProject',
                    data: {project: $data, status: 1},
                    beforeSend: function () {
                        $('.froze-btn-cancel').addClass('disabled');
                    },
                    success: function (data) {
                        var $data = JSON.parse(data);
                        $('.froze-btn-cancel').removeClass('disabled');
                        $('#froze-project-modal').modal('hide');
                        window.location.href = '/projects';
                    },
                    error: function () {
                        alert('Something went with error')
                    }
                });
            });
        });

        $('.unfroze-project').click(function () {
            var $data;
            $data= $(this).attr('data-id');
            $('#unfroze-project-modal').modal('show');
            $('.unfroze-btn-project').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '/ajax/frozeProject',
                    data: {project: $data, status: 0},
                    beforeSend: function () {
                        $('.unfroze-btn-cancel').addClass('disabled');
                    },

                    success: function (data) {
                        $('.unfroze-btn-cancel').removeClass('disabled');
                        $('#unfroze-project-modal').modal('hide');
                        window.location.href = '/projects';
                    },
                    error: function () {
                        alert('Something went with error')
                    }
                });
            });
        });

        $('.assign-user-modal').click(function () {
            var $data;
            $data= $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url: '/ajax/getUsersProject',
                data: { project: $data},
                beforeSend:function(){
                    $('.manage-project').addClass('loading');
                    $('.manage-project-block').css('visibility','hidden');
                },
                complete: function()  {
                    setTimeout(function() {
                        $('#assign_user_modal').modal('show');
                        $('.manage-project').removeClass('loading');
                        $('.manage-project-block').css('visibility','visible');
                    }, 700);
                },
                success:function(data){
                    $('#assign_users_details').html(data);
                    $(".assign-users-jsscroll").mCustomScrollbar({
                        scrollButtons:{enable:true,scrollType:"stepped"},
                        theme:"rounded-dark",
                        autoExpandScrollbar:true,
                        snapOffset:65
                    });

                },
                error:function(){
                    alert('Something went with error')
                }
            });
        });




        $('#assign_user_modal').on('shown.bs.modal', function (e) {

            $('.assign-user-project').click(function () {
                var $data,$project;
                $data= $(this).attr('data-uid');
                $project= $(this).attr('data-project');
                var form_data = {
                    id: $data,
                    pid: $project
                };
                $.ajax({
                    url: '/ajax/assignUserProject',
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (msg) {
                        if (msg.id != 'false') {
                            console.log(msg);
                            $('#assign-user-li-' + $data).fadeOut('slow');
                            $('#assign-panel-'+$project).append('&nbsp;<span class="label label-default label-tag" <i class="fa fa-mail"></i>&nbsp;<span class="get_old_mail">'+msg.full_name+
                                ' </span>&nbsp;');
                        }
                        else {
                            alert('Something was with error');
                        }
                    }
                });
            });

        })


    });
});