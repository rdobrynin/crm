<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Ajax extends CI_Controller {

    public function __construct() {
        session_start();
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('dashboard_model');
        $this->load->model('project_model');
        $this->load->model('task_model');
        $this->load->model('files_model');
        $this->load->model('message_model');
    }
  /**
   * Check client on input blur
   */
  public function check_client() {
    $title = $this->input->post('title');
    $check_title= $this->admin_model->verify_client($title);
    $result = array();
    if($title === $check_title[0]['title']){
      $result['result'] ='"'.$title.'"'. ' is already registered';
    }
    else {
      $result['result'] = null;
    }

    echo json_encode($result);

  }


    public function getUserNames() {
        $result['users_names']= $this->admin_model->get_users_names();
        echo json_encode($result);

    }


    /**
     * Check login avatar
     */
    public function check_login_avatar() {
        $email = $_POST['email'];
        $check_email= $this->admin_model->check_email($email);
        $getuser= $this->admin_model->get_user($email);
        $id =  $getuser[0]['id'];
        $avatar= $this->files_model->search_avatar($id);
        $result = array();
        if($email !== $check_email[0]['email']){
            $result['result'] = FALSE;
            $result['avatar'] = $avatar[0]['filename'];
        }
        else {
            $result['result'] =TRUE;
            $result['id'] = $id;
            $result['avatar'] = $avatar[0]['filename'];
        }

        echo json_encode($result);
    }


    /**
     * Check emails
     */
    public function check_emails() {
        $result['result'] = TRUE;
        $email = $_POST['email'];
        $query= $this->admin_model->emails_users($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
             $result['result'] = 'This email already registered';
            }
        }
        $query= $this->admin_model->emails_client($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['result'] = 'This email already registered';
            }
        }
        $query= $this->admin_model->emails_new($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['result'] = 'This email already registered';
            }
        }

        $query= $this->admin_model->emails_added($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['result'] = 'This email already registered';
            }
        }
        echo json_encode($result);
    }


    /**
   * Success modal
   */

  public function success() {
    $result =  $_POST['result'];
    $url = base_url();
    $status = array("URL"=>$url, "RESULT"=>$result);
    echo json_encode ($status) ;
  }

  /**
   * Check online status
   */

  public function check_online() {

    $query = $this->db->get('users');
   $result= $query->result_array();

    if($result){
      $status=array();
      foreach($result as $ok=>$ov) {
        array_push($status, $ov);
      }
      $status['status'] =$status;
    }else{
      $status['result'] = FALSE;
    }
    echo json_encode ($status);
  }

    /**
     * Add client
     */

    public function addclient() {
    $result = array();
    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'Company title', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone number', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('city', 'City', 'trim|required');
    $this->form_validation->set_rules('country', 'Country', 'trim|required');
    if ($this->form_validation->run() !== false) {
      $query = $this->admin_model->create_client();
      if ($query){  //&& any other condition
        $result['title'] = $_POST['title'];
        $result['email'] = $_POST['email'];
        $result['description'] = $_POST['description'];
        $result['url'] = $_POST['url'];
        $result['phone'] = $_POST['phone'];
        $result['title'] = $_POST['address'];
        $result['index'] = $_POST['index'];
        $result['city'] = $_POST['city'];
        $result['country'] = $_POST['country'];
        $result['curator'] = $_POST['curator'];
        $result['error'] = 0;
        $result['result'] = "<ul><li> Company ".$_POST['title']."</li><li> Email ".$_POST['email']."</li><li> Description ".substr($_POST['description'],1,50)."</li><li> URL ".$_POST['url']."</li><li> Phone ".$_POST['phone']."</li><li> Address ".$_POST['address']."</li><li> Index ".$_POST['index']."</li><li> City ".$_POST['city']."</li><li>Country ".$_POST['country']."</li></ul><div>Was successfully created</div>";
      }
      else {
        $result['error'] = 1;
        $result['result'] = 'Error in Database';
      }
    }
    else {
      $result['error'] = 1;
      $result['result'] = validation_errors();
    }
    echo json_encode($result); //At the end of the function.
  }

    /**
     * Upload avatar
     */

    function do_upload() {
        $status = "";
        $msg = "";
        $del = "";
        $new_avatar = "";
        $file_element_name = 'userfile';
        if (empty($_POST['user_id'])) {
            $status = "error";
            $msg = "Something wrong...";
        }

        if ($status != "error") {
            $config['upload_path'] = './uploads/avatar';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024 * .5;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else {
                $data = $this->upload->data();
//                search avatar if not found we insert new one
                $search = $this->files_model->search_avatar($_POST['user_id']);

                if(!empty($search)) {
                    $old_file =   './uploads/avatar/'.$search[0]['filename'];
                    if(unlink($old_file)) {
                        $del= 'ok';
                    }
                    else {
                        $del= 'no';
                    }
                    $file_id = $this->files_model->update_avatar($data['file_name'], $_POST['user_id']);
                    $this->files_model->update_avatar_user($data['file_name'], $_POST['user_id']);
                    $search_new = $this->files_model->search_avatar($_POST['user_id']);
                    $new_avatar = $search_new[0]['filename'];
                }
                else {
                    $file_id = $this->files_model->insert_avatar($data['file_name'], $_POST['user_id']);
                    $this->files_model->update_avatar_user($data['file_name'], $_POST['user_id']);
                    $search_new = $this->files_model->search_avatar($_POST['user_id']);
                    $new_avatar = $search_new[0]['filename'];
                }

                if($file_id) {

                    $status = $search[0]['filename'];
                    $msg = "File successfully uploaded";
                }
                else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg,  'delete' => $del, 'new_avatar' => $new_avatar));
    }


    /**
     * INVITATION NEW PERSON
     */
    function invitation() {
        $url = base_url();
        $result['email'] = true;
        $result['check_email'] = true;
        $result['empty'] = true;
        $result['send'] = false;
        $email = trim($_POST['email']);
        $fname = trim($_POST['first_name']);
        $lname = trim($_POST['last_name']);
        $role = $_POST['role'];
        $user_id = $_POST['user_id'];
        $user_array = $this->admin_model->get_user_id($user_id);
//        get curator data
        $curator_fname = $user_array->first_name;
        $curator_lname = $user_array->last_name;
        $curator_name = $curator_fname. ' '.$curator_lname;
        $curator_email = $user_array->email;
        $query= $this->admin_model->emails_users($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }
        $query= $this->admin_model->emails_client($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }
        $query= $this->admin_model->emails_new($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }

        $query= $this->admin_model->emails_added($email);
        foreach($query as $v) {
            if($v['email'] == $email) {
                $result['email'] = false;
            }
        }

        if($email == '' OR $fname == '' OR $lname == '') {
            $result['empty'] = false;
        }
        else {
            $result['empty'] = true;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result['check_email'] = false;
        }
        else {
            $result['check_email'] = true;
        }

        // mail to user
        // Generate password
        $letter = 'qwertyuipasdfghjklzxcvbnm';
        $letter .= strtoupper($letter);
        $letter .= '123456789';
        $pass = '';
        for ($i = 0; $i < 6; $i++){
            $pass .= $letter[mt_rand(0, strlen($letter)-1)];
        }
        if ($result['email'] == true AND $result['empty'] == true AND $result['check_email'] == true ) {
            if ($query = $this->admin_model->insert_user($fname,$lname,$role,$email,$pass)) {
                $projects_array = $this->project_model->get_projects();
                $last_user = $this->admin_model->getLastUser();
                foreach($projects_array as $pk=>$pv) {
                    $this->project_model->assign_project($pv['pid'], $last_user, 0);
                }
            $this->load->library('email');
            $this->email->from($curator_email, $curator_name);
            $this->email->to($email);
            $this->email->subject('Invitation from Brilliant project management');
            $this->email->message("Hello, ".$fname." ".$lname."\n"."\n".$curator_name." Invites you to Brilliant Project management"."\n"."\n".
            "Link: ".$url."\n"."\n"."Username: ".$email."\n"."\n"."Password: ".$pass."\n"."\n");
            $this->email->send();
            $result['send'] = true;
            }
        }

        echo json_encode($result);
    }


    /**
     * Add project
     */

    function addproject() {
        $result['empty'] = true;
        $result['send'] = false;
        $result['project'] = true;
        $title = $_POST['project_title'];
        $desc = $_POST['project_desc'];
        $uid = $_POST['user_id'];
        //validate title of project
        $verify_title = $this->project_model->check_project($title);
        $name_array =  $this->admin_model->get_user_id($uid);
        $full_name = $name_array->first_name.' '.$name_array->last_name;
        $result['id']=$uid;
        $result['title']=$title;
        $result['desc']=$desc;
        if ($title == '' OR $desc == '') {
            $result['empty'] = false;
        }
        else if($verify_title != true) {
            $result['project'] = false;
        }
        else {
            $text ='created project';
            $this->project_model->createEvent($uid, $desc, $text, $full_name, $title, 0);
            if ($query = $this->project_model->create_project($title, $desc, $uid)) {
                $result['send'] = true;
                $result['project'] = true;
                $last= $this->project_model->getLastProject();
                $result['lastproject'] = $last->pid;
                $this->project_model->assign_project($last->pid, $uid, 1);
                $users = $this->admin_model->get_users();
                foreach($users as $uk=>$uv) {
                 if($uv['id'] != $uid) {
                     $this->project_model->assign_project($last->pid, $uv['id'], 0);
                 }
                }
            }
        }
        echo json_encode($result);
    }

    /**
     * Get user ID for localStorage
     */

    function getUserId() {
        $result =$this->session->userdata('user_id');
        echo json_encode (array('id'=>$result[0]['id']));
    }

    /**
     * countProjects
     */

    function countProjects() {
        $result = $this->project_model->countProjects();
        echo json_encode ($result);
    }


    /**
     * countTasks
     */

    function countTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $result = $this->task_model->countTasks($session_uid->id);
        echo json_encode ($result);
    }

    function calculateTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $r= $this->task_model->countTasks($session_uid->id);
        $c= $this->task_model->getCompTasks($session_uid->id);
        if($r !=false) {
            $result['tasks'] = count($r);
        }
        else {
            $result['tasks'] = 0;
        }

        if($c !=false) {
            $result['comp_tasks'] = count($c);
        }
        else {
            $result['comp_tasks'] = 0;
        }
        echo json_encode ($result);
    }



    /**
     * Read event
     */
    function readEvent() {
        $result = $this->project_model->readEvent();
        echo json_encode ($result);
    }

    /**
     * Mail form from error page
     */

    function error_mail() {
        $result['empty'] = true;
        $result['send'] = false;
        $result['check_email'] = true;
        $name = $_POST['name'];
        $message = $_POST['message'];
        $email = trim($_POST['email']);
        $phone = $_POST['phone'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result['check_email'] = false;
        }
        else {
            $result['check_email'] = true;
        }
        if($name == '' OR $message == '' OR $phone == '' OR $email == '') {
            $result['empty'] = false;
        }
        else {
            $result['empty'] = true;
        }
        if ($result['empty'] == true AND $result['check_email'] == true) {
            $this->load->library('email');
            $this->email->from($email, $name);
            $this->email->to('roman.dobrynin@gmail.com');
            $this->email->subject('Message from Brilliant project management error page');
            $this->email->message("Hello, ".$name."\n"."\n"."Phone: ".$phone."\n"."\n"."Message: "."\n"."\n".$message."\n"."\n");
            $this->email->send();
            $result['send'] = true;
        }
        echo json_encode($result);
    }

    /**
     * Add project
     */

    function changeTaskType() {
        $result['title'] = $_POST['title'];
        $result['id'] = substr(trim($_POST['id']), 4);
        $check_task = $this->task_model->checkTaskType($result['id']);
        $result['title_change'] = false;
        $result['empty']=false;
        if ($_POST['title'] != '') {
            $result['check'] =$check_task;
                if ($query = $this->task_model->updateTaskType($result['id'], $result['title'])) {
                    $result['result']=$result['title'];
                }
                else {
                    $result['result']=false;
                }
        }
        else {
            $result['empty']=true;
        }
        echo json_encode($result);
    }

    function createTask() {
        $result['title'] = $this->input->post('title');
        $result['desc'] = $this->input->post('desc');
        $result['key'] = $this->input->post('key');
        $result['project'] = $this->input->post('project');
        $result['dueto'] = $this->input->post('dueto');
        $result['label'] = $this->input->post('label');
        $result['priority'] = $this->input->post('priority');
        $result['implementor'] = $this->input->post('implementor');
        $result['owner'] = $this->input->post('owner');
        $result['empty'] = false;
        $name_array =  $this->admin_model->get_user_id($result['owner']);
        $full_name = $name_array->first_name.' '.$name_array->last_name;

        if ($_POST['title'] == '' OR $_POST['desc'] == '' OR $_POST['project'] == '' OR $_POST['label'] == '' OR $_POST['dueto'] == '' OR $_POST['priority'] == '' OR $_POST['implementor'] == '') {
            $result['empty'] = true;
        }
        else {
                $result['empty'] = false;
                $text = 'added task';
            if ($this->task_model->insertTask() == true) {



               $this->project_model->assign_update_project($result['project'],$result['implementor']);





                $result['result'] = true;
                $result['newtask'] = $this->task_model->getLastTask();
                $result['dueto'] = date('jS F Y G:i', $result['newtask']->due_time);
                $project_task = $this->project_model->getProject($result['newtask']->pid);
                $result['project_task'] = $project_task[0]['title'];

                /**
                 * get task label
                 */
                   $result['text_label'] = $this->task_model->checkTaskType($result['label']);
                   $cur_array =  $this->admin_model->get_user_id($result['owner']);
                   $imp_array =  $this->admin_model->get_user_id($result['implementor']);
                   $result['cur_name'] = short_name($cur_array->first_name.' '.$cur_array->last_name);
                   $result['imp_name'] = short_name($imp_array->first_name.' '.$imp_array->last_name);
                $key = $result['key'].'-'.$result['newtask']->id;
                $this->project_model->createEvent($result['owner'], $result['desc'],  $text, $full_name, $result['title'], 1);
            }
                else {
                    $result['result'] = false;
                }
        }
        echo json_encode($result);
    }

    function updateEditTask() {
        $result['title'] = $this->input->post('title');
        $result['desc'] = $this->input->post('desc');
        $result['project'] = $this->input->post('project');
        $result['dueto'] = $this->input->post('dueto');
        $result['key'] = $this->input->post('key');
        $result['label'] = $this->input->post('label');
        $result['priority'] = $this->input->post('priority');
        $result['implementor'] = $this->input->post('implementor');
        $result['owner'] = $this->input->post('owner');
        $result['empty'] = false;
        $name_array =  $this->admin_model->get_user_id($result['owner']);

        $full_name = $name_array->first_name.' '.$name_array->last_name;
        $id = $this->input->post('id');

        $task_types = $this->task_model->getTaskTypes();

        if ($_POST['title'] == '' OR $_POST['desc'] == '' OR $_POST['project'] == '' OR $_POST['label'] == '' OR $_POST['dueto'] == '' OR $_POST['priority'] == '' OR $_POST['implementor'] == '') {
            $result['empty'] = true;
        }
        else {
            $key = $result['key'].'-'.$id;
            $result['empty'] = false;
            $text = 'edited task';
            if ($this->task_model->updateEditTask($id) == true) {

                $this->project_model->assign_update_project($result['project'],$result['implementor']);



                $result['new'] = $this->task_model->getTask($id);
                $user_imp = $this->admin_model->getUsername($result['new']->implementor);
                $user_uid = $this->admin_model->getUsername($result['new']->uid);
                $result['new_label'] = task_type_label($result['new']->label);
                $result['new_label_type'] = $task_types[$result['new']->label];
                $result['new_priority_label'] = priority_status_index($result['new']->priority);
                $result['new_priority'] = $result['new']->priority;
                $result['new_imp_name'] = short_name($user_imp);
                $result['new_uid'] = short_name($user_uid);
                $result['dueto'] = date('jS F Y G:i', $result['new']->due_time);
                $project_task = $this->project_model->getProject($result['new']->pid);
                $result['project_task'] = $project_task[0]['title'];
                $this->project_model->createEvent($result['owner'], $result['desc'],  $text, $full_name, $result['title'], 5);
                $result['result'] = true;
            }
            else {
                $result['result'] = false;
            }
        }
        echo json_encode($result);
    }


    /**
     * switch help block
     */

    function switchHelp() {
        $result['id'] = $this->input->post('user_id');
        $result['help'] = $this->input->post('help_block');
      if(  $this->dashboard_model->settings_help($result['id'], $result['help'])) {
          $result = true;
      }
        else {
            $result = false;
        }
        echo json_encode($result);
    }



    /**
     * switch Dialog modal
     */

    function settingsDialog() {
        $result['id'] = $this->input->post('user_id');
        $result['introduce'] = $this->input->post('introduce');
        if(  $this->dashboard_model->settingsDialog($result['id'], $result['introduce'])) {
            $result = true;
        }
        else {
            $result = false;
        }
        echo json_encode($result);
    }

    /**
     * Get user id
     */
    function getUserbyId() {
        $user =  $user =  $this->input->post('id');
        $result['user']= $this->admin_model->get_user_id_array($user);
        echo json_encode($result);
    }

    /**
     * Get user owner id
     */
    function getOwnbyId() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $user = $session_uid->id;
        $result['user']= $this->admin_model->get_user_id_array($user);
        echo json_encode($result);
    }

    /**
     * Get introduce 1 or 0
     */

    function introduceDialog() {
         $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
         $result = $session_uid->introduce;
         echo json_encode($result);
     }

    /**
     * Update user
     */
    function updateUser() {
        $user =  $this->input->post('id');
        $role =  $this->input->post('role');
        $result['user']= $this->admin_model->updateUser($user,$role);

        if($this->admin_model->updateUser($user,$role)) {
            $result['user'] = true;
        }
        else {
            $result['user'] = false;
        }
        echo json_encode($result);
    }

    /**
     * Send Comment
     */
    function sendComment() {
        $result['to'] =  $this->input->post('to');
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $result['owner'] = $session_uid->id;
        $result['subject']=  $this->input->post('subject');
        $result['text'] =  $this->input->post('text');
        $result['search'] =  $this->input->post('search');
        $result['result'] =  false;
        $result['empty'] =  false;
        $result['fullname'] =  $this->input->post('fullname');
        $fn =  $this->admin_model->getUsername($result['owner']);

        if ($this->input->post('search') == 'false') {
            if ($this->input->post('text') != '' AND $this->input->post('subject') != '') {
                $text = 'added comment';
                $this->project_model->createEvent($result['owner'], $result['text'], $text, $fn, $result['subject'], 2);
                if ($query = $this->message_model->sendComment($result['to'], $result['owner'])) {
                    $result['result'] = true;
                    $user_array = $this->admin_model->get_user_id($result['owner']);
                    $user_to = $this->admin_model->get_user_id($result['to']);
                    if ($user_array->message == '1') {
                        $this->load->library('email');
                        $this->email->from($user_array->email, 'team');
                        $this->email->to($user_to->email);
                        $this->email->subject('New comment from Brilliant Task Management');
                        $this->email->message("Hello, ".$user_to->first_name." ".$user_to->last_name."\n"."\n"."You have new comment"."\n"."\n". "From: ".$user_array->first_name." ".$user_array->last_name."\n"."\n". "Subject: ".$result['subject']."\n"."\n"."Comment: ".$result['text']);
                        $this->email->send();
                        $this->email->clear();
                    }
                }
            }
            else {
                $result['empty'] = true;
            }
        }
        else {

            $fullname = $this->input->post('fullname');
            $result['idUser'] = $this->admin_model->getUserByName($fullname);
            if($this->input->post('text') !='' OR $this->input->post('subject') !='') {
                $text = 'added comment';
                $this->project_model->createEvent($result['owner'], $result['text'],  $text, $fn, $result['subject'], 2);
                if($query = $this->message_model->sendComment($result['idUser'], $result['owner'])) {
                    $result['result'] =  true;
                    $user_array = $this->admin_model->get_user_id($result['owner']);
                    $user_to = $this->admin_model->get_user_id($result['idUser']);
                    if ($user_array->message == '1') {
                        $this->load->library('email');
                        $this->email->from($user_array->email, 'team');
                        $this->email->to($user_to->email);
                        $this->email->subject('New comment from Brilliant Task Management');
                        $this->email->message("Hello, ".$user_to->first_name." ".$user_to->last_name."\n"."\n"."You have new comment"."\n"."\n". "From: ".$user_array->first_name." ".$user_array->last_name."\n"."\n". "Subject: ".$result['subject']."\n"."\n"."Comment: ".$result['text']);
                        $this->email->send();
                    }
                }
            }
            else {
                $result['empty'] =  true;
            }
        }
        echo json_encode($result);
    }


    /**
     * Get user id
     */
    function activateUser() {
        $id =  $this->input->post('user');
        if(!empty($id)) {
            $result['user']= $this->admin_model->activateNewUser($id);
            $projects_array = $this->project_model->get_projects();
            $last_user = $this->admin_model->getLastUser();
            foreach($projects_array as $pk=>$pv) {
                $this->project_model->assign_project($pv['pid'], $last_user, 0);
            }
        }
        else {
            $result['user'] = false;
        }

        echo json_encode($result);
    }



    /**
     * Remove new user by ID
     */
    function deleteNewUser() {
        $id =  $this->input->post('user');

        if(!empty($id)) {
            $result['user']= $this->admin_model->deleteNewUser($id);
        }
        else {
            $result['user'] = false;
        }

        echo json_encode($result);
    }


    /**
     * Remove current user by ID
     */
    function deleteCurrentUser() {
        $id =  $this->input->post('user');

        if(!empty($id)) {
            $result['user']= $this->admin_model->deleteCurrentUser($id);
        }
        else {
            $result['user'] = false;
        }

        echo json_encode($result);
    }

    /**
     * Froze current user by ID
     */
    function frozeCurrentUser() {
        $id =  $this->input->post('user');

        if(!empty($id)) {
            $result['user']= $this->admin_model->frozeCurrentUser($id);
        }
        else {
            $result['user'] = false;
        }

        echo json_encode($result);
    }


    /**
     * Froze current user by ID
     */
    function unfrozeCurrentUser() {
        $id =  $this->input->post('user');

        if(!empty($id)) {
            $result['user']= $this->admin_model->unfrozeCurrentUser($id);
        }
        else {
            $result['user'] = false;
        }

        echo json_encode($result);
    }



    /**
     * Quick search task
     */

    function getTask() {
        $id =  $this->input->get('tid');
        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }
        $data['task'] = $this->task_model->getTask($id);
        $data['task_label'] = $this->task_model->getTaskLabel($data['task']->label);
        $data['project'] = $this->project_model->getProject($data['task']->pid);
        $data['manager'] = $this->admin_model->getUsername($data['task']->uid);
        $data['implementor'] = $this->admin_model->getUsername($data['task']->implementor);
        $this->load->view('templates/ajax/task_view',$data);
    }

    /**
     * Get tasks
     */


    function getTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $result['tasks'] = $this->task_model->getTasks($session_uid->id);
        echo json_encode($result);
    }




    /**
     * Quick delete task
     */

    function deleteTask() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $id =  $this->input->post('id');
        $name_array =  $this->admin_model->get_user_id($uid);
        $full_name = $name_array->first_name.' '.$name_array->last_name;
        $array = $this->task_model->getTask($id);
        $text ='delete task';
        $key =$array->key.'-'.$id;
        if($querty = $this->task_model->deleteTask($id)) {
            $this->project_model->createEvent($array->uid, $array->desc, $text, $full_name, $array->title, 3);
            $result = $id;
        }
        else {
            $result = false;
        }

        echo json_encode ($result);
    }

    /**
     * task to edit
     */


    function taskToEdit() {
        $id=$this->input->get('tid');
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $user = $session_uid->id;
        $data['user'] = $this->admin_model->get_user_id($user);
        $data['task']  = $this->task_model->getTask($id);
        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }
        $avatars = $this->admin_model->getAvatars();

        if($avatars) {
            $data['avatars']= $avatars;
        }
        else {
            $data['avatars']=false;
        }
        $curators = $this->task_model->get_curators();

        if($curators) {
            $data['curators']= $curators;
        }
        else {
            $data['curators']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }
        $data['user_name'] = $this->admin_model->get_users_names();
        $this->load->view('templates/ajax/edit_task_view',$data);
    }


    /**
     * Quick delete task
     */

    function updateIntroduce() {
        $check =  $this->input->post('check');
        $id =  $this->input->post('id');
        if($check == 'true') {
            $onoff = 1;
        }
        else {
            $onoff = 0;
        }

        if($querty = $this->admin_model->updateIntroduce($id,$onoff)) {
            $result = true;
        }
        else {
            $result = false;
        }

        echo json_encode ($result);
    }


    /**
     * Update timer
     */

    function updateTimer() {
        $time =  $this->input->post('time');
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $id = $session_uid->id;
        if($querty = $this->admin_model->updateTimer($id,$time)) {
            $result = true;
        }
        else {
            $result = false;
        }

        echo json_encode ($result);
    }


    /**
     * Get timer
     */

    function getTimer() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $id = $session_uid->id;
        if($querty = $this->admin_model->getTimer($id)) {
            $result = $querty;
        }
        else {
            $result = false;
        }
        echo json_encode ($result);
    }


    /**
     * Update Task
     */

    function updateTask() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $id =  $this->input->post('id');
        $status =  $this->input->post('status');
        $array = $this->task_model->getTask($id);
        $name_array =  $this->admin_model->get_user_id($uid);
        $full_name = $name_array->first_name.' '.$name_array->last_name;
        $text ='update task';
        if($querty = $this->task_model->updateTask($id,$status)) {
            $this->project_model->createEvent($uid, $array->desc, $text, $full_name, $array->title, 4);
            $result = true;
        }
        else {
            $result = false;
        }

        echo json_encode ($result);
    }


    /**
     * Update Task for Overdue
     */

    function updateTaskOverdue() {
        $id =  $this->input->post('id');
        $overdue =  $this->input->post('overdue');
        if($querty = $this->task_model->updateTaskOverdue($id,$overdue)) {
            $result = true;
            if($overdue == 1) {
                $task = $this->task_model->getTask($id);
                $curator_object = $this->admin_model->get_user_id($task->uid);
                $implementor_object = $this->admin_model->get_user_id($task->implementor);
                $curator_email = $curator_object->email;
                $implementor_email = $implementor_object->email;
                $implementor_name = $this->admin_model->getUsername($task->implementor);
                $curator_name = $this->admin_model->getUsername($task->uid);
                $project_array =  $this->project_model->getProjectObject($task->pid);
                $project_title = $project_array->title;
                $project_id = $project_array->pid;

//                Send email to curator
                if ($curator_object->message == '1') {
                    $this->load->library('email');
                    $this->email->from('info@brilliant-solutions.eu', 'Project management robot');
                    $this->email->to($curator_email);
                    $this->email->subject('Brilliant project management - Project '.$project_title.' Task( #' .$task->id.')');
                    $this->email->message("Hello, ".$curator_name."\n"."\n"."Task ".$task->title." is over due"."\n"."\n");
                    $this->email->send();
                    $this->email->clear();
                }
//                Send email to implementor
                if ($implementor_object->message == '1') {
                    $this->load->library('email');
                    $this->email->from('info@brilliant-solutions.eu', 'Project management robot');
                    $this->email->to($implementor_email);
                    $this->email->subject('Brilliant project management - Project '.$project_title.' Task( #' .$task->id.')');
                    $this->email->message("Hello, ".$implementor_name."\n"."\n"."Task ".$task->title." is over due"."\n"."\n");
                    $this->email->send();
                    $this->email->clear();
                }
            }
        }
        else {
            $result = false;
        }
        echo json_encode ($result);
    }

    /**
     * Update sidebar_left
     */

    function updateSidebarLeft() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $status =  $this->input->post('status');
        if($querty = $this->dashboard_model->updateSidebarLeft($uid,$status)) {
            $result = true;
        }
        else {
            $result = false;
        }
        echo json_encode ($result);
    }


    /**
     * Update sidebar_right
     */

    function updateSidebarRight() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $status =  $this->input->post('status');
        if($querty = $this->dashboard_model->updateSidebarRight($uid,$status)) {
            $result = true;
        }
        else {
            $result = false;
        }
        echo json_encode ($result);
    }

