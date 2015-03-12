<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Project_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }


    /**
     * Create new project
     * @param $title
     * @param $desc
     * @param $owner_id
     * @return mixed
     */

    public function create_project($title,$desc,$uid) {
        $data = array (
            'title' => $title,
            'description' => $desc,
            'owner' => $uid,
            'date_created' => time()
        );
        $insert = $this->db->insert('project', $data);
        return $insert;
    }

    public function getLastProject() {
        $query = $this
            ->db
            ->limit('1')
            ->order_by("pid", "desc")
            ->get('project');
        if ($query->num_rows > 0) {
            return $query->row();
        }
        else {
            return FALSE;
        }
    }



    /**
     * Assign users for project
     * @param $title
     * @param $desc
     * @param $owner_id
     * @return mixed
     */

    public function assign_project($pid,$uid, $assign) {
        $data = array (
            'pid' => $pid,
            'uid' => $uid,
            'assign' => $assign
        );
        $insert = $this->db->insert('projects', $data);
        return $insert;
    }


    /**
     * Update user to project
     * @param $title
     * @param $desc
     * @param $owner_id
     * @return mixed
     */

    public function assign_update_project($pid,$uid) {
        $data = array (
            'assign' => 1
        );
        $this->db
            ->where('uid', $uid)
            ->where('pid', $pid);
        $update = $this->db->update('projects', $data);
        return $update;
    }

    /**
     * Update assigned user to the project
     * @param $uid
     * @param $assign
     * @return mixed
     */

    public function assign_project_update ($uid,$pid, $assign) {
        $data = array (
            'assign' => $assign
        );
        $this->db
            ->where('uid', $uid)
            ->where('pid', $pid);
        $update = $this->db->update('projects', $data);
        return $update;
    }


    /**
     * Update projects
     * @param $id
     * @param $title
     */

    public function updateProject($id,$title,$desc) {
        $data = array(
            'title' => $title,
            'description' => $desc,
            'date_edited' => time()
        );
        $this->db->where('pid', $id);
        $this->db->update('project', $data);
    }




    public function frozeProject($pid,$status) {
        $data = array(
            'froze' => $status,
            'date_edited' => time()
        );
        $this->db->where('pid', $pid);
        $update = $this->db->update('project', $data);
        return $update;
    }

    /**
     * Get projects
     * @return mixed
     */

    public function get_projects() {
        $query = $this
            ->db
//        ->where('froze','0')
            ->get('project');
        return $query->result_array();
    }



    /**
     * Get projects
     * @return mixed
     */

    public function checkProjectFroze() {
        $return = array();
        $query = $this
            ->db
            ->get('project');
        $result = $query->result_array();
        if(!empty($result)){
            foreach($result as $pr){
                $return[$pr["pid"]] = $pr["froze"];
            }
        }
        return $return;
    }



    /**
     * Get projects
     * @return mixed
     */

    public function getProjectFroze() {
        $return = array();
        $query = $this->db->where('froze', '1')->get('project');
        $result = $query->result_array();
        if ($query->num_rows > 0) {
            if (!empty($result)) {
                foreach ($result as $pr) {
                    $return[$pr["pid"]] = $pr["froze"];
                }
            }
        }
        else {
            $return = FALSE;
        }

        return $return;
    }


//    get by ipd projects

    public function getProjectsAssign($pid) {
        $query = $this
            ->db
             ->where('pid',$pid)
             ->where('assign', '1')
            ->get('projects');
        return $query->result_array();
    }

    /**
     * Remove user from project
     * @param $id
     * @param $pid
     * @return mixed
     */

    public function removeUserProject($id,$pid) {
        $data = array (
            'assign' => '0'
        );
        $this->db
            ->where('uid', $id)
            ->where('pid', $pid);
        $update = $this->db->update('projects', $data);
        return $update;
    }


    /**
     * Get all projects
     * @return mixed
     */

    public function get_all_projects() {
        $query = $this
            ->db
            ->get('projects');
        return $query->result_array();
    }



    /**
     * Get all projects for user
     * @return mixed
     */

    public function get_all_projects_user($id) {
        $return = array();
        $query = $this
            ->db
            ->where('uid', $id)
            ->get('projects');
        $result = $query->result_array();
        if(!empty($result)){
            foreach($result as $projects){
                $return[$projects["pid"]] = $projects["uid"];
            }
        }
        return $return;
    }




    /**
     * Get projects
     * @return mixed
     */

    public function get_project_title() {
        $return = array();
        $query = $this
            ->db
            ->get('project');
        $result = $query->result_array();
        if(!empty($result)){
            foreach($result as $projects){
                $return[$projects["pid"]] = $projects["title"];
            }
        }
        return $return;
    }


    /**
     * Get projects
     * @return mixed
     */

    public function check_project($title) {
        $query = $this
            ->db
            ->where('title', $title)
            ->get('project');
        if ($query->num_rows > 0) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    /**
     * Count projects
     * @return mixed
     */

    public function countProjects() {
        $query = $this->db->get('project');
        return  $query->num_rows();
    }

    /**
     * Create Event
     * @param $uid
     * @param $title
     * @param $text
     * @return mixed
     */

    public function createEvent($uid,$event,$text,$name,$title,$type) {
        $data = array (
            'uid' => $uid,
            'event' => $event,
            'title' => $title,
            'text' => $text,
            'name' => $name,
            'type' => $type
        );
        $insert = $this->db->insert('events', $data);
        return $insert;
    }

    /**
     * Get last record from event
     * @return mixed
     */


    public function readEvent() {
        $query = $this
            ->db
            ->get('events');
        return $query->last_row();
    }

    /**
     * read all events
     * @return mixed
     */

    public function readAllEvents() {
        $query = $this
            ->db
            ->get('events');
        return $query->result_array();
    }


    /**
     * Get project
     * @return mixed
     */

    public function getProject($pid) {
        $query = $this
            ->db
            ->where('pid', $pid)
            ->limit('1')
            ->get('project');
        return $query->result_array();
    }

    public function getProjectObject($pid) {
        $query = $this
            ->db
            ->where('pid', $pid)
            ->limit('1')
            ->get('project');
        if ($query->num_rows > 0) {
            return $query->row();
        }
        else {
            return FALSE;
        }
    }

    /**
     * Select join users for project due to ID of project
     * @param $pid
     * @return mixed
     */

    public function getProjectUsers($pid) {
        $data = array();
        $query = $this->db->select('*')
        ->from('projects')
        ->join('users', 'projects.uid = users.id')
        ->where('projects.assign', 0)
            ->where('projects.pid', $pid)
        ->get();
        if ($query->num_rows() > 0)
        {
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

}


