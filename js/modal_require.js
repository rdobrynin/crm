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