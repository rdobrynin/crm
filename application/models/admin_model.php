<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Admin_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  /**
   * Verify user
   * @param $email
   * @param $password
   * @return bool
   */

  public function verify_user($email, $password) {
    $query = $this
      ->db
      ->where('email', $email)
      ->where('password', md5($password))
    ->limit('1')
      ->get('users');
    if ($query->num_rows > 0) {
      return $query->row();
    }
    else {
      return FALSE;
    }
  }

    /** Verify user email
     * @param $email
     * @param $password
     * @return bool
     */

    public function verify_user_email($email) {
        $query = $this
            ->db
            ->where('email', $email)
            ->limit('1')
            ->get('users');
        if ($query->num_rows > 0) {
            return $query->row();
        }
        else {
            return FALSE;
        }
    }

    /**
     * get avatar
     * @param $email
     * @param $password
     * @return bool
     */

    public function get_avatar($id) {
        $query = $this->db->where('fid', $id)->get('avatars');
        if ($query->num_rows > 0) {
            $result = $query->result_array();
            return $result[0]['filename'];
        }
        else {
            return FALSE;
        }
    }

    /**
     * get avatars
     * @return bool
     */

    public function get_avatars() {
        $query = $this->db->get('avatars');
        $result = $query->result_array();
        return $result;
    }


    /**
   * Check email
   * @param $email
   * @return bool
   */

  public function check_email($email) {
    $query = $this
      ->db
      ->where('email', $email)
      ->limit('1')
      ->get('users');
      $result = $query->result_array();
      error_reporting(0);
      return $result;
  }
    /**
     * Check emails
     * @param $email
     * @return bool
     */

    public function emails_users($email) {
        $query = $this
            ->db
            ->where('email', $email)
            ->get('users');
        $result = $query->result_array();
        return $result;
    }
    public function emails_client($email) {
        $query = $this
            ->db
            ->where('email', $email)
            ->get('client');
        $result = $query->result_array();
        return $result;
    }
    public function emails_added($email) {
        $query = $this
            ->db
            ->where('email', $email)
            ->get('users_emails');
        $result = $query->result_array();
        return $result;
    }
    public function emails_new($email) {
        $query = $this
            ->db
            ->where('email', $email)
            ->get('new_users');
        $result = $query->result_array();
        return $result;
    }


    /**
     * get users();
     * @return mixed
     */

    public function get_admins() {
        $query = $this
            ->db
            ->where('role', '5')
            ->get('users');
        return $query->result_array();
    }


    /**
   * Create member
   * @return mixed
   */

  public function create_member() {
    $data = array (
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password_signup'),
      'role' => $this->input->post('role_signup'),
      'avatar' =>'placeholder_user.jpg',
    );
    $insert = $this->db->insert('new_users', $data);
    return $insert;
  }

  /**
   * Create company
   * @return mixed
   */

  public function create_client() {
    $data = array (
      'title' => $this->input->post('title'),
      'description' => $this->input->post('description'),
      'email' => $this->input->post('email'),
      'url' => $this->input->post('url'),
      'phone' => $this->input->post('phone'),
      'address' => $this->input->post('address'),
      'index' => $this->input->post('index'),
      'city' => $this->input->post('city'),
      'country' => $this->input->post('country'),
      'creator' => $this->input->post('curator')
    );
    $insert = $this->db->insert('client', $data);
    return $insert;
  }


    /**
     * Insert user from invitation system
     * @param $fname
     * @param $lname
     * @param $role
     * @param $email
     * @param $password
     * @return mixed
     */
    public function insert_user($fname,$lname,$role,$email,$password) {
        $data = array (
            'first_name' => $fname,
            'last_name' => $lname,
            'role' => $role,
            'email' => $email,
            'password' => md5($password),
            'avatar' =>'placeholder_user.jpg'
        );
        $insert = $this->db->insert('users', $data);
        return $insert;
    }

  /**
   * Delete company
   * @return mixed
   */

  public function delete_client($cid) {
    $this->db->where('cid', $cid);
    $insert = $this->db->delete('client');
    return $insert;
  }

  /**
   * Update member
   * @param $id
   * @return mixed
   */

  public function update_member($id) {
    $data = array (
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'role' => $this->input->post('role'),
      'phone' => $this->input->post('phone'),
      'skype_address' => $this->input->post('skype_address'),
      'facebook_address' => $this->input->post('facebook_address'),
      'linkedin_address' => $this->input->post('facebook_address'),
      'date_edited' => $this->input->post('date_edited'),
    );
    $this->db->where('id', $id);
    $update = $this->db->update('users', $data);
    return $update;
  }

  /**
   * Change status to online
   * @param $id
   * @return mixed
   */

  public function online_status($id) {
    $data = array (
      'status' => 1,
      'status_time' => time()+6
    );
    $this->db->where('id', $id);
    $update = $this->db->update('users', $data);
    return $update;
  }


  /**
   * Change status to offline
   * @param $id
   * @return mixed
   */

  public function offline_status($id) {
    $data = array (
      'status' => 0,
      'status_time' => time()+6
    );
    $this->db->where('id', $id);
    $update = $this->db->update('users', $data);
    return $update;
  }



  /**
   * Insert member phone
   * @param $id
   * @return array
   */

  public function insert_member_phone($id) {
    $phone_array = $this->input->post('add_phone');
    $insert = array();
    foreach ($phone_array as $phone) {
      $data = array(
        'pid' => $id,
        'phone' => $phone,
      );
        if($phone !='') {
            $insert = $this->db->insert('users_phones', $data);
        }
    }
    return $insert;
  }

    /**
     * Insert member email
     * @param $id
     * @return array
     */

    public function insert_member_email($id) {
        $email_array = $this->input->post('add_email');
        $insert = array();
        foreach ($email_array as $email) {
            $data = array(
                'eid' => $id,
                'email' => $email,
            );
            if($email !='') {
                $insert = $this->db->insert('users_emails', $data);
            }
        }
        return $insert;
    }

    /**
     * delete additional email
     * @param $id
     * @return array
     */

    public function delete_member_email($email) {
        $delete = array();
            $data = array(
                'email' => $email
            );
            if($email !='') {
                $delete = $this->db->delete('users_emails', $data);
            }
        return $delete;
    }

    /**
     * delete additional phones
     * @param $id
     * @return array
     */

    public function delete_member_phone($phone) {
        $delete = array();
        $data = array(
            'phone' => $phone
        );
        if($phone !='') {
            $delete = $this->db->delete('users_phones', $data);
        }
        return $delete;
    }

  /**
   * get user phones
   * @param $id
   * @return mixed
   */


  public function get_phones($id) {
    $query = $this
      ->db
      ->where('pid', $id)
      ->get('users_phones');
    return $query->result_array();
  }


    /**
     * get user password
     * @param $id
     * @return mixed
     */


    public function get_password($id) {
        $query = $this->db->where('id', $id)->get('users');
        if ($query->num_rows > 0) {
            foreach ($query->result() as $row) {
                return $row->password;
            }
        }
        else {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Updfate password
     * @param $id
     * @param $password
     */

    public function updatePassword($id, $password) {

        $data = array(
            'password' => $password,
            'id' => $id
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }


    /**
     * get user emails
     * @param $id
     * @return mixed
     */


    public function get_emails($id) {
        $query = $this
            ->db
            ->where('eid', $id)
            ->get('users_emails');
        return $query->result_array();
    }

  /**
   * Verify company title
   * @param $title
   * @return mixed
   */

  public function verify_client($title) {
    $query = $this
      ->db
      ->where('title', $title)
      ->get('client');
    error_reporting(0);
    return $query->result_array();

  }

    /**
     * Verify new user
     * @param $title
     * @return mixed
     */

    public function verify_new_user($email) {
        $query = $this
            ->db
            ->where('email', $email)
            ->get('new_users');
        if ($query->num_rows > 0) {
            return TRUE;
        }
        else {
            return FALSE;
        }

    }


    /**
   * get user();
   * @param $username
   * @return mixed
   */

  public function get_user($username) {
    $query = $this
      ->db
    ->where('email', $username)
      ->get('users');
    return $query->result_array();
  }



    /**
     * get new joined user();
     * @param $username
     * @return mixed
     */

    public function get_new_users() {
        $query = $this
            ->db
            ->get('new_users');
        return $query->result_array();
    }



    /**
   * get own client ();
   * @param $username
   * @return mixed
   */

  public function get_own_client($id) {
    $query = $this
      ->db
      ->where('creator', $id)
      ->get('client');
      if ($query->num_rows > 0) {
          return $query->result_array();
      }
      else {
          return FALSE;
      }
  }

  /**
   * get ID of user
   * @param $id
   * @return mixed
   */

  public function get_user_id($id) {
    $query = $this
      ->db
      ->where('id', $id)
      ->get('users');
    return $query->result_array();
  }



 /**
   * get users();
   * @return mixed
   */

  public function get_users() {
    $query = $this
      ->db
      ->get('users');
    return $query->result_array();
  }

  /**
   * get roles();
   * @return mixed
   */

  public function get_roles() {
    $query = $this
      ->db
      ->get('roles');
    return $query->result_array();
  }

    /**
     * get session_data();
     * @return mixed
     */

    public function get_session() {
        $query = $this
            ->db
            ->get('sessions');
        return $query->result_array();
    }
}


