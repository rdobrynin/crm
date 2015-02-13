<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class maintenance extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('templates/maintenance_view');
  }

}
