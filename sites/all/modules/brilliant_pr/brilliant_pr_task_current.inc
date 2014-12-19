<?php

/** Info page task
 * @return mixed
 */

function brilliant_pr_task_info_page() {
  global $user;
  //Create a list of headers for Html table

  if (in_array('administrator', $user->roles)) {
    $header = array(
      array('data' => t('Task#'), 'field' => 'tid', 'sort' => 'asc'),
      array('data' => t('Task\'s title'), 'field' => 'title'),
      array('data' => t('Project ref'), 'field' => 'project_ref'),
      array('data' => t('Status'), 'field' => 'status'),
      array('data' => t('CTS'), 'field' => 'curr_time'),
      array('data' => t('Implementor'), 'field' => 'implementor'),
      array('data' => t('Curator'), 'field' => 'curator'),
      array('data' => t('Created'), 'field' => 'created'),
      array('data' => t('DDT'), 'field' => 'dead_time'),
      array('data' => t('OPT'), 'field' => 'opt_time'),
    );
  }
  elseif (in_array('implementor', $user->roles)) {
    $header = array(
      array('data' => t('Task#'), 'field' => 'tid', 'sort' => 'asc'),
      array('data' => t('Task\'s title'), 'field' => 'title'),
      array('data' => t('Project ref')),
      array('data' => t('Status'), 'field' => 'status'),
      array('data' => t('CTS')),
      array('data' => t('Curator'), 'field' => 'curator'),
      array('data' => t('Created'), 'field' => 'created'),
      array('data' => t('DDT'), 'field' => 'dead_time'),
      array('data' => t('OPT'), 'field' => 'opt_time'),
    );
  }
  elseif (in_array('customer', $user->roles)) {
    $header = array(
      array('data' => t('Task#'), 'field' => 'tid', 'sort' => 'asc'),
      array('data' => t('Task\'s title'), 'field' => 'title'),
      array('data' => t('Project ref')),
      array('data' => t('Status'), 'field' => 'status'),
      array('data' => t('CTS')),
      array('data' => t('Curator'), 'field' => 'curator'),
      array('data' => t('Created'), 'field' => 'created'),
      array('data' => t('DDT'), 'field' => 'dead_time'),
      array('data' => t('OPT'), 'field' => 'opt_time'),
    );
  }
  else {
    $header = array(
      array('data' => t('Task#'), 'field' => 'tid', 'sort' => 'asc'),
      array('data' => t('Task\'s title'), 'field' => 'title'),
      array('data' => t('Project ref')),
      array('data' => t('Status'), 'field' => 'status'),
      array('data' => t('CTS')),
      array('data' => t('Implementor'), 'field' => 'implementor'),
      array('data' => t('Created'), 'field' => 'created'),
      array('data' => t('DDT'), 'field' => 'dead_time'),
      array('data' => t('OPT'), 'field' => 'opt_time'),
    );
  }
//Create the Sql query.

  if (in_array('customer', $user->roles)) {
    $query = db_select('brilliant_pr_task', 't')
      ->extend('PagerDefault') //Pager Extender
      ->condition('status', '1', '!=') #approve task
      ->condition('status', '5', '!=') #remove tasks
      ->limit(10) //10 results per page
      ->extend('TableSort') //Sorting Extender
      ->orderByHeader($header)//Field to sort on is picked from $header
      ->fields('t', array(
        'tid',
        'title',
        'status',
        'created',
        'opt_time',
        'dead_time',
        'uid',
        'implementor',
        'curator',
        'ref',
      ));
  }
  else {
    $query = db_select('brilliant_pr_task', 't')
      ->extend('PagerDefault') //Pager Extender
      ->condition('status', '5', '!=') #remove tasks
      ->condition('status', '1', '!=') #complete tasks
      ->condition('status', '0', '!=') #approve tasks
      ->limit(10) //10 results per page
      ->extend('TableSort') //Sorting Extender
      ->orderByHeader($header)//Field to sort on is picked from $header
      ->fields('t', array(
        'tid',
        'title',
        'status',
        'created',
        'opt_time',
        'dead_time',
        'uid',
        'implementor',
        'curator',
        'ref',
      ));
  }
  $results = $query
    ->execute();
  $rows = array();

  foreach ($results as $entity) {
    if ($user->uid && $account = user_load($entity->uid)) {
      $implementor = user_load_by_name($entity->implementor);
      $curator = user_load_by_name($entity->curator);
      $project_entity = brilliant_pr_project_load($pid = $entity->ref);

      if($project_entity != null) {

      if ($user->name == $entity->curator) {
        $rows[] = array(
          'data' => array(
            $entity->tid,
            l($entity->title, 'entity/brilliant_pr_task/basic/' . $entity->tid),
            isset($project_entity->pid) ? l($project_entity->title, 'entity/brilliant_pr_project/basic/' . $project_entity->pid) : '-',
              '<span class="label '.task_status_label($entity->status).'">'.brilliant_pr_task_status_position_title($entity->status).'</span>',
            '-',
            get_name($implementor->uid),
            format_date($entity->created),
            date('Y-m-d H:i:s', $entity->dead_time),
            date('Y-m-d H:i:s', $entity->opt_time),
          )
        );
        #end row[]
      }
      elseif ($user->name == $project_entity->customer_name) {
        $rows[] = array(
          'data' => array(
            $entity->tid,
            l($entity->title, 'entity/brilliant_pr_task/basic/' . $entity->tid),
            isset($project_entity->pid) ? l($project_entity->title, 'entity/brilliant_pr_project/basic/' . $project_entity->pid) : '-',
            '<span class="label '.task_status_label($entity->status).'">'.brilliant_pr_task_status_position_title($entity->status).'</span>',
            '-',
            get_name($curator->uid),
            format_date($entity->created),
            date('Y-m-d H:i:s', $entity->dead_time),
            date('Y-m-d H:i:s', $entity->opt_time),
          )
        );
        #end row[]
      }
      elseif (in_array('administrator', $user->roles)) {
        $rows[] = array(
          'data' => array(
            $entity->tid,
            l($entity->title, 'entity/brilliant_pr_task/basic/' . $entity->tid),
            isset($project_entity->pid) ? l($project_entity->title, 'entity/brilliant_pr_project/basic/' . $project_entity->pid) : '-',
            '<span class="label '.task_status_label($entity->status).'">'.brilliant_pr_task_status_position_title($entity->status).'</span>',
            '-',
            get_name($implementor->uid),
            get_name($curator->uid),
            format_date($entity->created),
            date('Y-m-d H:i:s', $entity->dead_time),
            date('Y-m-d H:i:s', $entity->opt_time),
          )
        );
        #end row[]
      }
      elseif ($user->name == $entity->implementor) {
        $rows[] = array(
          'data' => array(
            $entity->tid,
            l($entity->title, 'entity/brilliant_pr_task/basic/' . $entity->tid),
            isset($project_entity->pid) ? l($project_entity->title, 'entity/brilliant_pr_project/basic/' . $project_entity->pid) : '-',
            '<span class="label '.task_status_label($entity->status).'">'.brilliant_pr_task_status_position_title($entity->status).'</span>',
            '-',
            get_name($curator->uid),
            format_date($entity->created),
            date('Y-m-d H:i:s', $entity->dead_time),
            date('Y-m-d H:i:s', $entity->opt_time),
          )
        );
        #end row[]
      }

      }
    }
  } #end foreach


if (isset($project_entity)) {
  if ($user->name == $project_entity->customer_name || $user->name == $entity->implementor || in_array('administrator', $user->roles) ||
    $user->name == $project_entity->curator) {
    $content = '';
    $html = $content . theme('table',
        array(
          'header' => $header,
          'rows' => $rows,
          'caption' => '<h3>' . t('Current tasks') . '</h3>',
          //Optional Caption for the table
          'sticky' => TRUE,
          //Optional to indicate whether the table headers should be sticky
          'empty' => '<div class="alert alert-info a-message">'.t('Not found any current tasks.') .'</div>',
          //Optional empty text for the table if result test is empty
        )
      );
    $html .= theme('pager',
      array(
        'tags' => array(),
      )
    );
  }
  else {
    $content = '<div class="alert alert-info a-message alert-dismissable">'.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.t('Not found any current task.') .'</div>';
    $html = $content;

  }
}
  else {
    $content = '<div class="alert alert-info a-message alert-dismissable">'.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.t('Not found any current task.') .'</div>';
    $html = $content;
  }
  return ($html);
}
