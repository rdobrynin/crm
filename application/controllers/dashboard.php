<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {

    public function __construct() {
        session_start();
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('dashboard_model');
        $this->load->model('project_model');
        $this->load->model('task_model');
        $this->load->model('files_model');
        $this->load->model('message_model');
        if ($this->session->userdata('site_lang') == 'russian') {
            $this->lang->load('russian', 'russian');
        }
        elseif ($this->session->userdata('site_lang') == 'estonian') {
            $this->lang->load('estonian', 'estonian');
        }
        else {
            $this->lang->load('english', 'english');
        }

        $data['avatar'] = $this->admin_model->get_user_id($_SESSION['username']);
        if (!isset($_SESSION['username'])) {
            redirect('admin');
        }

    }

    /**
     * DASHBOARD PAGE
     */

    public function index() {
        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $projects = $project_array;
        }
        else {
            $projects =false;
        }




        $projects_key = array();



        if($projects !== FALSE) {

            foreach( $projects as $dk=>$dv) {
                $user = $this->admin_model->get_user_id($_SESSION['username']);
                $assign = $this->project_model->getProjectsAssignUser($dv['pid'],$user->id);
                if($assign !=false) {
                    $projects_key[$dv['pid']] = $dv;
                }

            }
        }
        $data['projects'] = $projects_key;



        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $project_all_array = $this->project_model->get_all_projects();
        if($project_all_array) {
            $data['all_projects']= $project_all_array;
        }
        else {
            $data['all_projects']=false;
        }

        $project_all_users_array = $this->project_model->get_all_projects_user($_SESSION['username']);

        if($project_all_users_array) {
            $data['user_projects']= $project_all_users_array;
        }
        else {
            $data['user_projects']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);

        $tasks = $this->task_model->getTasks($data['user']->id);

        if($tasks) {
            $data_task= $tasks;
        }
        else {
            $data_task=false;
        }

        $array_new_tasks = array();
        if($data_task !=false) {
            foreach ($data_task as $tk=>$tv) {
                $array_new_tasks[$tv['pid']][$tv['id']] = $tv;
            }
        }

        if($array_new_tasks) {
            $data['tasks1']= $array_new_tasks;
        }
        else {
            $data['tasks1']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $curators = $this->task_model->get_curators();

        if($curators) {
            $data['curators']= $curators;
        }
        else {
            $data['curators']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {

            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }


        $comments = $this->message_model->getPublishComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }


        $overtasks = $this->task_model->getOverdueTasks($data['user']->id);

        if($overtasks) {
            $data['over_tasks']= $overtasks;
        }
        else {
            $data['over_tasks']=false;
        }

        $readytasks = $this->task_model->getReadyTasks($data['user']->id);

        if($readytasks) {
            $data['ready_tasks']= count($readytasks);
        }
        else {
            $data['ready_tasks']=0;
        }

        $comptasks = $this->task_model->getCompTasks($user->id);

        if($comptasks) {
            $data['comp_tasks']= $comptasks;
            $totalTimeCompleteTask = 0;
            foreach($comptasks as $ck => $cv) {
                $totalTimeCompleteTask+=$cv['tts'];
            }
            //            in hours
            $data['total_task_done']=$totalTimeCompleteTask/60;
        }
        else {
            $data['comp_tasks']=false;
            $data['total_task_done']=0;
        }

//      Calculate total time of completed tasks

        $processtasks = $this->task_model->getprocessTasks($user->id);

        if($processtasks) {
            $data['process_tasks']= $processtasks;
        }
        else {
            $data['process_tasks']=false;
        }

        $approvetasks = $this->task_model->getApproveTasks($user->id);

        if($approvetasks) {
            $data['approve_tasks']= $approvetasks;
        }
        else {
            $data['approve_tasks']=false;
        }

        $avatars = $this->admin_model->getAvatars();

        if($avatars) {
            $data['avatars']= $avatars;
        }
        else {
            $data['avatars']=false;
        }
        $data['users_title_roles']= $this->admin_model->get_users_title_roles();
        $data['get_users_online'] = $this->admin_model->get_users_online();
        $data['users_names']= $this->admin_model->get_users_names();
        $this->session->set_userdata('user_id', $this->admin_model->get_user_id($_SESSION['username']));
        $data['introduce'] = $this->admin_model->getIntroduce($_SESSION['username']);
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['client'] = $this->admin_model->get_own_client();
        $data['users'] = $this->admin_model->get_users();
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
        $this->load->view('templates/navtop_view', $data);
        $this->load->view('templates/sidebar_view', $data);
        $this->load->view('templates/dashboard_view', $data);
        $this->load->view('templates/footer_view',$data);
        $this->load->view('templates/settings_view', $data);
    }

    /**
     * PROJECTS PAGE
     */

    function projects() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_title_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $projects= $project_array;
        }
        else {
            $projects=false;
        }

        $projects_key = array();


        $user = $this->admin_model->get_user_id($_SESSION['username']);
       if($projects !== FALSE) {

           foreach( $projects as $dk=>$dv) {

               $assign = $this->project_model->getProjectsAssignUser($dv['pid'],$user->id);
               if($assign !=false) {
                   $projects_key[$dv['pid']] = $dv;
               }

           }
       }
        $data['projects'] = $projects_key;



        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $all_tasks = $this->task_model->countAllTasks($user->id);
        if($all_tasks) {
            $data['all_tasks']= $all_tasks;
        }
        else {
            $data['all_tasks']=false;
        }

        $project_all_task = array();
        if($data['all_tasks'] !== FALSE) {
            foreach ($data['all_tasks'] as $tk => $tv) {
                if ($tv['pid'] != false) {
                    $project_all_task[$tv['pid']][] = $tv;
                }
                else {
                    $project_all_task[$tv['pid']] = false;
                }
            }
        }

        $project_task = array();
        if($data['tasks'] !== FALSE) {
            foreach($data['tasks'] as $tk=>$tv) {
                if($tv['pid'] !=false) {
                    $project_task[$tv['pid']][] = $tv;
                }
                else {
                    $project_task[$tv['pid']] = false;
                }
            }

        }


        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $avatars = $this->admin_model->getAvatars();

        if($avatars) {
            $data['avatars']= $avatars;
        }
        else {
            $data['avatars']=false;
        }

        $data['project_tasks'] = $project_task;
        $data['project_all_tasks'] = $project_all_task;
        $data['users_title_roles']= $this->admin_model->get_users_title_roles();
        $data['get_users_online'] = $this->admin_model->get_users_online();
        $all_project_array = $this->project_model->get_all_projects();
        if($all_project_array) {
            $data['all_projects']= $all_project_array;
        }
        else {
            $data['all_projects']=false;
        }
        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }


        $project_all_users_array = $this->project_model->get_all_projects_user($_SESSION['username']);

        if($project_all_users_array) {
            $data['user_projects']= $project_all_users_array;
        }
        else {
            $data['user_projects']=false;
        }
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);

        if($data['user']->role ==2) {
            $this->session->set_flashdata('permission', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'. $this->lang->line('warning').'</strong> '. $this->lang->line('you_havenot_permissions').'</div>');
            redirect("dashboard");
        }

        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
        $this->load->view('templates/navtop_view', $data);
        $this->load->view('templates/sidebar_view', $data);
        $this->load->view('templates/projects_view', $data);
        $this->load->view('templates/settings_view', $data);
    }

    /**
     * TASK PAGE
     */

    function tasks() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $projects= $project_array;
        }
        else {
            $projects=false;
        }
        $projects_key = array();
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        if($projects !== FALSE) {

            foreach( $projects as $dk=>$dv) {
                $assign = $this->project_model->getProjectsAssignUser($dv['pid'],$user->id);
                if($assign !=false) {
                    $projects_key[$dv['pid']] = $dv;
                }

            }
        }
        $data['projects'] = $projects_key;

        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }

        $data['c_tasks'] = $this->task_model->countCompleteTasks();

        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $processtasks = $this->task_model->getprocessTasks($data['user']->id);

        if($processtasks) {
            $data['process_tasks']= $processtasks;
        }
        else {
            $data['process_tasks']=false;
        }

        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
        $this->load->view('templates/navtop_view', $data);
        $this->load->view('templates/sidebar_view', $data);
        $this->load->view('templates/tasks_view', $data);
        $this->load->view('templates/settings_view', $data);
    }

    /**
     * USERS ADMINISTRATION
     */

    function users() {

        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_title_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $projects= $project_array;
        }
        else {
            $projects=false;
        }
        $projects_key = array();
        if($projects !== FALSE) {

            foreach( $projects as $dk=>$dv) {
                $assign = $this->project_model->getProjectsAssignUser($dv['pid'],$user->id);
                if($assign !=false) {
                    $projects_key[$dv['pid']] = $dv;
                }

            }
        }
        $data['projects'] = $projects_key;

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['user'] = $user;
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $new_users = $this->admin_model->get_new_users();
        $data['new_users'] = $new_users;
        $data['count_new_users'] = count($new_users);
        $data['roles'] = $this->admin_model->get_roles();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);

