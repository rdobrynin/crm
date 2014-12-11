<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Task_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }


    /**
     * Get types of tasks
     * @return mixed
     */

    public function getTaskTypes() {
        $query = $this
            ->db
            ->get('task_type');
        return $query->result_array();
    }

    /**
     * verify task type
     * @param $id
     * @return bool
     */

    public function checkTaskType($id) {
        $query = $this
            ->db
            ->where('id', $id)
            ->limit('1')
            ->get('task_type');
        if ($query->num_rows > 0) {
            return $query->row();
        }
        else {
            return FALSE;
        }
    }


    /**
     * Update task
     * @return mixed
     */

    public function updateTaskType($id,$title) {
        $data = array(
            'title' =>  $title
        );
        $this->db->where('id', $id);
        $update =$this->db->update('task_type', $data);
        return $update;
    }


    /**
     * get implementors();
     * @return mixed
     */

    public function get_imps() {
        $query = $this
            ->db
            ->where('role', '2')
            ->get('users');
        return $query->result_array();
    }


    /**
     * Create task
     * @return mixed
     */
    public function insertTask() {
        $data = array (
            'uid' => $this->input->post('owner'),
            'pid' => $this->input->post('project'),
            'implementor' => $this->input->post('implementor'),
            'title' => $this->input->post('title'),
            'desc' => $this->input->post('desc'),
            'due_time' =>$this->input->post('dueto'),
            'label' =>$this->input->post('label'),
            'priority' =>$this->input->post('priority'),
        );
        $insert = $this->db->insert('task', $data);
        return $insert;
    }


    /**
     * verify task
     * @param $id
     * @return bool
     */

    public function checkTask($title) {
        $query = $this
            ->db
            ->where('title', $title)
            ->limit('1')
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->row();
        }
        else {
            return FALSE;
        }
    }


    /**
     * Count tasks
     * @return mixed
     */

    public function countTasks() {
        $query = $this->db->get('task');
        return $query->result_array();
    }

    /**
     * Create Event
     * @param $uid
     * @param $title
     * @param $text
     * @return mixed
     */

    public function createEvent($uid,$event,$text,$name,$title) {

        $data = array (
            'uid' => $uid,
            'event' => $event,
            'title' => $title,
            'text' => $text,
            'name' => $name,
            'type' => 1
        );
        $insert = $this->db->insert('events', $data);
        return $insert;
    }



}


