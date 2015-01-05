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
      'helpblock' =>  $input
    );

    $this->db->where('id', $id);
    $update =$this->db->update('users', $data);
    return $update;
  }


    /**
     * Sidebar
     * @param $email
     * @return bool
     */
    public function updateSidebarLeft($uid, $status) {
        $data = array(
            'sidebar_left' =>  $status
        );

        $this->db->where('id', $uid);
        $update =$this->db->update('users', $data);
        return $update;
    }


    /**
     * Sidebar
     * @param $email
     * @return bool
     */
    public function updateSidebarRight($uid, $status) {
        $data = array(
            'sidebar_right' =>  $status
        );

        $this->db->where('id', $uid);
        $update =$this->db->update('users', $data);
        return $update;
    }



    public function settingsDialog($id, $input) {
        $data = array(
            'introduce' =>  $input
        );

        $this->db->where('id', $id);
        $update =$this->db->update('users', $data);
        return $update;
    }
}