// Set flash data

        if($data['user']->role !=5 AND $data['user']->role !=4) {
            $this->session->set_flashdata('permission', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.$this->lang->line('warning').'</strong> '. $this->lang->line('admin_manager_perm').'</div>');
            redirect("dashboard");
        }


        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
        if ($data['user']->role == 5 OR $data['user']->role == 4) {
            $this->load->view('templates/navtop_view', $data);
            $this->load->view('templates/sidebar_view', $data);
            $this->load->view('templates/settings_view', $data);
            $this->load->view('templates/users_view', $data);
            $this->load->view('templates/settings_view', $data);
        }
        elseif ($data['user']->role == 1 OR $data['user']->role == 2 OR $data['user']->role == 3) {
            $this->load->view('templates/settings_view', $data);
        }
        else {
            show_404();
        }
    }

    /**
     * USERS ADMINISTRATION
     */

    function comments() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }
        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $projects= $project_array;
        }
        else {
            $projects=false;
        }
        $projects_key = array();
        if($projects !== FALSE) {

            foreach( $projects as $dk=>$dv) {
                $user = $this->admin_model->get_user_id($_SESSION['username']);
                $assign = $this->project_model->getProjectsAssignUser($dv['pid'],$user->id);
                if($assign !=false) {
                    $projects_key[$dv['pid']] = $dv;
                }

            }
        }
        $data['projects'] = $projects_key;
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }

        $data['user_name'] = $this->admin_model->get_users_names();
        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
        $this->load->view('templates/navtop_view', $data);
        $this->load->view('templates/sidebar_view', $data);
        $this->load->view('templates/settings_view', $data);
        $this->load->view('templates/comments_view', $data);
    }

    function charts() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $data['projects']= $project_array;
        }
        else {
            $data['projects']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }
        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
        $this->load->view('templates/navtop_view', $data);
        $this->load->view('templates/sidebar_view', $data);
        $this->load->view('templates/right_float_view', $data);
        $this->load->view('templates/charts_view', $data);
    }

    /**
     * Clients
     */

    function clients() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $projects= $project_array;
        }
        else {
            $projects=false;
        }
        $projects_key = array();
        if($projects !== FALSE) {

            foreach( $projects as $dk=>$dv) {
                $user = $this->admin_model->get_user_id($_SESSION['username']);
                $assign = $this->project_model->getProjectsAssignUser($dv['pid'],$user->id);
                if($assign !=false) {
                    $projects_key[$dv['pid']] = $dv;
                }

            }
        }
        $data['projects'] = $projects_key;

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }
        $data['users_names']= $this->admin_model->get_users_names();
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['roles'] = $this->admin_model->get_roles();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        if($data['user']->role ==2 ) {
            $this->session->set_flashdata('permission', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'. $this->lang->line('warning').'</strong> '. $this->lang->line('you_havenot_permissions').'</div>');
            redirect("dashboard");
        }

        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
        $this->load->view('templates/navtop_view', $data);
        $this->load->view('templates/sidebar_view', $data);
        $this->load->view('templates/settings_view', $data);
        $this->load->view('templates/client_view', $data);
    }

    /**
     * Add client
     */

    function addclient() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }
        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $data['projects']= $project_array;
        }
        else {
            $data['projects']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }
        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $client = $this->admin_model->get_own_client($_SESSION['username']);
        $data['client'] = $client;
        $uid = $this->admin_model->get_user_id($_SESSION['username']);
        $data['user'] = $uid;
        $data['users'] = $this->admin_model->get_users();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        if ($client === FALSE) {
            if ($data['user']->role == 5 OR $data['user']->role == 4) {
                $this->load->view('templates/head_view',$data);
                if ($data['user']->helpblock == 1) {
                    $this->load->view('templates/help_block_view');
                }
                $this->load->view('templates/addclient_view', $data);
                $this->load->view('templates/settings_view', $data);
            }
            else {
                redirect(base_url() . 'error');
            }
        }
        else {
            redirect(base_url() . 'error');
        }
    }

    /**
     * deleteclient
     */

    function delete_client() {
        $cid = $this->input->post('cid');
        if (!empty($cid)) {
            $this->admin_model->delete_client($cid);
            $this->session->set_flashdata('success_delete_client', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'. $this->lang->line('success').'</strong> '. $this->lang->line('you_have_success_delete_client').'</div>');
            redirect("clients");
        }
        else {
            $this->load->view('custom404_view');
        }
    }

    /**
     * Add client form
     */

    function addclient_form() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }
        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $data['projects']= $project_array;
        }
        else {
            $data['projects']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Company title', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone number', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        if ($data['user']->role == 5 OR $data['user']->role == 4) {
            if ($this->form_validation->run() !== FALSE) {
                $title = $this->admin_model->verify_client($this->input->post('title'));
                if ($title) {
                    $this->load->view('templates/head_view',$data);
                    if ($data['user']->helpblock == 1) {
                        $this->load->view('templates/help_block_view');
                    }
                    $this->load->view('templates/addclient_view', $data);
                    $this->load->view('templates/settings_view', $data);
                }
                else {
                    if ($query = $this->admin_model->create_client()) {
                        $this->session->set_flashdata('success_create_client', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'. $this->lang->line('success').'</strong> '. $this->lang->line('you_have_success_create_client').'</div>');
                        redirect("clients");
                    }
                }
            }
            else {
                $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
                $data['users'] = $this->admin_model->get_users();
                $this->load->view('templates/head_view',$data);
                if ($data['user']->helpblock == 1) {
                    $this->load->view('templates/help_block_view');
                }
                $this->load->view('templates/addclient_view', $data);
                $this->load->view('templates/settings_view', $data);
            }
        }
        else {
            redirect(base_url() . 'error');
        }
    }

    /**
     * Team view
     */

    function team() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_title_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $data['projects']= $project_array;
        }
        else {
            $data['projects']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['roles'] = $this->admin_model->get_roles();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }

        $this->load->view('templates/team_view', $data);
        $this->load->view('templates/settings_view', $data);
    }

    /**
     * Profile view
     */

    function profile() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }
        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $projects= $project_array;
        }
        else {
            $projects=false;
        }
        $projects_key = array();
        if($projects !== FALSE) {

            foreach( $projects as $dk=>$dv) {
                $user = $this->admin_model->get_user_id($_SESSION['username']);
                $assign = $this->project_model->getProjectsAssignUser($dv['pid'],$user->id);
                if($assign !=false) {
                    $projects_key[$dv['pid']] = $dv;
                }

            }
        }
        $data['projects'] = $projects_key;

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }
        $data['users_names']= $this->admin_model->get_users_names();
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $data['phones'] = $this->admin_model->get_phones($_SESSION['username']);
        $data['emails'] = $this->admin_model->get_emails($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['password'] =  $this->admin_model->get_password($_SESSION['username']);
        $roles = $this->admin_model->get_roles();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $this->load->view('templates/head_view',$data);
        if ($data['user']->helpblock== 1) {
            $this->load->view('templates/help_block_view');
        }
        foreach ($roles as $rk => $rv) {
            $roles_array[$rv['rid']] = $rv['title'];
        }
        $data['user_role']=$data['user']->role;
        $data['roles'] = $roles_array;
        $this->load->view('templates/profile_view', $data);
        $this->load->view('templates/settings_view', $data);
    }

    /**
     * Update profile
     */

    function update_profile() {
        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }
        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $data['projects']= $project_array;
        }
        else {
            $data['projects']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['password'] =  $this->admin_model->get_password($_SESSION['username']);
        $data['current_language'] = $this->session->userdata('site_lang');
        $this->load->model('admin_model');
//      delete additional emails
        $email_del = $this->input->post('del_email');
        if (!empty($email_del[0])) {
            foreach ($email_del as $v) {
                $this->admin_model->delete_member_email($v);
            }
        }
//      delete additionals phones
        $phone_del = $this->input->post('del_phone');
        if (!empty($phone_del[0])) {
            foreach ($phone_del as $v) {
                $this->admin_model->delete_member_phone($v);
            }
        }

        $first = $this->input->post('first_name');
        $last = $this->input->post('last_name');
//        $role = $this->input->post('role-select');
        if ($first == FALSE && $last == FALSE) {
            $this->error();
        }
        else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
            $password = $this->input->post('password');
            if($password =='') {
                $this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]|md5');
                $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|matches[password]');
            }
            else {
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|md5');
                $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
            }
            $this->load->model('admin_model');
            $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
            $id = $data['user']->id;
            if ($this->form_validation->run() !== FALSE) {
                $this->load->model('admin_model');
                $password = $this->input->post('password');
                if($password !='') {
                    $this->admin_model->updatePassword($id, $password);
                }
                $phone_add = $this->input->post('add_phone');
                $email_add = $this->input->post('add_email');
                if (!empty($phone_add[0])) {
                    if ($query = $this->admin_model->insert_member_phone($id) && $query = $this->admin_model->update_member($id)) {

                    }
                    $this->session->set_flashdata('success_update_profile', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'. $this->lang->line('success').'</strong> '. $this->lang->line('you_have_success_update_profile').'</div>');
                    redirect("profile");
                }
                elseif (!empty($email_add[0])) {
                    if ($query = $this->admin_model->insert_member_email($id) && $query = $this->admin_model->update_member($id)) {

                    }
                    $this->session->set_flashdata('success_update_profile', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'. $this->lang->line('success').'</strong> '. $this->lang->line('you_have_success_update_profile').'</div>');
                    redirect("profile");
                }
                else {
                    if ($query = $this->admin_model->update_member($id)) {
                            $this->session->set_flashdata('success_update_profile', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'. $this->lang->line('success').'</strong> '. $this->lang->line('you_have_success_update_profile').'</div>');
                        redirect("profile");
                    }
                }
            }
            else {
                $data['password'] =  $this->admin_model->get_password($_SESSION['username']);
                $data['current_language'] = $this->session->userdata('site_lang');
                $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
                $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
                $data['phones'] = $this->admin_model->get_phones($_SESSION['username']);
                $data['emails'] = $this->admin_model->get_emails($_SESSION['username']);
                $data['users'] = $this->admin_model->get_users();
                $roles = $this->admin_model->get_roles();
                $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
                $this->load->view('templates/head_view',$data);
                if ($data['user']->helpblock == 1) {
                    $this->load->view('templates/help_block_view');
                }
                foreach ($roles as $rk => $rv) {
                    $roles_array[$rv['rid']] = $rv['title'];

                }
                $data['user_role']=$data['user']->role;
                $data['roles'] = $roles_array;
                $this->load->view('templates/profile_view', $data);
                $this->load->view('templates/settings_view', $data);
            }
        }
    }

    function error() {
        $this->load->view('custom404_view');
    }

    function group_chat() {

        $roles_array = $this->admin_model->get_roles();
        $roles = array();
        foreach ($roles_array as $rk => $rv) {
            $roles[] = $rv;
        }

        $task_types = $this->task_model->getTaskTypes();
        if($task_types) {
            $data['task_types']= $task_types;
        }
        else {
            $data['task_types']=false;
        }
        $user = $this->admin_model->get_user_id($_SESSION['username']);
        $task_array = $this->task_model->countTasks($user->id);
        if($task_array) {
            $data['tasks']= $task_array;
        }
        else {
            $data['tasks']=false;
        }

        $projects_froze = $this->project_model->checkProjectFroze();
        if($projects_froze) {
            $data['projects_froze']= $projects_froze;
        }
        else {
            $data['projects_froze']=false;
        }

        $imps = $this->task_model->get_imps();

        if($imps) {
            $data['imps']= $imps;
        }
        else {
            $data['imps']=false;
        }

        $project_title_array = $this->project_model->get_project_title();
        if($project_title_array) {
            $data['project_title']= $project_title_array;
        }
        else {
            $data['project_title']=false;
        }

        $project_array = $this->project_model->get_projects();
        if($project_array) {
            $data['projects']= $project_array;
        }
        else {
            $data['projects']=false;
        }

        $comments = $this->message_model->getComments();
        if($comments) {
            $data['comments']= $comments;
        }
        else {
            $data['comments']=false;
        }

        $events_array = $this->project_model->readAllEvents();
        if($events_array) {
            $data['all_events']= $events_array;
        }
        else {
            $data['all_events']=false;
        }
        $data['client'] = $this->admin_model->get_own_client($_SESSION['username']);
        $data['user_name'] = $this->admin_model->get_users_names();
        $data['users_names']= $this->admin_model->get_users_names();
        $data['roles'] = $roles;
        $data['current_language'] = $this->session->userdata('site_lang');
        $data['user'] = $this->admin_model->get_user_id($_SESSION['username']);
        $data['users'] = $this->admin_model->get_users();
        $data['roles'] = $this->admin_model->get_roles();
        $data['avatar'] = $this->admin_model->get_avatar($_SESSION['username']);
        $this->load->view('templates/head_view',$data);
        if($data['user']->id !=14) {
            $this->session->set_flashdata('permission', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong> You do not have permission to this section.</div>');
            redirect("dashboard");
        }

        if ($data['user']->helpblock == 1) {
            $this->load->view('templates/help_block_view');
        }
            $this->load->view('templates/groupchat_view', $data);
            $this->load->view('templates/settings_view', $data);

    }

}
