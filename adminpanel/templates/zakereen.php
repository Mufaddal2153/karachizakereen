
<h1>Schedule Management</h1>
<h2>Schedule Management</h2>

<?php if (isset($flash['success'])) : ?>
    <div class="alert alert-success"><?php echo $flash['success']; ?></div>
<?php endif; ?>
<?php if(!isset($aResults) && isset($aParties)): ?>
    
    <div class="panel panel-default form-horizontal">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span> Filter</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <form class="form-horizontal" id="schedule_report">
                        <label>Party Name:</label>
                        <div class="form-group">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <?php echo CHtml::dropDownList('party','',$aParties, array('class' => 'form-control chzn-select','prompt' => 'Choose Party')); ?>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <button type="button" class="btn btn-primary" id="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form class="form-horizontal" id="schedule_csv" method="POST" enctype="multipart/form-data" action='<?php echo CURR_DIR.'schedule_csv' ?>'>
                        <label>Import Schedule: <a href="https://www.karachizakereen.org/schedule/import-schedule-sample.csv" download="">Download Sample</a></label>
                        <div class="form-group">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="file" name="schedule_file" class="form-control" id="file" class="file"/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-upload"></span> Import</button>
                            </div>
                        </div>
                        <?php /*<label>&nbsp;</label>
                        <button type="button" onclick="location.href='<?php echo CURR_DIR.'adminindex'?>'" class="btn btn-warning">Back</button>*/ ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form id="schedule_form" method="post" action="" class="form hide">
        <div class="panel panel-default form-horizontal">
            <div class="panel-body">
                <div class="text-right">
                    <button type="submit" name="submit" id="schedule_submit" class="btn btn-success" value="create">Save</button>
                </div>

                <hr />

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="schedule_table">
                        <thead>
                            <tr>
                                <th class="text-center">Urus / Majlis Title</th>
                                <th class="text-center">Mohalla</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <?php echo CHtml::dropDownList('target[0][event_id]','',$aEvents, array('class' => 'form-control event','prompt' => 'Choose Event')); ?>
                                </td>
                                <td>
                                	<?php echo CHtml::dropDownList('target[0][mohalla_id]','',$aMohalla, array('class' => 'form-control mohalla','prompt' => 'Choose Mohalla')); ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-md btn-primary" id="remove_schedule">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="hidden">
                            <tr>
                            <td>
                            <?php echo CHtml::dropDownList('target[-1][event_id]','',$aEvents, array('class' => 'form-control event','prompt' => 'Choose Event')); ?>
                            </td>
                                
                                <td>
                                	<?php echo CHtml::dropDownList('target[-1][mohalla_id]','',$aMohalla, array('class' => 'form-control mohalla','prompt' => 'Choose Mohalla')); ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-md btn-primary" id="remove_schedule">Remove</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <hr />

                <div class="text-center">
                    <button type="button" class="btn btn-info" id="add_schedule">Add New Row</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        jQuery('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
    </script>

<?php endif; ?>