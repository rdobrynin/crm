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


      /**
       * Add project
       *
      **/

      $("#addproject_btn").click(function () {
          $('#addproject_modal').modal('hide');
          $('#demo_modal').modal('show');
          return false;
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
          $('#addproject_modal').modal('hide');
          $('#demo_modal').modal('show');
          return false;
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
                      $('#avatar-true').hide();
                      $('#avatar-true-ajax').show();
                      $('.avatar-img').hide();
                      $('.avatar-img-ajax').show();
                      $('.avatar-img-ajax').html("<a href='<?php print base_url(); ?>profile'><img src='<?php print base_url(); ?>uploads/avatar/"+data.new_avatar+"' alt='avatar' height='45'></a>");
                      $('#ajax-temp').html("<img src='<?php print base_url(); ?>"+'uploads/avatar/'+data.new_avatar+"' alt='Smiley face' height='100'>");
                  }
                  $('#files').show();
                  $('#files').empty();
                  $('#files').html('<p class="lead">'+data.msg+'</p>');
                  $('#files').delay(1500).fadeOut();
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

$('#status-online-'+id).removeClass('grey').addClass('green');


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
                    $('#status-online-'+id).removeClass('green').addClass('grey');
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
                  if (msg.empty == true) {
                      $('#check_empty_task_pr').fadeIn('slow').css('display', 'block');
                  }
                  else {
                      $('#check_empty_task_pr').fadeIn('slow').css('display', 'none');
                  }
                  if(msg.result == true) {
                      $('#save_task_pr_modal').fadeIn('slow').css('display', 'block');
                      setTimeout(function() {
                          $('#save_task_pr_modal,#save_error_task_pr_modal').css('display', 'none');
                          $("input[type=text], textarea").val("");
                          $('#addtask_pr_modal').modal('hide');
                      }, 2000);


                      setInterval(function(){
                          $.get( "<?php echo site_url('ajax/countTasks'); ?>", function( data ) {
                              if(data.length >0) {
                                  $('#badge-count-tasks').html(data.length);


                              }
                          }, "json" );
                      }, 3000);


                  }
                  else {
                      $('#save_task_pr_modal').css('display', 'none');
//                      $('#save_error_task_pr_modal').fadeIn('slow').css('display', 'block');
                  }
              }
          });
      });

      $("#save_helpblock").click(function(event) {
          var check =false;
          if ($('#help_block').is(":checked")){
              check = 1;
              $(this).html('Hide panel');
          }
          else {
              check = 0;
              $(this).html('Show panel');
          }
          var form_data = {
              help_block :check,
              user_id :$('#user_id_help').val()
          };
          $.ajax({
              url: "<?php echo site_url('ajax/switchHelp'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  console.log(msg);

              }
          });
      });

      $('#qm-clear-form-btn').click(function () {
          $("#qm-text, #qm-subject-field").val("");
      });


