


<!-- Page content -->
<div class="page-content-wrapper">
  <div class="content-header">
    <h1>
      <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
      PRM Brilliant
    </h1>
  </div>
  <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
    <div class="row">
      <?php if(!empty($client)):?>
        <table class="table">
        <thead>
        <tr>
          <th style="width: 15%;">Title</th>
          <th style="width: 25%;">description</th>
          <th style="width: 10%;">Email</th>
          <th style="width: 5%;">URL</th>
          <th style="width: 8%;">Phone</th>
          <th style="width: 7%;">Address</th>
          <th style="width: 5%;">Index</th>
          <th style="width: 5%;">City</th>
          <th style="width: 5%;">Country</th>
          <th style="width: 8%;">Created</th>
          <th style="width: 7%;">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($client as $ck => $cv): ?>
          <tr id="<?php print($cv['cid']);?>">
            <td><?php print($cv['title']);?></td>
            <td><?php print(substr($cv['description'], 1,180)).' '.'...';?></td>
            <td><a href="mailto:<?php print($cv['email']);?>"><?php print($cv['email']);?></a></td>
            <td><a href="<?php print($cv['url']);?>"><?php print($cv['url']);?></a></td>
            <td><?php print($cv['phone']);?></td>
            <td><?php print($cv['address']);?></td>
            <td><?php print($cv['index']);?></td>
            <td><?php print($cv['city']);?></td>
            <td><?php print($cv['country']);?></td>
            <td><?php print($cv['created']);?></td>
            <td> <form action="<?php print(base_url());?>delete_client" method="POST">
                <input type="hidden" name="cid" value="<?php print($cv['cid']);?>">
                <span class="pull-left"><input type="submit" value="delete" class="btn btn-xs btn-danger"></span>
              </form>
              <span class="pull-right"><button class="btn btn-xs btn-success">edit</button></span></td>
          </tr>
          </tbody>
          <?php endforeach ?>
          </table>

      <?php else: ?>
        <p class="lead">You do not have any clients for a while</p>
      <?php endif?>
    </div>
  </div>
</div>
<!--logs-->

<?php include('logs_view.php'); ?>

</div>
<?php include('footer_view.php');?>
<script>
  $(function () {

  });
</script>