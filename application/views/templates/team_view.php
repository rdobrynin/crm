<!-- Page content -->
<div class="page-content-wrapper">
  <div class="content-header">
    <h1>
      <a id="menu-toggle" href="#" class="btn btn-default"><i
          class="icon-reorder"></i></a>
      Team
    </h1>
  </div>
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content">
    <div class="container-fluid">
        <pre>
        <?php var_dump($users); ?>
            </pre>
      <?php foreach ($users as $ak => $u): ?>
        <ul>
          <?php if (($u['status'] == 1)): ?>
            <li><span
                class="label label-xs label-success label-round"></span><?php print($u['first_name'] . ' ' . $u['last_name']); ?>
            </li>
          <?php else: ?>
            <li><span
                class="label label-xs label-default label-round"></span><?php print($u['first_name'] . ' ' . $u['last_name']); ?>
            </li>
          <?php endif; ?>
        </ul>
      <?php endforeach ?>
    </div>
  </div>
</div>
</div>
