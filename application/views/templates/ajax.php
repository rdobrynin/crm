<script>
  $(function () {

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
          $.ajax({
              url: "<?php echo site_url('ajax/invitation'); ?>",
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

                  if(msg.empty == false) {
                      $('#check_empty').css('display', 'block');
                  }
                  if(msg.empty == true) {
                      $('#check_empty').css('display', 'none');
                  }
                  if(msg.check_email == false) {
                      $('#check_email_f').css('display', 'block');
                      $('#check_email_f').html('<i class="fa fa-exclamation-circle"></i>&nbsp;email address is invalid');
                  }
                  else {
                      $('#check_email_f').css('display', 'none');
                  }

                  if(msg.send == true) {
                      $('#send_mail').css('display', 'block');
                      setTimeout(function() {
                          $('#check_email_f, #check_email').css('display', 'none');
                          $("input[type=text], textarea").val("");
                          $('#invite').modal('hide');
                      }, 2000);
                  }


              }
          });
      });


console.log(localStorage);
      /**
       * Add project
       *
      **/

      $("#addproject_btn").click(function () {
          var form_data = {
              project_title: $('#project_title').val(),
              project_desc: $('#project_desc').val(),
              user_id: $('#user_added_id').val()
          };
          $.ajax({
              url: "<?php echo site_url('ajax/addproject'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  if(msg.empty == false) {
                      $('#check_empty_project').css('display', 'block');
                  }
                  if(msg.empty == true) {
                      $('#check_empty_project').css('display', 'none');
                  }

                  if(msg.project == true) {
                      $('#check_title_project').css('display', 'none');
                  }
                  if(msg.project == false) {
                      $('#check_title_project').css('display', 'block');
                  }

                  if(msg.send == true && msg.project == true) {
                      $('#save_project_modal').css('display', 'block');
                      setTimeout(function() {

                          $('#save_project_modal, #check_empty_project, #check_title_project').css('display', 'none');
                          $("input[type=text], textarea").val("");

                          $('#addproject_modal').modal('hide');
                      }, 2000);
                  }
              }
          });
//update count of projects
          setInterval(function(){
              $.get( "<?php echo site_url('ajax/countProjects'); ?>", function( data ) {
                  if(data >0) {
                      console.log(data);
                      $('#badge-count-projects').html(data);
                  }
              }, "json" );
          }, 3000);
      });



      /**
       * Add task after project created
       **/

      $("#addproject_addtask_btn").click(function () {
          var form_data = {
              project_title: $('#project_title').val(),
              project_desc: $('#project_desc').val(),
              user_id: $('#user_added_id').val()
          };
          $.ajax({
              url: "<?php echo site_url('ajax/addproject'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  if(msg.empty == false) {
                      $('#check_empty_project').css('display', 'block');
                  }
                  if(msg.empty == true) {
                      $('#check_empty_project').css('display', 'none');
                  }

                  if(msg.project == true) {
                      $('#check_title_project').css('display', 'none');
                  }
                  if(msg.project == false) {
                      $('#check_title_project').css('display', 'block');
                  }

                  if(msg.send == true && msg.project == true) {
                      $('#save_project_modal').css('display', 'block');
                      setTimeout(function() {

                          $('#save_project_modal, #check_empty_project, #check_title_project').css('display', 'none');
                          $("input[type=text], textarea").val("");

                          $('#addproject_modal').modal('hide');
                          $('#addtask_pr_modal').modal('show');
                      }, 2000);
                  }
              }
          });
