<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Dashboard_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  /**
   * Help block on/off
   * @param $email
   * @return bool
   */
  public function settings_help($id, $input) {
    $data = array(
      'id' => $id,
      'helpblock' =>  $input
    );

    $this->db->where('id', $id);
    $update =$this->db->update('users', $data);
    return $update;
  }
}
