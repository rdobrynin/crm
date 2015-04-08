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
        $return = array();
        $query = $this
            ->db
            ->get('task_type');
        $result = $query->result_array();
        if(!empty($result)){
          foreach($result as $task_type){
              $return[$task_type["id"]] = $task_type["title"];
          }
        }
        return $return;
    }



    /**
     * Get projectTasks
     * @return mixed
     */

    public function getProjectTasks() {
        $return = array();
        $query = $this
            ->db
            ->get('task');
        $result = $query->result_array();
        if(!empty($result)){
            foreach($result as $task_type){
                $return[$task_type["id"]] = $task_type["pid"];
            }
        }
        return $return;
    }



    /**
     * Get Last Task
     * @return mixed
     */

    public function getLastTask() {
        $query = $this
            ->db
            ->limit('1')
            ->order_by("id", "desc")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->row();
        }
        else {
            return FALSE;
        }
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
     * Update task
     * @return mixed
     */

    public function updateTaskOverdue($id,$overdue) {
        $data = array(
            'overdue' =>  $overdue
        );
        $this->db->where('id', $id);
        $update =$this->db->update('task', $data);
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
     * get implementors assigned to project();
     * @return mixed
     */

    public function get_imps_assign($pid) {
        $data = array();
        $query = $this->db->select('*')
            ->from('projects')
            ->join('users', 'projects.uid = users.id')
            ->where('projects.assign', 1)
            ->where('users.role', 2)
            ->where('projects.pid', $pid)
            ->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        else {
            $data = false;
        }

        $query->free_result();
        return $data;
    }





    /**
     * get curators by role of curator or master();
     * @return mixed
     */

    public function get_curators() {
        $query = $this
            ->db
           ->where("(role = '5' OR role = '4')")
            ->get('users');
        return $query->result_array();
    }



    /**
     * Create task
     * @return mixed
     */
    public function insertTask() {
        $due_time = $this->input->post('dueto');
        $data = array (
            'uid' => $this->input->post('owner'),
            'pid' => $this->input->post('project'),
            'implementor' => $this->input->post('implementor'),
            'title' => $this->input->post('title'),
            'desc' => $this->input->post('desc'),
            'due_time' =>strtotime($due_time),
            'label' =>$this->input->post('label'),
            'priority' =>$this->input->post('priority'),
            'key' =>$this->input->post('key'),
            'date_created' =>time(),
        );
        $insert = $this->db->insert('task', $data);
        return $insert;
    }



    /**
     * Create task
     * @return mixed
     */
    public function updateEditTask($id) {
        $due_time = $this->input->post('dueto');
        $data = array (
            'uid' => $this->input->post('owner'),
            'pid' => $this->input->post('project'),
            'implementor' => $this->input->post('implementor'),
            'title' => $this->input->post('title'),
            'desc' => $this->input->post('desc'),
            'due_time' =>strtotime($due_time),
            'label' =>$this->input->post('label'),
            'priority' =>$this->input->post('priority'),
            'date_edited' =>time(),
            'overdue' => '0',

        );
        $this->db->where('id', $id);
        $insert = $this->db->update('task', $data);
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
     * Count tasks if not frozen
     * @return mixed
     */


    public function countTasks($uid) {
        $query = $this->db->select('*')
            ->from('project')
            ->join('task', 'project.pid = task.pid')
            ->where("(task.uid = '$uid' OR task.implementor = '$uid')")
            ->where('project.froze', 0)
            ->get();
        return $query->result_array();
    }


    /**
     * Count tasks if not frozen
     * @return mixed
     */


    public function countCompleteTasks() {
        $query = $this->db->select('*')
            ->from('project')
            ->join('task', 'project.pid = task.pid')
            ->where('project.froze', 0)
            ->where('task.status', 3)
            ->get();

        if ($query->num_rows > 0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    /**
     * Get process task for project
     * @param $pid
     * @return bool
     */


    public function getProcessTaskProject($pid) {
        $query = $this
            ->db
            ->where('pid', $pid)
            ->where('status', 2)
            ->limit('1')
            ->get('task');
        if ($query->num_rows > 0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }


    /**
     * Count all tasks
     * @return mixed
     */


    public function countAllTasks($uid) {
        $query = $this->db
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
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


    /**
     * Get tasks
     * @return mixed
     */

    public function getTasks($uid) {
        $query = $this
            ->db
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }

    /**
     * Get user tasks
     * @return mixed
     */


    public function getUserTasks($uid) {
        $query = $this
            ->db
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }

    function updateUserTasks($id,$tid,$uid) {
        $data = array (
            'status' => '0',
            'implementor' => $uid
        );
        $this->db
            ->where('implementor', $id)
            ->where('id', $tid);
        $update = $this->db->update('task', $data);
        return $update;

    }



    /**
     * Get tasks
     * @return mixed
     */

    public function checkTasks($pid) {
        $query = $this
            ->db
            ->where('pid', $pid)
            ->get('task');
        if ($query->num_rows > 0) {
            return true;
        }
        else {
            return FALSE;
        }
    }

    /**
     * Get overdue tasks
     * @return mixed
     */

    public function getOverdueTasks($uid) {
        $query = $this
            ->db
            ->where('overdue', '1')
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }


    /**
     * Get Approve tasks
     * @return mixed
     */

    public function getApproveTasks($uid) {
        $query = $this
            ->db
            ->where('status', '0')
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }


    /**
     * Get ready tasks
     * @return mixed
     */

    public function getReadyTasks($uid) {
        $query = $this
            ->db
            ->where('status', '5')
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }




    /**
     * Get process tasks
     * @return mixed
     */

    public function getProcessTasks($uid) {
        $query = $this
            ->db
            ->where('status', '2')
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }




    /**
     * Get process tasks
     * @return mixed
     */

    public function getCompTasks($uid) {
        $query = $this
            ->db
            ->where('status', '3')
            ->where("(uid = '$uid' OR implementor = '$uid')")
            ->get('task');
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }


    /**
     * verify task
     * @param $id
     * @return bool
     */

    public function getTask($id) {
        $query = $this
            ->db
            ->where('id', $id)
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
     * remove task
     * @param $id
     * @return bool
     */

    public function deleteTask($id) {
        $query = $this
            ->db
            ->where('id', $id)
            ->limit('1')
            ->delete('task');
        return $query;
    }


    /**
     * update task by id
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateTask($id, $status) {
        $data = array (
            'status' => $status
        );
        $this->db->where('id', $id);
        $update = $this->db->update('task', $data);
        return $update;
    }



    /**
     * complete task by id
     * @param $id
     * @param $status
     * @return mixed
     */
    public function completeTask($id, $status,$tts) {
        $data = array (
            'status' => $status,
            'tts' => $tts
        );
        $this->db->where('id', $id);
        $update = $this->db->update('task', $data);
        return $update;
    }



    /**
     * Update task to Process
     * @param $id
     * @param $status
     * @param $cts
     * @return mixed
     */
    public function updateTaskProcess($id, $status, $cts) {
        $data = array (
            'status' => $status,
            'cts' => $cts
        );
        $this->db->where('id', $id);
        $update = $this->db->update('task', $data);
        return $update;
    }





    /**
     * Update task
     * @return mixed
     */

    public function publishComment($id,$check) {
        $data = array(
            'public' =>  $check
        );
        $this->db->where('id', $id);
        $update =$this->db->update('comment', $data);
        return $update;
    }



    /**
     * Get label
     * @return mixed
     */

    public function getTaskLabel($id) {
        $query = $this
            ->db
            ->where('id', $id)
            ->limit('1')
            ->get('task_type');
        if ($query->num_rows > 0) {
            foreach ($query->result() as $row) {
                return $row->title;
            }
        }
        else {
            return FALSE;
        }
        return TRUE;
    }


}


