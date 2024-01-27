<?php if (isset($flash['success'])) : ?>
    <div class="alert alert-success"><?php echo $flash['success']; ?></div>
<?php endif; ?>

<h2>Admin Panel</h2>

<div class="panel panel-default">
    <div class="panel-body main-icons">
        <div class="text-center">
            <a href="#" class="clear-log button"><i class="fa fa-times"></i> Clear Log</a>
            <a href="#" class="clear-schedule button"><i class="fa fa-times"></i> Clear Schedule</a>
        </div>
        <hr />
        <div class="col-sm-4 col-md-4 form-group">
            <a class="icon event" href="<?php echo CURR_DIR.'event'?>"><span>Event Management</span></a>
        </div>
        <div class="col-sm-4 col-md-4 form-group">
            <a class="icon time" href="<?php echo CURR_DIR.'eventschedule' ?>"><span>Time Management</span></a>
        </div>
        <div class="col-sm-4 col-md-4 form-group">
            <a class="icon schedule" href="<?php echo CURR_DIR.'zakereen'?>"><span>Schedule Management</span></a>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div id='calendar'></div>
    </div>
</div>

<script type="text/javascript">
    var aEvents = <?php echo $events; ?>;
</script>