
<form class="form-horizontal" role="form" method="post" id="history-form" action="<?php echo HTTP_SERVER; ?>save_activity">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h4 class="panel-title pull-left">
                <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#history" aria-expanded="true" aria-controls="subscription_records">
                 <i class="fa fa-clock-o"></i> Status History
                </a>
            </h4>
            <div class="pull-right">
                <button type="button" id="submit" class=" btn btn-primary btn-sm"><i class="glyphicon glyphicon-ok"></i> Submit</button>
                <button type="button" class="btn btn-primary btn-sm hide" id="file-submit"><i class="glyphicon glyphicon-ok"></i> Submit</button>
            </div>
        <div class="clearfix"></div>
        </div>
         <div id="history" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group col-sm-7">
                <label class="col-sm-4 control-label" for="History_status_id">Status History: </label>
                    <div class="col-sm-5">
                        <?php 
                            $aOptions = array('class' => 'form-control');
                            if($status_id != null)
                                $aOptions['readonly'] = 'true';
                       ?>
                        <?php echo CHtml::dropDownList('status_id',$status_id,$aStatus, $aOptions); ?>             
                    </div>
                </div>
                <div class="form-group col-sm-5">
                <label class="col-sm-5 control-label">Notify: </label>
                    <div class="col-sm-7">
                        <select class="form-control" id="notify" name="notify">
                        <option value="1">Yes</option>
                        <option value="0" selected="selected">No</option>
                        </select>                
                    </div>
                </div>
                <input type="hidden" name="record_id" value="<?php echo $record_id; ?>" />
                <input type="hidden" name="activity_type_id" value="<?php echo $activity_type_id; ?>" />
                <input type="hidden" name="company_id" value="<?php echo $company_id; ?>" />
                <div class="clearfix"></div>
                <div class="form-group col-sm-7">
                    <label class="col-sm-4 control-label">Notes: </label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="6" id="notes" name="description"></textarea>                
                    </div>
                </div>
                <div class="form-group col-sm-5">
                <!--            <label class="col-sm-5 control-label" for="files">Add File: </label>-->
                <div class="col-sm-offset-5 col-sm-7">
                <span class="btn btn-success btn-sm fileinput-button fileinput-history">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add file...</span>
                    <input class="fileupload" type="file" name="files">
                </span>
                <br/>
                <span class="filename text-success"></span>

                    <div class="clearfix"></div>
                    <!--                --><?php //echo CHtml::fileField('files[]','',array('class' => 'form-control')); ?>
                </div>
            </div>
                 <!-- <div class="col-sm-5">
                    <span class="btn btn-success btn-sm fileinput-button fileinput-history">
                        <i class="glyphicon glyphicon-paperclip"></i>
                        <span>Upload file</span>
                    </span>
                </div> -->
                <div class="clearfix"></div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th width="10%">Date</th>
                        <th width="15%">Status</th>
                        <th>Comments</th>
                        <th width="10%">Notified</th>
                        <th width="10%">File</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listing as $result): ?>
                        <tr>
                        <td><?php echo qsDateFormat($result->created_at); ?></td>
                        <td><?php echo $result->name; ?></td>
                        <td><?php echo $result->description; ?></td>
                        <td><?php echo $result->notify==1?"Yes":"No"; ?></td>
                        <td><a href="<?php echo HTTP_FILES . '/upload/' . $result->file; ?>" download><?php echo $result->file; ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
