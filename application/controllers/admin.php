<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Admin extends CI_Controller {

  function __construct() {
    parent::__construct();
    session_start();
      $this->load->model('admin_model');
  }

  public function index() {

    if(isset($_SESSION['username'])) {
      redirect('dashboard');
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');

    if ($this->form_validation->run() !== false) {
     $res = $this
       ->admin_model
       ->verify_user(
         $this->input->post('email'),
         $this->input->post('password'));
      if($res !== FALSE) {
        $this->admin_model->online_status($res->id);
        //person has account
        $_SESSION['username'] = $res->id;
        redirect('dashboard');
      }
      else {
          $this->load->view('login/head_view');
          $this->load->view('login/error_view');
          $this->load->view('login/login_view');
          $this->load->view('login/footer_view');
      }
    }
      else {
          $this->load->view('login/head_view');
          $this->load->view('login/login_view');
          $this->load->view('login/footer_view');
      }
  }

// logout and session destroy
  function logout() {
    $id=$this->admin_model->get_user_id($_SESSION['username']);
    $this->admin_model->offline_status($id[0]['id']);
    session_destroy();
    redirect(base_url());
  }

  function signup() {
    $this->load->model('admin_model');
    $data['admins'] = $this->admin_model->get_admins();


    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
    $this->form_validation->set_rules('password_signup', 'Password', 'trim|required|min_length[4]|md5');
    $this->form_validation->set_rules('password_signup_2', 'Password', 'trim|required|matches[password_signup]');

    $email_post = $this->input->post('email');
    $verify_email = $this->admin_model->verify_new_user($email_post );

      if ($verify_email !== TRUE) {
          if ($this->form_validation->run() !== FALSE) {
          $curator = $this->input->post('curator');
          $curator_email = $this->admin_model->get_user_id($curator);
          $curator_email =$curator_email[0]['email'];
              if ($query = $this->admin_model->create_member()) {
                  $f_name = $this->input->post('first_name');
                  $l_name = $this->input->post('last_name');
                  $password = $this->input->post('password_signup_2');
//              Send email to registered user
                  $this->load->library('email');
                  $this->email->from('roman.dobrynin@gmail.com', 'Roman Dobrynin');
                  $this->email->to($email_post);
                  $this->email->subject('Registration at Brilliant project management');
                  $this->email->message("Hello, ".$f_name." ".$l_name."\n"."\n"."You have successfully registered in Brilliant project management."."\n"."\n". "We need to verify your account before signing. We send you notification soon."."\n"."\n". "Username: ".$email_post."\n"."\n". "Password: ".$password);
                  $this->email->send();
// Added notification to curator
                      $this->load->view('login/head_view');
                      $this->load->view('login/invite_view');
                      $this->load->view('login/footer_view');
                      $this->load->library('email');
                      $this->email->from($email_post, $f_name.' '.$l_name);
                      $this->email->to($curator_email);
                      $this->email->subject('Registration at Brilliant project management');
                      $this->email->message("Hello, Curator\n"."\n".$f_name." ".$l_name." is registered"."\n"."\n"."need to Approve account now");
                      $this->email->send();
              }
          }
          else {
              $this->load->view('login/signup_view',$data);
          }
      }
      else {
          $this->load->view('login/signup_view',$data);
      }
  }

//  forgot password or username
  function forgot() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
      $email_post = $this->input->post('email');
      $verify_email = $this->admin_model->verify_user_email($email_post);
      if ($this->form_validation->run() !== false) {
          $email = $verify_email->email;
          // Generate password
          $letter = 'qwertyuipasdfghjklzxcvbnm';
          $letter .= strtoupper($letter);
          $letter .= '123456789';
          $pass = '';
          for ($i = 0; $i < 6; $i++){
              $pass .= $letter[mt_rand(0, strlen($letter)-1)];
          }
          $this->admin_model->updatePassword($verify_email->id, md5($pass));
//          send email with a new password

          $this->load->library('email');
          $this->email->from('info@brilliant-solutions.eu', 'Admin');
          $this->email->to($verify_email->email);
          $this->email->subject('Registration at Brilliant project management');
          $this->email->message("Hello, ".$verify_email->first_name." ".$verify_email->last_name."\n"."\n"."here is a new password for login"."\n"."\n". "Username: ".$verify_email->email."\n"."\n". "Password: ".$pass);
          $this->email->send();

          $this->load->view('login/head_view');
          $this->load->view('login/forgot_success_view');
          $this->load->view('login/footer_view');

      }
      else {
          $this->load->view('login/head_view');
          $this->load->view('login/forgot_view');
          $this->load->view('login/footer_view');
      }
  }
}

