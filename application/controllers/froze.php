<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class froze extends CI_Controller {
  public function __construct() {
    parent::__construct();
      session_start();
  }

  public function index() {
   if($this->session->flashdata('froze') !=false) {
       session_destroy();
       $this->load->view('templates/froze_view');
   }
      else {
          redirect(base_url() . 'error');
      }
  }

}
