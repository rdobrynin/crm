define(function(){

    $(function () {
        /**
         * Add project
         */

        $("#addproject_btn").click(function () {
            var form_data = {
                project_title: $('#project_title').val(),
                project_desc: $('#project_desc').val(),
                user_id: $('#user_added_id').val()
            };
            $.ajax({
                url: '/ajax/addproject',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                    if (msg.empty == false) {
                        $('#check_empty_project').css('display', 'block');
                    }
                    if (msg.empty == true) {
                        $('#check_empty_project').css('display', 'none');
                    }

                    if (msg.project == false) {
                        $('#check_title_project').css('display', 'block');
                    }
                    if (msg.project == true) {
                        $('#check_title_project').css('display', 'none');
                    }

                    if (msg.send == true && msg.project == true && msg.empty == true) {
                        $('#save_project_modal').css('display', 'block');
                        setTimeout(function () {
                            $('#save_project_modal, #check_empty_project, #check_title_project').css('display', 'none');
                            $("input[type=text], textarea").val("");

                            $('#addproject_modal').modal('hide');
                        }, 2000);
                    }
                }
            });
            setInterval(function () {
                $.get('/ajax/countProjects', function (data) {
                    if (data > 0) {
                        $('#badge-count-projects,#badge-count-mini-projects').html(data);
                    }
                }, "json");
            }, 3000);
        });




        $('#invite-person').click(function () {

            $('#invite').modal('show');


            $('.selectpicker').selectpicker({
                style: 'btn-special',
                size: 14
            });
        });




        /**
         * INVITATION AJAX
         *
         **/

        $("#invite-ajax-btn").click(function () {
            var form_data = {
                email: $('#email_invite').val(),
                first_name: $('#first_name_invite').val(),
                last_name: $('#last_name_invite').val(),
                role: $('#role_invite').val(),
                user_id: $('#user_invite_id').val()

            };
            console.log(form_data );
            $.ajax({
                url: '/ajax/invitation',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                success: function (msg) {
                    if (msg.email == false) {
                        $('#check_email').css('display', 'block');
                        $('#check_email').html('<i class="fa fa-exclamation-circle"></i>&nbsp;This email is already registered');
                    }
                    else {
                        $('#check_email').css('display', 'none');
                    }

                    if (msg.empty == false) {
                        $('#check_empty').css('display', 'block');
                    }
                    if (msg.empty == true) {
                        $('#check_empty').css('display', 'none');
                    }
                    if (msg.check_email == false) {
                        $('#check_email_f').css('display', 'block');
                        $('#check_email_f').html('<i class="fa fa-exclamation-circle"></i>&nbsp;email address is invalid');
                    }
                    else {
                        $('#check_email_f').css('display', 'none');
                    }

                    if (msg.send == true) {
                        $('#send_mail').css('display', 'block');
                        setTimeout(function () {
                            $('#check_email_f, #check_email').css('display', 'none');
                            $("input[type=text], textarea").val("");
                            $('#invite').modal('hide');
                        }, 2000);
                    }
                },
                error: function (msg) {
                 console.log(msg);
                }
            });




//        $(".toggle-div-dialog").click(function (event) {
//            var check = false;
//            if ($('#toggle-dialog-btn').is(":checked")) {
//                check = 1;
//            }
//            else {
//                check = 0;
//            }
//            var form_data = {
//                introduce: check,
//                user_id: $('#user_id_dialog').val()
//            };
//            $.ajax({
//                url: '/ajax/settingsDialog',
//                type: 'POST',
//                data: form_data,
//                dataType: 'json',
//                success: function (msg) {
//                }
//            });
//        });



            // Check if email already registered
            $( "#client_email" ).blur(function() {
                var form_data = {
                    email: $(this).val()
                };
                $.ajax({
                    url: '/ajax/check_emails',
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (msg) {
                        if(msg.result!=true) {
                            $('#create_company').attr('disabled','disabled');
                            $('#check_email').show();
                            $("#check_email").empty().append(msg.result);
                        }
                        else {
                            $('#create_company').removeAttr('disabled');
                            $('#check_email').hide();
                        }
                    }
                });
            });

            //      Check if title is already registered
            $( "#client_title" ).blur(function() {
                var form_data = {
                    title: $(this).val()
                };
                $.ajax({
                    url: '/ajax/check_client',
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (msg) {
                        if(msg.result!=null) {
                            $('#create_company').attr('disabled','disabled');
                            $('#check_client').show();
                            $("#check_client").empty().append(msg.result);
                        }
                        else {
                            $('#create_company').removeAttr('disabled');
                            $('#check_client').hide();
                        }
                    }
                });
            });

            $.ajax({
                url: '/ajax/getCurrentTime',
                type: 'GET',
                dataType: 'json',
                success: function (time) {
                    $('#dueto_modal').datetimepicker({
                        theme:'light',
                        format:'d.m.Y H:i',
                        minDate: time,
                        minTime:0
                    });

                }
            });
        });





        $('#add_task_modal').click(function () {
            var pr_val;
            pr_val = $('#choose_project_modal').val();
            if(pr_val.length>0) {
                GetImpTask(pr_val);
            }
        });

            $( "body" ).delegate( "#btn_modal_miss_imp", "click", function(e) {
            $('#addtask_pr_modal').modal('hide');
            $('#invite').modal('show');
        });
    });

    function GetImpTask(arg) {
        var form_data = {
            id: arg
        };
        $.ajax({
            url: '/ajax/GetImpTask',
            type: 'GET',
            data: form_data,

            success: function (data) {
                $('#addtask_pr_modal').modal('show');
                $('#ajax-get-modal-imps').html(data);
                $('.selectpicker').selectpicker();
                $('#dueto_modal').datetimepicker();

            }
        });
    }


    $("#choose_project_modal").change(function(){
        var selectedProject;
        selectedProject = $("#choose_project_modal option:selected").val();
        UpdateImpTask(selectedProject);

    });



    function UpdateImpTask(arg) {
        var form_data = {
            id: arg
        };
        $.ajax({
            url: '/ajax/GetImpTask',
            type: 'GET',
            data: form_data,

            success: function (data) {

                $('#ajax-get-modal-imps').html(data);
                $('.selectpicker').selectpicker();
                $('#dueto_modal').datetimepicker();

            }
        });
    }


});