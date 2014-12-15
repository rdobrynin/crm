<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Message_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }



    /**
     * Send Comment
     * @return mixed
     */

    public function sendComment() {
        $subject = $this->input->post('subject');
        $text = $this->input->post('text');
        $to = $this->input->post('to');
        $uid = $this->input->post('uid');
        $insert = false;
            $data = array(
                'subject' => $subject,
                'text' => $text,
                'uid' => $uid,
                'to' => $to,
            );
        if ($subject != '' OR $text != '') {
            $insert = $this->db->insert('comment', $data);
        }
        return $insert;
    }


    /**
     * Send Comment
     * @return mixed
     */

    public function getComments() {
        $query = $this
            ->db
            ->get('comment');
        $insert = $query->result_array();
        if(!empty($insert)){
            return $insert;
        }
        else {
            return false;
        }

    }

}


