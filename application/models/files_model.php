<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Files_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

    /**
     * Update Avatar
     * @param $filename
     * @param $title
     * @param $user_id
     * @return mixed
     */

    public function update_avatar($filename, $user_id) {
        $data = array (
            'filename' => $filename,
            'fid'=>$user_id
        );
        $this->db->where('fid', $user_id);
        $result = $this->db->update('avatars', $data);
        return $result;
    }

    /**
     * Insert Avatar
     * @param $filename
     * @param $title
     * @param $user_id
     * @return mixed
     */

    public function insert_avatar($filename, $user_id) {
        $data = array (
            'filename' => $filename,
            'fid'=>$user_id
        );
        $this->db->where('fid', $user_id);
        $result = $this->db->insert('avatars', $data);
        return $result;
    }

    /**
     * Search Avatar
     * @param $filename
     * @param $title
     * @param $user_id
     * @return mixed
     */

    public function search_avatar($user_id) {
        $query = $this
            ->db
            ->where('fid', $user_id)
            ->get('avatars');
        return $query->result_array();
    }
}




