<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button"><span class="glyphicon glyphicon-chevron-up"></span></a>
<!--<div class="bench">test: --><?php //echo $this->benchmark->elapsed_time();?><!--&nbsp;sec</div>-->

<?php if ($user[0]['role'] ==5 OR $user[0]['role']==4 OR $user[0]['role']==2): ?>
<div class="time-wrapper">
    <div class="timer" style="width: auto;">
        <i class="fa fa-clock-o pull-left" id="clock-bottom"></i>&nbsp;
        <span id="task-timer">00:00</span>
        <button class="btn btn-default btn-md" id="play-timer" style="padding: 3px 12px; float: left;">Play</button>
        <span id="task-timer-pause"><a href="#"><i class="fa fa-pause"></i></a></span>
        <span id="task-timer-stop"><a href="#"><i class="fa fa-stop"></i></a></span>

    </div>
</div>
<?php endif ?>
<!-- JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-switch.min.js"></script>
<script src="assets/js/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/ajaxfileupload.js"></script>
<script src="js/script.js"></script>
<script src="assets/js/bootstrap-tooltip.js"></script>
<script src="assets/js/bootstrap-confirmation.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/jquery.datetimepicker.js"></script>
<?php include('modals/modal_view.php');?>
<?php include('modals/modal_task.php');?>
<?php include('timer.php');?>
<!-- Custom JavaScript for the Menu Toggle -->
<script>
        $('.selectpicker').selectpicker({
            style: 'btn-special',
            size: 14
        });
</script>
<?php include('ajax.php');?>
<?php include('interval.php');?>
</body>

</html>
