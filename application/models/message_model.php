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

    public function sendComment($tos, $owner) {
        $subject = $this->input->post('subject');
        $text = $this->input->post('text');
        $to = $tos;
        $uid = $owner;
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

    public function getComments($uid) {
        $query = $this
            ->db
            ->where('uid', $uid)
            ->get('comment');
        $insert = $query->result_array();
        if(!empty($insert)){
            return $insert;
        }
        else {
            return false;
        }

    }


    /**
     * Send Comment
     * @return mixed
     */

    public function getPublishComments() {
        $query = $this
            ->db
            ->where('public', '0')
            ->get('comment');
        $result = $query->result_array();
        if(!empty($result)){
            return $result;
        }
        else {
            return false;
        }

    }


    /**
     * Get comment by ID
     * @return mixed
     */

    public function getCommentLast() {
        $query = $this
            ->db
            ->order_by("id","desc")
            ->limit('1')
            ->get('comment');
        $result = $query->result_array();
        if(!empty($result)){
            return $result;
        }
        else {
            return false;
        }

    }


    /**
     * Message to Email
     * @return mixed
     */

    public function messageToEmail($id,$check) {
        $data = array(
            'message' =>  $check
        );
        $this->db->where('id', $id);
        $update =$this->db->update('users', $data);
        return $update;
    }


}


