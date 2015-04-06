define(['jquery'], function ($) {

//  add client
    $(function() {

        $('#add_phone_client').click(function () {
            $("#items_phone_client").append('<div class="form-group"><div class="col-sm-4"><input type="text" placeholder="Additional phone number" style="margin-bottom:8px; margin-top: 2px;" class="form-control col-md-4" name="client_phone[]"></div><button  class="btn btn-xs btn-danger delete-phone-client">Delete</button></div></div><div>');
        });
        $("body").on("click", ".delete-phone-client", function (e) {
            $(this).parent("div").remove();
        });


        $('#add_manager_client').click(function () {
            manager_value = $("#select-manager option:selected").val();
            var manager_title = $("#select-manager option:selected").text();
            $('#items_manager_client').append('&nbsp;<span><input type="hidden" name="client_manager[]" value="input_manager_'+ manager_value + '"><div class="label label-default label-tag delete-manager-client" id="delete-manager-client' + manager_value + '">' + manager_title + '&nbsp;<i class="fa fa-times"></i></div></span>');

        });
        $("body").on("click", ".delete-manager-client", function (e) {;
            $(this).parent("span").remove();
        });


        $('#add_curator_client').click(function () {
            curator_value = $("#select-curator option:selected").val();
            var curator_title = $("#select-curator option:selected").text();
            $('#items_curator_client').append('&nbsp;<span><input type="hidden" name="client_curator[]" value="input_curator_'+ curator_value + '"><div class="label label-default label-tag delete-curator-client" id="delete-curator-client' + curator_value + '">' + curator_title + '&nbsp;<i class="fa fa-times"></i></div></span>');

        });
        $("body").on("click", ".delete-curator-client", function (e) {
            $(this).parent("span").remove();
        });


        res = $('.errors').text();
        if(res.length > 0 ) {
            $('.errors').show();
        }
        else {
            $('.errors').hide();
        }

        $('.errors').click(function () {
            $(this).slideToggle("fast");
        });

        $('body').click(function () {
            $('.errors').slideUp( "fast");
        });


    });





});

