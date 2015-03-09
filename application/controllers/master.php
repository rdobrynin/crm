<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Master extends CI_Controller {
  public function __construct() {
      session_start();
    parent::__construct();
      $this->load->model('admin_model');
  }

  public function index() {
      $user = $this->admin_model->get_user_id($_SESSION['username']);
      $data['session'] = $this->admin_model->get_session();
      if($user[0]['role']==='5') {
          $this->load->view('templates/master/master_view', $data);
      }
      else {
          $this->load->view('custom404_view');
      }
  }

}
