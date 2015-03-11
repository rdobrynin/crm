<!-- Page content -->
<div class="page-content-wrapper">
     <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
 <!-- Keep all page content within the page-content inset div! -->
  <div class="page-content inset">
    <div class="row-fluid">
        <?php echo $this->session->flashdata('success_delete_client'); ?>
        <?php echo $this->session->flashdata('success_create_client'); ?>
        <p class="lead"><?php print(lang('client_clients'))?></p>
<!--      --><?php //if(!empty($client)):?>
        <table class="table">
        <thead>
        <tr>
          <th style="width: 15%;"><?php print(lang('client_th_title'))?></th>
          <th style="width: 15%;"><?php print(lang('client_th_description'))?></th>
          <th style="width: 10%;"><?php print(lang('client_th_email'))?></th>
          <th style="width: 10%;"><?php print(lang('client_th_url'))?></th>
          <th style="width: 8%;"><?php print(lang('client_th_phone'))?></th>
          <th style="width: 7%;"><?php print(lang('client_th_address'))?></th>
          <th style="width: 5%;"><?php print(lang('client_th_index'))?></th>
          <th style="width: 5%;"><?php print(lang('client_th_city'))?></th>
          <th style="width: 5%;"><?php print(lang('client_th_country'))?></th>
          <th style="width: 8%;"><?php print(lang('client_th_created'))?></th>
            <?php if ($user->role==5 OR $user->role==4): ?>
          <th style="width: 15%;"><?php print(lang('client_th_action'))?></th>
           <?php endif?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($client as $ck => $cv): ?>
          <tr id="<?php print($cv['cid']);?>">
            <td><?php print($cv['title']);?></td>
            <td><?php print(substr($cv['description'], 0,40)).' '.'...';?></td>
            <td><a href="mailto:<?php print($cv['email']);?>"><?php print($cv['email']);?></a></td>
            <td><a href="<?php print($cv['url']);?>"><?php print($cv['url']);?></a></td>
            <td><?php print($cv['phone']);?></td>
            <td><?php print($cv['address']);?></td>
            <td><?php print($cv['index']);?></td>
            <td><?php print($cv['city']);?></td>
            <td><?php print($cv['country']);?></td>
            <td><?php print($cv['created']);?></td>
              <?php if ($user->role==5 OR $user->role==4): ?>
            <td> <form action="<?php print(base_url());?>delete_client" method="POST">
                <input type="hidden" name="cid" value="<?php print($cv['cid']);?>">
                <span class="pull-left"><input type="submit" id="btn-del-company" value="delete" class="btn btn-xs btn-danger"></span>
              </form>
              <span class="pull-left" style="margin-left: 10px;"><button id="btn-edit-company" class="btn btn-xs btn-success">edit</button></span>
            </td>
                    <?php endif?>
          </tr>
          </tbody>
          <?php endforeach ?>
          </table>
<!---->
<!--      --><?php //else: ?>
<!--        <p class="lead">You do not have any clients for a while</p>-->
<!--      --><?php //endif?>
    </div>
  </div>
</div>
<!--logs-->

<?php include('logs_view.php'); ?>
<?php include('right_float_view.php'); ?>

</div>
<?php include('footer_view.php');?>