//updateTaskOverdue


    /**
     * Complete Task
     */

    function completeTask() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $id =  $this->input->post('id');
        $status =  $this->input->post('status');
        $tts =  $this->input->post('tts');
        $array = $this->task_model->getTask($id);
        $name_array =  $this->admin_model->get_user_id($uid);
        $full_name = $name_array->first_name.' '.$name_array->last_name;
        $text ='complete task';
        $result['test'] = $tts;
        if($querty = $this->task_model->completeTask($id,$status,$tts)) {
            $this->project_model->createEvent($uid, $array->desc, $text, $full_name, $array->title, 4);
            $result['result'] = true;
        }
        else {
            $result['result'] = false;
        }
        echo json_encode ($result);
    }




    /**
     * Update Task
     */

    function updateTaskProcess() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $id =  $this->input->post('id');
        $array = $this->task_model->getTask($id);
        $cts = time();
        $name_array =  $this->admin_model->get_user_id($uid);
        $full_name = $name_array->first_name.' '.$name_array->last_name;
        $text ='update task';
        if($querty = $this->task_model->updateTaskProcess($id,'2',$cts)) {
            $this->project_model->createEvent($uid, $array->desc, $text, $full_name, $array->title, 4);
            $result = true;
        }
        else {
            $result = false;
        }
        echo json_encode ($result);
    }



    /**
     * count process Tasks
     */

    function countProcessTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        if($querty = $this->task_model->getProcessTasks($session_uid->id)) {
            $result = count($querty);
        }
        else {
            $result = 0;
        }
        echo json_encode ($result);
    }


    /**
     * count overdue Tasks
     */

    function countOverdueTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        if($querty = $this->task_model->getOverdueTasks($session_uid->id)) {
            $result = count($querty);
        }
        else {
            $result = 0;
        }
        echo json_encode ($result);
    }


    /**
     * count Approve Tasks
     */

    function countApproveTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        if($querty = $this->task_model->getApproveTasks($session_uid->id)) {
            $result = count($querty);
        }
        else {
            $result = 0;
        }
        echo json_encode ($result);
    }


    /**
     * count Comp Tasks
     */

    function countCompTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        if($querty = $this->task_model->getCompTasks($session_uid->id)) {
            $result = count($querty);
        }
        else {
            $result = 0;
        }
        echo json_encode ($result);
    }


    /**
     * count Comp Tasks
     */

    function countReadyTasks() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        if($querty = $this->task_model->getReadyTasks($session_uid->id)) {
            $result = count($querty);
        }
        else {
            $result = 0;
        }
        echo json_encode ($result);
    }


    function GetImpTask() {
        $id =  $this->input->get('id');
        $imps = $this->task_model->get_imps_assign($id);
        $data['imps'] = $imps;
        $this->load->view('templates/ajax/choose_implementer_view',$data);
    }


    /**
     * Publish or unpublish comment
     */

    function publishComment() {
        $id =  $this->input->post('id');
        $check =  $this->input->post('check');
        if($querty = $this->task_model->publishComment($id,$check)) {
            $result = true;
        }
        else {
            $result = false;
        }
        echo json_encode ($result);
    }

    /**
     * Get current time
     */

    function getCurrentTime() {
        $result = date("F j, Y, g:i a");
        echo json_encode ($result);
    }


    /**
     * MessageToEmail
     */

    function messageToEmail() {
        $id =  $this->input->post('id');
        $check =  $this->input->post('check');
        if($querty = $this->message_model->messageToEmail($id,$check)) {
            $result = true;
        }
        else {
            $result = false;
        }
        echo json_encode ($result);
    }


    /**
     * Get users by project ID
     */

    function getUsersProject() {
        $id =  $this->input->get('project');
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }
        $avatars = $this->admin_model->getAvatars();
        if($avatars) {
            $data['avatars']= $avatars;
        }
        else {
            $data['avatars']=false;
        }
        $data['users_title_roles']= $this->admin_model->get_users_title_roles();
        $data['get_users_online'] = $this->admin_model->get_users_online();
        $data['user_name'] = $this->admin_model->get_users_names();
        $users = $this->admin_model->get_users();
        $data['users'] = $users;
        $data['assign_users'] =  $this->project_model->getProjectUsers($id);
        $p_users = array();
        foreach ($users as $uk => $uv) {
            $p_users[$uv['id']] = $uv;
        }
        $data['users'] = $p_users;
        $data['id'] = $id;
        $this->load->view('templates/ajax/assign_users_view',$data);
    }


    /**
     * Assign user to project and send message to email & added event
     */

    function assignUserProject() {
        $id =  $this->input->post('id');
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $pid = $this->input->post('pid');
        if(isset($_POST['id']) AND isset($_POST['pid'])) {
            $result['id'] =  $id;
            $result['uid'] =  $uid;
            $result['pid'] =  $pid;
//            todo
            if($this->project_model->assign_project_update($result['id'],$pid, 1)) {
                $result['insert'] =  true;
                $name_array =  $this->admin_model->get_user_id($uid);
                $assign_name_array =  $this->admin_model->get_user_id($id);
                $full_name = $name_array->first_name.' '.$name_array->last_name;
                $assign_full_name = $assign_name_array->first_name.' '.$assign_name_array->last_name;
                $result['full_name'] = $assign_full_name;
                $text ='Assigned user';
                $project_arr =$this->project_model->getProject($pid);
                $desc = $assign_full_name.' assigned to project '.$project_arr[0]['title'];
                    $this->project_model->createEvent($uid, $desc, $text, $full_name, $assign_full_name, 6);
                    $result['result'] = true;
                $user_array = $this->admin_model->get_user_id($result['uid']);
                $user_to = $this->admin_model->get_user_id($result['id']);
//                if ($user_array[0]['message'] == '1') {
////                    $this->email->clear();
//                    $this->load->library('email');
//                    $this->email->from($user_array[0]['email'], 'team');
//                    $this->email->to($user_to[0]['email']);
//                    $this->email->subject('New event from Brilliant Task Management');
//                    $this->email->message("Hello, ".$user_to[0]['first_name']." ".$user_to[0]['last_name']."\n"."\n"."You have been assigned to project"."\n"."\n". "From: ".$user_array[0]['first_name']." ".$user_array[0]['last_name']."\n"."\n". "Subject: ".$result['subject']."\n"."\n");
//                    $this->email->send();
//                }
            }
            else {
                $result['insert'] =  false;
            }
        }
        else {
            $result['id'] =  false;
            $result['uid'] =  false;
            $result['pid'] =  false;
        }
        echo json_encode ($result);
    }

    /**
     * Remove User from project
     */

    function removeUserProject() {
        $session_uid = $this->admin_model->get_user_id($_SESSION['username']);
        $uid = $session_uid->id;
        $id =  $this->input->post('id');
        $pid =  $this->input->post('pid');
        $result['id'] = $id;
        $result['pid'] = $pid;
        $result['result'] = false;
       if($this->project_model->removeUserProject($id,$pid)) {



          $user_tasks = $this->task_model->getUserTasks($id);
           if($user_tasks != false) {

               foreach($user_tasks as $uk=>$uv) {
                   $this->task_model->updateUserTasks($id,$uv['id'],$uid);
               }
           }


           $result['info'] = 'User successfully removed from the project';
           $name_array =  $this->admin_model->get_user_id($uid);
           $assign_name_array =  $this->admin_model->get_user_id($id);
           $full_name = $name_array->first_name.' '.$name_array->last_name;
           $assign_full_name = $assign_name_array->first_name.' '.$assign_name_array->last_name;
           $result['full_name'] = $assign_full_name;
           $text ='Unsigned from project';
           $project_arr =$this->project_model->getProject($pid);
           $desc = $assign_full_name.' removed from project '.$project_arr[0]['title'];
           $this->project_model->createEvent($uid, $desc, $text, $full_name, $assign_full_name, 7);
           $result['result'] = true;

       }
        else {
            $result['result'] = false;
            $result['info'] = false;
        }

        echo json_encode ($result);
    }



    function frozeProject() {
        $result = array();
        $pid =  $this->input->post('project');
        $status =  $this->input->post('status');
        $project = $this->project_model-> getProjectObject($pid);
        $project_title =  $project->title;
        $project_id=  $project->pid;

        if(isset($_POST['project']) AND isset($_POST['status'])) {

            $checkProcess = $this->task_model->getProcessTaskProject($pid);
            $result['process'] = $checkProcess;
            if ($result['process'] == true && $status == '1') {
                $result['status'] = '3';
                $result['process_string'] = 'You can not froze project, while at least one task in process';
            }
            else {

                if ($this->project_model->frozeProject($pid, $status)) {
                    $result['froze'] = $status;
                    $result['status'] = true;
                    $project_array = $this->project_model->getProjectsAssign($pid);
                    if ($status == '1') {
                        $this->load->library('email');
                        foreach ($project_array as $k => $v) {
                            $user_object = $this->admin_model->get_user_id($v['uid']);
                            if ($user_object->message == 1) {
                                $this->email->clear();
                                $user_name = $user_object->first_name . ' ' . $user_object->last_name;
                                $this->email->from('Brilliant Task Management', 'team');
                                $this->email->to($user_object->email);
                                $this->email->subject('Frozen project');
                                $this->email->message("Hello, " . $user_name . "\n" . "\n" . "Project (" . $project_id . ") " . $project_title . " has been frozen");
                                $this->email->send();
                            }
                        }
                    }
                    $result['projects'] = $project_array;
                }
            }


        }
        else {
            $result['status'] = false;
        }
        echo json_encode ($result);
    }
}


