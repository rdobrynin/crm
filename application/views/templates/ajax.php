<script>
  $(function () {

//      check if task exists and overdue
      tasks = <?php print json_encode($tasks);?>;

      $.each(tasks, function(index, value){
         if(value['status'] !='3') {
             var data_time = toTimestamp(value['due_time']);
             var dt = new Date().getTime();
             var n = dt.toString();
             var new_time = n.slice(0, -3);
             if (data_time < new_time) {

                    var form_data = {
                        id: value['id']
                    };
                    $.ajax({
                        url: "<?php echo site_url('ajax/updateTaskOverdue'); ?>",
                        type: 'POST',
                        data: form_data,
                        dataType: 'json',
                        success: function (msg) {
                        }
                    });
             }
         }
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
       *
       * Sidebar left ON/OFF
       */



      $("#switch-left-bar").click(function () {

          var $user = '<?php print($user[0]['id'])?>';
          var form_data = {
              uid: $user,
              status: '1'

          };
          $.ajax({
              url: "<?php echo site_url('ajax/updateSidebarLeft'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  var posVar = 50;
                  $("#sidebar-wrapper").animate({width: posVar + 'px'});
                  $("#wrapper").animate({paddingLeft: posVar + 'px'});
                  $("#switch-left-bar").css('display','none');
                  $('.badge-resp').addClass('badge-resp-mini');
                  $('#switch-left-bar-back').fadeIn('slow');
                  $('.badge-mini').fadeIn('slow');
              }
          });
      });


      /**
       *
       * Sidebar left ON/OFF
       */

      $("#switch-left-bar-back").click(function () {
          var $user = '<?php print($user[0]['id'])?>';
          var form_data = {
              uid: $user,
              status: '0'

          };
          $.ajax({
              url: "<?php echo site_url('ajax/updateSidebarLeft'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  var posVar = 198;
                  $("#sidebar-wrapper").animate({width: posVar + 'px'});
                  $("#wrapper").animate({paddingLeft: posVar + 'px'});
                  $("#switch-left-bar-back").css('display','none');
                  $('.badge-resp').removeClass('badge-resp-mini');
                  $('.badge-mini').css('display','none');
                  $('#switch-left-bar').fadeIn('slow');
              }
          });


      });


      /**
       *
       * Sidebar right ON/OFF
       */

      $("#float-users").click(function () {
          var $user = '<?php print($user[0]['id'])?>';
          var form_data = {
              uid: $user,
              status: '1'

          };
          $.ajax({
              url: "<?php echo site_url('ajax/updateSidebarRight'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  var posVar = 0;
                  $(".right-float-sidebar").animate({right: posVar + 'px'});

              }
          });

      });


      /**
       *
       * Sidebar right ON/OFF
       */

      $(".close-right-sidebar").click(function () {

          var $user = '<?php print($user[0]['id'])?>';
          var form_data = {
              uid: $user,
              status: '0'

          };
          $.ajax({
              url: "<?php echo site_url('ajax/updateSidebarRight'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  var posVar = -300;
                  $(".right-float-sidebar").animate({right: posVar + 'px'});
                  $("#float-users").removeClass('active');

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
                      $('#badge-count-projects,#badge-count-mini-projects').html(data);
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


          var myString = $.trim($('#choose_project_modal').text().toUpperCase());
          var newABB = myString.substr(0, myString.length-3);
          var form_data = {
              title :$('#task_pr_title').val(),
              desc :$('#task_pr_desc').val(),
              project :$('#choose_project_modal').val(),
              dueto :$('#dueto_modal').val(),
              label :$('#task_type_choose').val(),
              priority :$('#task_priority_choose').val(),
              implementor :$('#implementor_choose_modal').val(),
              owner :$('#user_added_task_pr_id').val(),
              key: newABB
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
//                          todo





                          var idtr =  'tr-dashboard-task-'+msg["id"];
                          $("#approve-task-table").find('tbody:first')
                              .prepend("<tr id='"+idtr+"'><td class='text-left'>#"+msg['newtask']['id']+"</td><td class='text-left'><span style='color:#5cb85c;'>created now</span></td>+" +
                                  "<td class='text-left'><span class='label label-xs "+getLabelTask(msg['newtask']['label'])+" '>"+msg['text_label']['title']+"</span></td>+"+
                                  "<td class='text-left'><a href='#' class='hover-td-name' onClick='qmSendComment("+msg['newtask']['implementor']+")'>"+msg['imp_name']+"</a></td>" +
                                  "<td class='text-left'><a href='#' class='hover-td-name' onClick='qmSendComment("+msg['newtask']['uid']+")'>"+msg['cur_name']+"</a></td>" +
                                  "<td class='text-left'>"+msg['newtask']['title']+"</td>+" +
                                  "<td class='text-left'>"+msg['newtask']['pid']+"</td>+"+
                                  "<td class='text-left'>"+msg['newtask']['desc']+"</td>+"+
                                  "<td class='text-left'><span><i class='fa fa-circle circle-priority' style="+getPriorityTaskClass(msg['newtask']['priority'])+"></i></span> "+getPriorityTask(msg['newtask']['priority'])+"</td>+"+
                                  "<td class='text-left'>"+msg['newtask']['due_time']+"</td>+"+
                                  "<td class='text-left'> <a href='#' onClick='taskToReady("+msg['newtask']['id']+")' style='text-decoration: none;'><i class='fa fa-play'></i></a><a href='#'"+
                                  "onClick='taskToEdit"+msg['newtask']['id']+")'style='text-decoration: none;'><i class='fa fa-pencil'></i></a><a href='#' onMouseDown='taskToView("+msg['newtask']['id']+")'"+
                                  "onMouseOut='taskToHide()' style='text-decoration: none;'><i class='fa fa-eye'></i></a>"+
                                  "<a href='#' data-toggle='confirmation-delete-current-task' data-singleton='true' data-target='"+msg['newtask']['id']+"' style='text-decoration: none;cursor: pointer;'>"+
                                  "<span class='icon-remove'></span></a></td></tr>");





                          idtr =  'tr-task-task-'+msg["id"];
                          $("#common-tasks-table").find('tbody:first')
                              .prepend("<tr id='"+idtr+"'><td class='text-left'>#"+msg['newtask']['id']+"</td><td class='text-left'><span style='color:#5cb85c;'>created now</span></td>+" +
                                  "<td class='text-left'>"+msg['newtask']['label']+"</td>+"+
                                  "<td class='text-left'><a href='#' class='hover-td-name' onClick='qmSendComment("+msg['newtask']['implementor']+")'>"+msg['imp_name']+"</a></td>" +
                                  "<td class='text-left'><a href='#' class='hover-td-name' onClick='qmSendComment("+msg['newtask']['uid']+")'>"+msg['cur_name']+"</a></td>" +
                                  "<td class='text-left'>"+msg['newtask']['title']+"</td>+" +
                                  "<td class='text-left'>"+msg['newtask']['pid']+"</td>+"+
                                  "<td class='text-left'>"+msg['newtask']['desc']+"</td>+"+
                                  "<td class='text-left'>"+msg['newtask']['status']+"</td>+"+
                                  "<td class='text-left'><span><i class='fa fa-circle circle-priority' style="+getPriorityTaskClass(msg['newtask']['priority'])+"></i></span> "+getPriorityTask(msg['newtask']['priority'])+"</td>+"+
                                  "<td class='text-left'>-"+
                                  "<td class='text-left'>"+msg['newtask']['due_time']+"</td>+"+
                                  "<td class='text-left'> <a href='#' onClick='taskToReady("+msg['newtask']['id']+")' style='text-decoration: none;'><i class='fa fa-play'></i></a><a href='#'"+
                                  "onClick='taskToEdit"+msg['newtask']['id']+")'style='text-decoration: none;'><i class='fa fa-pencil'></i></a><a href='#' onMouseDown='taskToView("+msg['newtask']['id']+")'"+
                                  "onMouseOut='taskToHide()' style='text-decoration: none;'><i class='fa fa-eye'></i></a>"+
                                  "<a href='#' data-toggle='confirmation-delete-current-task' data-singleton='true' data-target='"+msg['newtask']['id']+"' style='text-decoration: none;cursor: pointer;'>"+
                                  "<span class='icon-remove'></span></a></td></tr>");

                      }, 2000);


                      setInterval(function(){
                          $.get( "<?php echo site_url('ajax/countTasks'); ?>", function( data ) {
                              if(data.length >0) {
                                  $('#badge-count-tasks,#badge-count-mini-tasks').html(data.length);


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

      $(".toggle-div-help").click(function(event) {
          var check =false;
          if ($('#toggle-help-btn').is(":checked")){
              check = 0;
          }
          else {
              check = 1;
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
              }
          });
      });


      $(".toggle-div-dialog").click(function(event) {
          var check =false;
          if ($('#toggle-dialog-btn').is(":checked")){
              check = 1;
          }
          else {
              check = 0;
          }
          var form_data = {
              introduce :check,
              user_id :$('#user_id_dialog').val()
          };
          $.ajax({
              url: "<?php echo site_url('ajax/settingsDialog'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
              }
          });
      });



      $(".toggle-div-message").click(function(event) {
          var check =false;
          if ($('#toggle-message-btn').is(":checked")){
              check = 0;
          }
          else {
              check = 1;
          }
          var form_data = {
              check :check,
              id :$('#user_id_message').val()
          };
          $.ajax({
              url: "<?php echo site_url('ajax/messageToEmail'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
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
      $('#li-comments').removeClass('active');
      $('#qm-autocomplete').hide();
      $('.point-name-tag').hide();
      $('#qm-point-name').show();

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
              search:$search,
              fullname: $first_name + ' ' + $last_name
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


/**
 * Subject Send
 **/

  function qmSubjectSendComment($title, $data){
      $('.qm-body').hide();
      $('.qm-body').show();
      $('#li-comments').removeClass('active');
      $('#qm-autocomplete').hide();
      $('.point-name-tag').hide();
      $('#qm-point-name').show();
      $('#qm-subject-field').val($title);

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
          $subject = $title;
          $text = $('#qm-text').val();
          $search =false;

          var form_data_ = {
              uid: $uid,
              subject: $subject,
              text: $text,
              to: $to,
              search:$search,
              fullname: $first_name + ' ' + $last_name
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


  /**
   *
   * Task to edit
   **/

  function taskToEdit($data){
      $('#edit-task-modal').show();
          $user = '<?php print($user[0]['id'])?>';
          var form_data = {
              id: $data
          };
          $.ajax({
              url: "<?php echo site_url('ajax/taskToEdit'); ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function (msg) {
                  console.log(msg.result['due_time'][0]);
                  var year = msg.result['due_time'][0]+msg.result['due_time'][1]+msg.result['due_time'][2]+msg.result['due_time'][3];
                  var month = msg.result['due_time'][5]+msg.result['due_time'][6];
                  var day = msg.result['due_time'][8]+msg.result['due_time'][9];
                  var hour = msg.result['due_time'][11]+msg.result['due_time'][12];
                  var min = msg.result['due_time'][14]+msg.result['due_time'][15];
                  var date = day + '.'+month +'.'+year+'-'+hour+':'+min;
                  $('#edit_task_pr_title').val(msg.result['title']);
                  $('#edit_task_pr_desc').val(msg.result['desc']);
                  $('#edit_dueto_modal').val(msg.result['due_time']);
                  $('#edit_dueto_modal').datetimepicker({
                      theme: 'dark',
                      value:date,
                      format:'d.m.Y-H:i'
                  });
//                  $('#edit_task_type_choose').html('<option>city1</option><option>city2</option>')
//                      .selectpicker('refresh');

                  $('#edittask_pr_btn').click(function () {
                      console.log($('#edit_dueto_modal').val());
                      var form_data = {
                          title :$('#edit_task_pr_title').val(),
                          desc :$('#edit_task_pr_desc').val(),
                          project :msg.result['pid'],
                          key :msg.result['key'],
                          dueto :$('#edit_dueto_modal').val(),
                          label :$('#edit_task_type_choose').val(),
                          priority :$('#edit_task_priority_choose').val(),
                          implementor :$('#edit_implementor_choose_modal').val(),
                          owner :$('#edit_curator_choose_modal').val(),
                          id: $data
                      };
                      $.ajax({
                          url: "<?php echo site_url('ajax/updateEditTask'); ?>",
                          type: 'POST',
                          data: form_data,
                          dataType: 'json',
                          success: function (msg) {
                              if (msg.empty == true) {
                                  $('#check_empty_edit_task_pr').fadeIn('slow').css('display', 'block');
                              }
                              else {
                                  $('#check_empty_edit_task_pr').fadeIn('slow').css('display', 'none');
                              }
                              if(msg.result == true) {
                                  $('#edit_task_pr_modal').css('display','block');
                                  $({blurRadius: 0}).animate({blurRadius: 1}, {
                                      duration: 500,
                                      easing: 'swing', // or "linear"
                                      // use jQuery UI or Easing plugin for more options
                                      step: function() {
                                          $('#tr-dashboard-task-'+$data).css({
                                              "-webkit-filter": "blur("+this.blurRadius+"px)",
                                              "filter": "blur("+this.blurRadius+"px)"
                                          });
                                      }
                                  });
                                  setTimeout(function() {
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').html('#'+$data);
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').html('<span style="color:#5cb85c;">updated now</span>');
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').html('<span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span>');
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').html('<a href="#;" class="hover-td-name" onClick="qmSendComment(<?php print($tv["implementor"]); ?>)"><?php print(short_name($user_name[$tv["implementor"]])); ?></a>');
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').next('td').html('<a href="#;" class="hover-td-name" onClick="qmSendComment(<?php print($tv["uid"]); ?>)"><?php print(short_name($user_name[$tv["uid"]])); ?></a>');
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').next('td').next('td').html(msg['title']);
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').html(msg['project']);
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html(msg['desc']);
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html('<span><i class="fa fa-circle circle-priority" style="<?php if ($tv["priority"] ==0): ?> color:#428bca;<?php endif ?><?php if ($tv["priority"] ==1): ?> color:#f89406;<?php endif ?><?php if ($tv["priority"] ==2): ?> color:#d9534f;<?php endif ?>"></i></span><?php echo priority_status_index($tv["priority"]) ?>');
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html(msg['dueto']);
                                      $('#approve_tasks_table').find('#tr-dashboard-task-'+$data).find('td:first').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').html('<a href="#;" onClick="taskToReady(<?php print($tv["id"]); ?>)" style="text-decoration: none;"><i class="fa fa-play"></i></a><a href="#;" onClick="taskToEdit(<?php print($tv["id"]); ?>)" style="text-decoration: none;"><i class="fa fa-pencil"></i></a><a href="#;" onMouseDown="taskToView(<?php print($tv["id"]); ?>)" onMouseOut="taskToHide()" style="text-decoration: none;"><i class="fa fa-eye"></i></a><a href="#;" data-toggle="confirmation-delete-current-task" data-singleton="true" data-target="<?php print($tv["id"]); ?>" style="text-decoration: none;cursor: pointer;"><span class="icon-remove"></span></a>');
                                      blurRadius = 0;
                                      $('#edit-task-modal').hide();
                                      $('#tr-dashboard-task-'+$data).css({
                                          "-webkit-filter": "blur("+this.blurRadius+"px)",
                                          "filter": "blur("+this.blurRadius+"px)"
                                      });
                                  }, 2000);

                              }
                              else {
                                  $('#edit_error_task_pr_modal').css('display','block');
                              }
                          }
                      });
                  });

              }
          });


      $('#close-edit-task-modal,#close-button-edit-task-modal').click(function () {
          $('#edit-task-modal').hide();
      });
  }



/**
 * Send Comment
 * */

  function SendComment($data){
      $('.qm-body').hide();
      $('.qm-body').show();
    $('#qm-point-name').hide();
    $('#qm-autocomplete').show();
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

              $('.point-name-tag').css('display','none');
              $('#user_qm_id').val($currentID);
          }
      });

      /**
       * Send quick comment
       */

      $('#qm-send-btn').click(function () {
          $search =false;
//          if send messagi with autocomplete
          var name = $("#qm-autocomplete").val();
          if (name.length > 0){
              $search =true;
              console.log('test');
          }

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


  function updateUser($data) {
      $('#update-user-modal').modal('show');
      $('#update-user-send-btn').click(function () {
          $role = $('#update-role-user-select').val();
          var form_data_ = {
              id: $data,
              role: $role
          };
          $.ajax({
              url: "<?php echo site_url('ajax/updateUser'); ?>",
              type: 'POST',
              data: form_data_,
              dataType: 'json',
              success: function (msg) {
                  if (msg['user'] == true) {
                      $('#update-user-notificate').fadeIn('slow').show();
                      setTimeout(function () {
                          $('#update-user-modal').modal('hide');
                          $('#update-user-notificate').hide();
                      }, 2000);
                  }

              }
          });
      });
  }

  /**
 * TaskToReady
 **/

  function taskToReady($data){
      $editor = '<?php print($user[0]['id'])?>';
      var form_data = {
          id: $data,
          uid:$editor,
          status: '5'
      };
      $.ajax({
          url: "<?php echo site_url('ajax/updateTask'); ?>",
          type: 'POST',
          data: form_data,
          dataType: 'json',
          success: function (msg) {
              $('#tr-dashboard-task-'+$data).remove();
          }
      });
  }


  /**
   * Task to Process
   **/

  function taskToProcess($data){
      $editor = '<?php print($user[0]['id'])?>';
      var form_data = {
          id: $data,
          uid:$editor
      };
      $.ajax({
          url: "<?php echo site_url('ajax/updateTaskProcess'); ?>",
          type: 'POST',
          data: form_data,
          dataType: 'json',
          success: function (msg) {
          }
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
                      $('#tr-dashboard-task-'+currentTask).remove();
                      $('#tr-project-task-'+currentTask).remove();
                      $('#tr-task-task-'+currentTask).remove();
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
      $('#task_modal_timer').modal({show:true});
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


  function impControlComplete($data, $tts) {
    var min =   $tts.split(/\s+/);
      var form_data = {
          id: $data,
          status: 3,
          tts: min[0],
          uid: unical_id
      };
      $.ajax({
          url: "<?php echo site_url('ajax/completeTask'); ?>",
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
