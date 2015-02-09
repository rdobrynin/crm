<!-- Page content -->
<?php include('navtop_view.php'); ?>
<?php include('sidebar_view.php'); ?>
<div class="page-content-wrapper">
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Team</p>

              <div class="row">
                  <div class="col-md-3 col-sm-6">
                      <div class="well well-sm" style="background-color: transparent; border-color: #BDBDBD;">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#">
                                  <img class="media-object" src="//placehold.it/80">
                              </a>

                              <div class="media-body">
                                  <h4 class="media-heading">John Doe</h4>

                                  <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span>
                                  </p>

                                  <p>
                                      <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>
                                          Message</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-3 col-sm-6">
                      <div class="well well-sm" style="background-color: transparent; border-color: #BDBDBD;">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#">
                                  <img class="media-object" src="//placehold.it/80">
                              </a>

                              <div class="media-body">
                                  <h4 class="media-heading">John Doe</h4>

                                  <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span>
                                  </p>

                                  <p>
                                      <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>
                                          Message</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-3 col-sm-6">
                      <div class="well well-sm" style="background-color: transparent; border-color: #BDBDBD;">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#">
                                  <img class="media-object" src="//placehold.it/80">
                              </a>

                              <div class="media-body">
                                  <h4 class="media-heading">John Doe</h4>

                                  <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span>
                                  </p>

                                  <p>
                                      <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>
                                          Message</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-3 col-sm-6">
                      <div class="well well-sm" style="background-color: transparent; border-color: #BDBDBD;">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#">
                                  <img class="media-object" src="//placehold.it/80">
                              </a>

                              <div class="media-body">
                                  <h4 class="media-heading">John Doe</h4>

                                  <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span>
                                  </p>

                                  <p>
                                      <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>
                                          Message</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-3 col-sm-6">
                      <div class="well well-sm" style="background-color: transparent; border-color: #BDBDBD;">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#">
                                  <img class="media-object" src="//placehold.it/80">
                              </a>

                              <div class="media-body">
                                  <h4 class="media-heading">John Doe</h4>

                                  <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span>
                                  </p>

                                  <p>
                                      <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>
                                          Message</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-3 col-sm-6">
                      <div class="well well-sm" style="background-color: transparent; border-color: #BDBDBD;">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#">
                                  <img class="media-object" src="//placehold.it/80">
                              </a>

                              <div class="media-body">
                                  <h4 class="media-heading">John Doe</h4>

                                  <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span>
                                  </p>

                                  <p>
                                      <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>
                                          Message</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-3 col-sm-6">
                      <div class="well well-sm" style="background-color: transparent; border-color: #BDBDBD;">
                          <div class="media">
                              <a class="thumbnail pull-left" href="#">
                                  <img class="media-object" src="//placehold.it/80">
                              </a>

                              <div class="media-body">
                                  <h4 class="media-heading">John Doe</h4>

                                  <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span>
                                  </p>

                                  <p>
                                      <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span>
                                          Message</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>





                  <!-- Keep all page content within the page-content inset div! -->
<div class="col-sm-12">

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
    </div>
</div>
<?php include('logs_view.php'); ?>
</div>
<?php include('add_role_view.php'); ?>
<?php include('right_float_view.php'); ?>
<?php include('footer_view.php'); ?>
