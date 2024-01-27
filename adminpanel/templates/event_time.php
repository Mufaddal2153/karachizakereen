<?php //d($event,1) ?>

<h1>Time Management</h1>
<h2>Time Management</h2>

<?php if (isset($flash['success'])) : ?>
    <div class="alert alert-success"><?php echo $flash['success']; ?></div>
<?php endif; ?>

<form method="post" action="<?php echo CURR_DIR.'eventsettime' ?>" class="form">
    <div class="panel panel-default form-horizontal">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span> Filter</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <label>Event Name:</label>
                    <div class="form-group">
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <select name="event_id" class="form-control chzn-select" id="event">
                                <option value="Select Event">Select Event</option>
                                <?php foreach ($event as $row ) { ?>
                                    <option value="<?php echo $row['id'] ?>"<?php if($id != null && $id == $row['id']): ?> selected="selected"<?php endif; ?>><?php echo $row['title']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <button type="button" class="btn btn-primary" id="filter_event"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4 text-right">
                   <label>&nbsp;</label>
                   <button type="button" onclick="location.href='<?php echo CURR_DIR.'adminindex'?>'" class="btn btn-warning">Back</button>
                </div>
            </div>
        </div>
    </div>

    <div id="event_form" class="panel panel-default form-horizontal hide">
        <div class="panel-body">
            <div class="text-right">
                <button type="submit" name="" id="schedule_event" class="btn btn-success" value="">Save</button>
            </div>

            <hr />

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <table class="table table-striped table-bordered table-hover vertical-middle" id="event_table">
                        <thead>
                            <tr>
                                <th class="text-center">S.No</th>
                                <th class="text-center">Mohallah Name</th>
                                <th class="text-center">Time</th>
                            </tr>
                        </thead>
                        <tbody class="event">

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    var event_id = <?php echo $id ?>;
    $(function(){
        if(event_id){
            $('#filter_event').click();
        }
    });
</script>