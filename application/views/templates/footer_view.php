<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top mirrorup" role="button"><span class="icon-rightarrow"></span></a>
<!--<div class="bench">test: --><?php //echo $this->benchmark->elapsed_time();?><!--&nbsp;sec</div>-->

<?php //if ($user[0]['role'] ==5 OR $user[0]['role']==4 OR $user[0]['role']==2): ?>
<?php if ($user->role==2): ?>
<div class="time-wrapper">
    <div class="timer" style="width: auto;">
        <i class="fa fa-clock-o pull-left" id="clock-bottom"></i>&nbsp;
        <span id="task-timer">00:00</span>
        <button class="btn btn-default btn-md" id="play-timer" style="padding: 3px 12px; float: left;">Play</button>
        <span id="task-timer-pause"><a href="javascript:void(0);"><i class="fa fa-pause"></i></a></span>
        <span id="task-timer-stop"><a href="javascript:void(0);"><i class="fa fa-stop"></i></a></span>
        <span id="task-timer-clear"><a href="javascript:void(0);"><i class="fa fa-times"></i></a></span>

    </div>
</div>
<?php endif ?>
<!---->
<?php include('quick_message.php');?>
<!--<!-- JavaScript -->-->
<?php include('modals/modal_view.php');?>
<?php include('modals/modal_task.php');?>
<?php include('modals/modal_confirmation.php');?>
<script data-main="<?php print(base_url());?>js/app_main.js" src="<?php print(base_url());?>assets/js/require.js"></script>
</body>

</html>