//      Autocomplete names
      names = <?php print json_encode($users_names);?>;
      var full_names = [];
      var full_names_id = [];
      $.each( names, function( index, value ){
          full_names.push( value );
          full_names_id.push( index );

      });


      $('#qm-autocomplete').autocomplete(full_names,{
          autoFill: true,
          selectFirst: true,
          width: '240px'
      });



  });

  /**
   *  Quick comment add function()
   */

  function qmSendComment($data){
      $('.qm-body').hide();
      $('.qm-body').show();
      $('.point-name-tag').show();
      $user = '<?php print($user[0]['id'])?>';
      var form_data = {
          id: $data
      };
      $.ajax({
          url: "<?php echo site_url('ajax/getUserbyId'); ?>",
          type: 'POST',
          data: form_data,
          dataType: 'json',
          success: function (msg) {
              $first_name = msg.user[0]['first_name'];
              $last_name = msg.user[0]['last_name'];
              $currentID = msg.user[0]['id'];
              $email  = msg.user[0]['email'];
              $avatar  = msg.user[0]['avatar'];
              $('#qm-autocomplete').hide();
              $('#qm-point-name').html($first_name+ ' '+$last_name);
              $('#user_qm_id').val($currentID);
          }
      });

      /**
       * Send quick comment
       */

      $('#qm-send-btn').click(function () {
          $to = $('#user_qm_id').val();
          $uid = $user;
          $subject = $('#qm-subject-field').val();
          $text = $('#qm-text').val();
          $search =false;

          var form_data_ = {
              uid: $uid,
              subject: $subject,
              text: $text,
              to: $to,
              search:$search
          };
          $.ajax({
              url: "<?php echo site_url('ajax/sendComment'); ?>",
              type: 'POST',
              data: form_data_,
              dataType: 'json',
              success: function (msg) {
                  console.log(msg);
                 if(msg.empty == true) {
                  $('#qm-empty-error').fadeIn('slow').css('display','block');
                     setTimeout(function () {
                         $('#qm-empty-error').fadeOut('slow').css('display','none');
                     },3000);
                 }
                  else {
                     $('#qm-result-info').fadeIn('slow').css('display','block');
                     setTimeout(function () {
                         $('#qm-result-info').fadeOut('slow').css('display','none');
                         $('.qm-body').css('display','none');
                     },2000);
                     $("#qm-text, #qm-subject-field").val("");
                 }
              }
          });
      });
  }


  function SendComment($data){
      $('.qm-body').hide();
      $('.qm-body').show();
      $user = '<?php print($user[0]['id'])?>';
      var form_data = {
          id: $data
      };
      $.ajax({
          url: "<?php echo site_url('ajax/getUserbyId'); ?>",
          type: 'POST',
          data: form_data,
          dataType: 'json',
          success: function (msg) {
              console.log(msg);
              $first_name = msg.user[0]['first_name'];
              $last_name = msg.user[0]['last_name'];
              $currentID = msg.user[0]['id'];
              $email  = msg.user[0]['email'];
              $avatar  = msg.user[0]['avatar'];

              $('.point-name-tag').css('display','none');
              $('#user_qm_id').val($currentID);
          }
      });

      /**
       * Send quick comment
       */

      $('#qm-send-btn').click(function () {
          $search =true;
          $fullname = $('#qm-autocomplete').val();
          $to = $('#user_qm_id').val();
          $uid = $user;
          $subject = $('#qm-subject-field').val();
          $text = $('#qm-text').val();

          var form_data_ = {
              uid: $uid,
              subject: $subject,
              text: $text,
              to: $to,
              fullname: $fullname,
              search: $search
          };
          $.ajax({
              url: "<?php echo site_url('ajax/sendComment'); ?>",
              type: 'POST',
              data: form_data_,
              dataType: 'json',
              success: function (msg) {
                  console.log(msg);
                  if(msg.empty == true) {
                      $('#qm-empty-error').fadeIn('slow').css('display','block');
                      setTimeout(function () {
                          $('#qm-empty-error').fadeOut('slow').css('display','none');
                      },3000);
                  }
                  else {
                      $('#li-comments').removeClass('active');
                      $('#qm-result-info').fadeIn('slow').css('display','block');
                      setTimeout(function () {
                          $('#qm-result-info').fadeOut('slow').css('display','none');
                          $('.qm-body').css('display','none');
                      },2000);
                      $("#qm-text, #qm-subject-field").val("");
                  }
              }
          });
      });


  }

  /**
   * Ajax approve view task
   * @param $data
   */

  function taskToView($data){
      var form_data_ = {
          tid: $data
      };
      $.ajax({
          url: "<?php echo site_url('ajax/getTask'); ?>",
          type: 'POST',
          data: form_data_,
          dataType: 'json',
          success: function (msg) {
              if(msg != 'false') {
                  colorPriority = 'color:#f89406;';
                  if (msg['task'].priority == '0') {
                      colorPriority = 'color:#428bca;';
                  }
                  else if (msg['task'].priority == '1') {
                      colorPriority = 'color:#f89406;';

                  }
                  else {
                      colorPriority = 'color:#d9534f;';
                  }
                  $('.task-view-wrapper').css('display','block');
                  $('.tasks-view').css('display','block');

                  $('.task-view-header').html('<span class="pull-left">'+msg['task'].title+' ('+msg['project'][0]['title']+')'+'</span><span class="pull-right"><i class="fa fa-circle circle-priority-view" style="'+colorPriority+'"></i></span>');


                  if(msg['task'].status == '6') {
                      $('.task-view-header').html('<span class="pull-left">'+msg['task'].title+' ('+msg['project'][0]['title']+')'+'</<span>&nbsp;&nbsp;<span class="label label-danger label-xs">Overdue</span></span><span class="pull-right"><i class="fa fa-circle circle-priority-view" style="'+colorPriority+'"></i></span>');
                  }


                  $('.task-view-content').html('<p><strong>Created: </strong>'+msg['task'].date_created+'</p>'+
                      '<p><strong>Due to: </strong><span style="color:red;">'+msg['task'].due_time+'</span></p>'+
                      '<p><strong>Implementor: </strong>'+msg['implementor']+' | <strong>Curator: </strong>'+msg['curator']+'</p>'+
                      '<p><strong>Description: </strong>'+msg['task'].desc+'</p>');
              }

              }

      });
  }

  function taskToHide(){
      $('.task-view-wrapper').css('display','none');
      $('.tasks-view').css('display','none');
  }



  $('[data-toggle=confirmation-delete-current-task]').confirmation(
      {
          placement: 'left',
          animation: false,
          btnOkClass:'btn-xs',
          btnCancelClass:'btn-xs',
          btnCancelLabel:'<i class="fa fa-times-circle" style="margin-right: 0;"></i> No',
          btnOkLabel:'<i class="fa fa-check-circle-o" style="margin-right: 0;"></i> Ok',
          onConfirm: function () {
              var currentTask = $(this).attr('target');
              var uid = '<?php print($user[0]['id'])?>';
              var form_data = {
                  id: currentTask,
                   uid: uid
              };
              $.ajax({
                  url: "<?php echo site_url('ajax/deleteTask'); ?>",
                  type: 'POST',
                  data: form_data,
                  dataType: 'json',
                  success: function (msg) {
                      console.log(msg);
                      $('#tr-dashboard-task-'+currentTask).remove();
                      var rowCount = $('#approve_tasks_table tr').length;
                      if(rowCount <1) {
                          $('#table-new-users').hide();

                          $('#calc-appr-tasks').css('display','none');
                      }
                      $('#calc-appr-tasks').html(rowCount);
//
                      $('[data-toggle=confirmation-delete-current-task]').confirmation('hide');

                  }
              });

              return false;
          },
          onCancel: function () {
              $('[data-toggle=confirmation-delete-current-task]').confirmation('hide');
              return false;
          }
      }
  );
  unical_id = <?php print json_encode($user[0]['id']);?>;

  function impControl($data, $action) {


      var form_data = {
          id: $data,
          status: $action,
          uid: unical_id
      };
      $.ajax({
          url: "<?php echo site_url('ajax/updateTask'); ?>",
          type: 'POST',
          data: form_data,
          dataType: 'json',
          success: function (msg) {
             if(msg==true) {
                 $('#ready-task-'+$data).remove();
                     $.ajax({
                         url: "<?php echo site_url('ajax/countReadyTasks'); ?>",
                         type: 'GET',
                         dataType: 'json',
                         success: function (msg) {
                             if (msg < 1) {
                                 $('#ready-task-table').css('display','none');
                             }
                         }
                     });

             }


          }
      });






  }


</script>