//update count of projects
          setInterval(function(){
              $.get( "<?php echo site_url('ajax/countProjects'); ?>", function( data ) {
                  if(data >0) {
                      console.log(data);
                      $('#badge-count-projects').html(data);
                  }
              }, "json" );
          }, 3000);
      });

      /**
       *  Upload avatar
      **/

      $('#upload_file').submit(function() {
          $.ajaxFileUpload({
              url             :"<?php print(base_url());?>ajax/do_upload",
              secureuri       :false,
              fileElementId   :'userfile',
              dataType        : 'json',
              data            : {
              'user_id'             : $('#user_id').val()
              },
              success : function (data, status)
              {
                  if(data.status != 'error') {
//                      $('#files').html('<p class="lead">Avatar successfully uploaded...</p>');
                      $('#avatar-true').hide();
                      $('#avatar-true-ajax').show();
                      $('.avatar-img').hide();
                      $('.avatar-img-ajax').show();
                      $('.avatar-img-ajax').html("<a href='<?php print base_url(); ?>profile'><img src='<?php print base_url(); ?>uploads/avatar/"+data.new_avatar+"' alt='Smiley face' height='45'></a>");
                      $('#ajax-temp').html("<img src='<?php print base_url(); ?>"+'uploads/avatar/'+data.new_avatar+"' alt='Smiley face' height='100'>");
                  }
                  $('#files').show();
                  $('#files').empty();
                  $('#files').html('<p class="lead">'+data.msg+'</p>');
                  $('#files').delay(1500).fadeOut();
//                  $('.show-info').show();
//                  $('.show-info').children( ".show-info-content").html(data.msg);
//                  $('.show-info').delay(2500).fadeOut();
              }
          });
          return false;
      });

    $(".help-button").click((function() {
      var i = 0;
      return function() {
        $('.help-block').animate({
          height: (++i % 2) ? 490 :10,
            background:'rgb(255, 144, 11)',opacity:0.9
        }, 200);
          $('.help-content').slideToggle('fast');
      }
    })());

      /**
       * AJAX online/offline status
       */

      setInterval(function() {
        current_time = $.now();
        $.ajax({
          url: "<?php echo site_url('ajax/check_online'); ?>",
          type: 'GET',
          dataType: 'json',
          success: function (msg) {
            msg.status.forEach(function(entry) {
              var name = entry['first_name'] + ' ' + entry['last_name'];
              var id = entry['id'];
              var time = entry['status_time'];
              var status = entry['status'];
              if(current_time <(entry['status_time']+100)) {
//           ONLINE
                if(entry['status']=='1') {
//                  var audio = $('<audio />', {
//                    autoPlay : 'autoplay',
//                    controls : 'controls'
//                  });
//                  addSource(audio, 'sound/online.ogg');
//                  addSource(audio, 'sound/online.mp3');
//                    audio.appendTo('.note-sound');
//                  function addSource(elem, path) {
//                    $('<source />').attr('src', path).appendTo(elem);
//                  }
            $('.show-info-online').show();
            $('.show-info-online').children( ".show-info-content-online").html('<span class="label label-xs label-success label-round"></span>'+name+' is online');
            $('.show-info-online').delay(2500).fadeOut();
                }
                else if(entry['status']=='0') {
//                  var audio = $('<audio />', {
//                    autoPlay : 'autoplay',
//                    controls : 'controls'
//                  });
//                  addSource(audio, 'sound/online.ogg');
//                  addSource(audio, 'sound/online.mp3');
//                  audio.appendTo('.note-sound');
//                  function addSource(elem, path) {
//                    $('<source />').attr('src', path).appendTo(elem);
//                  }
                  $('.show-info-online').show();
                  $('.show-info-online').children( ".show-info-content-online").html('<span class="label label-xs label-primary label-round"></span>'+name+' is offline');
                  $('.show-info-online').delay(2500).fadeOut();
                }
              }
            });
          }
        });
      }, 5900);

      $(".btn-update-ttp").click(function(event) {
          var current_id = event.target.id;
          var input_id = event.target.id+'_input';
          var input_val = $('#'+input_id).val();
          var form_data = {
              title :input_val,
              id: current_id
          };
          $.ajax({
              url: "<?php echo site_url('ajax/changeTaskType'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  console.log(msg.check['title']);
                  if (msg.empty == true) {
                      $('#check_empty_' + input_id).fadeIn('slow').css('display', 'block');
                  }
                  else {
                      if (msg.check['title'] != input_val) {
                          $('#' + current_id).html('applied');
                      }
                      $('#check_empty_' + input_id).fadeOut('slow').css('display', 'none');
                  }
              }
          });
      });

      $("#addtask_pr_btn").click(function(event) {
          var form_data = {
              title :$('#task_pr_title').val(),
              desc :$('#task_pr_desc').val(),
              project :$('#choose_project_modal').val(),
              dueto :$('#dueto_modal').val(),
              label :$('#task_type_choose').val(),
              priority :$('#task_priority_choose').val(),
              implementor :$('#implementor_choose_modal').val(),
              owner :$('#user_added_task_pr_id').val()


          };
          $.ajax({
              url: "<?php echo site_url('ajax/createTask'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  console.log(msg);
                  if (msg.empty == true) {
                      $('#check_empty_task_pr').fadeIn('slow').css('display', 'block');
                  }
                  else {
                      $('#check_empty_task_pr').fadeIn('slow').css('display', 'none');
                  }
                  if(msg.result == true && msg.repeat == false) {
                      $('#check_repeat_task_pr').fadeIn('slow').css('display', 'none');
                      $('#save_task_pr_modal').fadeIn('slow').css('display', 'block');
                      setTimeout(function() {
                          $('#save_task_pr_modal,#save_error_task_pr_modal').css('display', 'none');
                          $("input[type=text], textarea").val("");
                          $('#addtask_pr_modal').modal('hide');
                      }, 2000);


                      setInterval(function(){
                          $.get( "<?php echo site_url('ajax/countTasks'); ?>", function( data ) {
                              if(data.length >0) {
                                  console.log(data);
                                  $('#badge-count-tasks').html(data.length);
                              }
                          }, "json" );
                      }, 3000);


                  }
                  else if(msg.repeat != false) {
                      $('#check_repeat_task_pr').fadeIn('slow').css('display', 'block');
                  }
                  else {
                      $('#save_task_pr_modal').css('display', 'none');
//                      $('#save_error_task_pr_modal').fadeIn('slow').css('display', 'block');
                  }
              }
          });
      });
  });
</script>
