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
            'owner' => $uid
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

    public function assign_project($pid,$uid) {
        $data = array (
            'pid' => $pid,
            'uid' => $uid
        );
        $insert = $this->db->insert('projects', $data);
        return $insert;
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

    /**
     * Get projects
     * @return mixed
     */

    public function get_projects() {
        $query = $this
            ->db
            ->get('project');
        return $query->result_array();
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
            ->get('project');
        return $query->result_array();
    }

}


