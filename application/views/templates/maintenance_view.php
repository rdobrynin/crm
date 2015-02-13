<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Maintenance page</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php print(base_url());?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="<?php print(base_url());?>css/error.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="container">
    <div class="page-404">
        <?php echo $this->session->flashdata('maintenance'); ?>
        <a href="<?php print(base_url());?>logout" class="btn btn-primary"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
    </div>
</div>

<!-- JavaScript -->
<script src="<?php print(base_url());?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php print(base_url());?>assets/js/bootstrap.min.js"></script>
<script src="<?php print(base_url());?>js/script.js"></script>
</body>
</html>
