<!-- Page content -->
<div class="page-content-wrapper">
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
    <h3>Tasks&nbsp;<span class="curr-project"></span></h3>
      <?php if ($tasks != FALSE): ?>
          <div class="row-fluid">
              <div class="panel panel-default">
                  <div class="panel-body-table">
                      <div class="table-responsive">
                          <table class="table table-condensed">
                              <thead>
                              <tr>
                                  <th width="5%" class="text-left">#ID</th>
                                  <th width="15%" class="text-left" style="border-left: 1px solid #ddd;">Created</th>
                                  <th width="5%" class="text-" style="border-left: 1px solid #ddd;">Label</th>
                                  <th width="15%" class="text-left" style="border-left: 1px solid #ddd;">Title</th>
                                  <th width="20%" class="text-left" style="border-left: 1px solid #ddd;">Description</th>
                                  <th width="10%" class="text-left" style="border-left: 1px solid #ddd;">Status</th>
                                  <th width="15%" class="text-left" style="border-left: 1px solid #ddd;">Due to</th>
                                  <th width="5%" class="text-left" style="border-left: 1px solid #ddd;">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($tasks as $tk => $tv): ?>
                                  <tr>
                                      <td><?php print($tv['id']); ?></td>
                                      <td><span class="muted"><?php print($tv['date_created']); ?></span></td>
                                      <td><span class="label <?php print(task_type_label($tv['label'])); ?> label-xs"><?php print($task_types[$tv['label']]); ?></span></td>
                                      <td><?php print($tv['title']); ?></td>
                                      <td><span class="muted"><?php print($tv['desc']); ?></span></td>
                                      <td>
                                          <span class="label <?php print(task_status_label($tv['status'])); ?> label-xs"><?php print(task_status($tv['status'])); ?></span>
                                      </td>
                                      <td class="text-left"><?php print($tv['due_time']); ?></td>
                                      <td class="text-center"><a href="#"><i class="fa fa-pencil"></i></a>
                                      </td>
                                  </tr>
                              <?php endforeach ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      <?php endif ?>
      <!--                end last tasks-->

  </div>
</div>
<!--logs-->

<?php include('logs_view.php'); ?>
<?php include('right_float_view.php'); ?>
</div>

<?php include('footer_view.php');?>
