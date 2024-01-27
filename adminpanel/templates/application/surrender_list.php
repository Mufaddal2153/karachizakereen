<div id="page-inner">
    <h3 class="page-header">
    <i class="fa fa-users"></i>
        GCP Surrendered
    </h3>
    <div class="panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-filter"></i>
             Filter 
        </div>
        <div class="panel-body">
            <div class="form-block">
                <form class="form-horizontal" role="form" id="user-setup-form">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label" for="filter_company">Company:</label>
                        <div class="col-sm-8">
                            <?php echo CHtml::dropDownList('filter_company', $aVal['filter_company'], $aCompanies, array('class' => 'form-control chzn-select','prompt' => 'Select Option')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-4 control-label" for="filter_gcptype">GCP Type:</label>
                        <div class="col-sm-8">
                        <?php echo CHtml::dropDownList('filter_gcptype', $aVal['filter_gcptype'], $aGCPTypes, array('class' => 'form-control chzn-select','prompt' => 'All')); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-6">
                        <label class="col-sm-4 control-label" for="filter_status">Status:</label>
                        <div class="col-sm-8">
                        <?php echo CHtml::dropDownList('filter_status', $aVal['filter_status'], $aStatus, array('class' => 'form-control chzn-select','prompt' => 'Select Option')); ?>
                        </div>
                    </div>
                </div>
                <div class="pull-right text-right col-sm-4">
                    <button id="filter" type="submit" name="submit" class="btn btn-info filter"><i class="glyphicon glyphicon-filter"></i> Filter </button>
                    <a id="reset" href="<?php echo HTTP_SERVER ?>application/surrenders" class="btn btn-warning"><i class="glyphicon glyphicon-recycle"></i> Reset </a>
                </div>   
                </form>
            </div>
        </div>
    </div>
    <div id="messageflash"></div>
    <?php if (isset($flash['errors']) && $flash['errors']) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success']) && $flash['success']) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message']) && $flash['message']) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bars"></i>
             List Members
        </div>
        <div class="panel-body show" style="display:none;">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th width="2">S.No</th>
                            <th>Application #</th>
                            <th>Company Name</th>
                            <th>GCP Type</th>
                            <th>GTINs Package</th>
                            <th>Cancel Date</th>
                            <th>Status</th>   
                            <th width="4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aResults as $i => $aResult): ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $aResult['application_number'];?></td>
                            <td><?php echo $aResult['company_name'] ;?></td>
                            <td><?php echo $aResult['gcp_type'] ?></td>
                            <td><?php echo $aResult['package'] ?></td>
                            <td><?php echo qsDateFormat($aResult['cancel_date']);?></td>
                            <td><?php echo isset($aStatus[$aResult['status_id']])?$aStatus[$aResult['status_id']]:'Pending';?></td>
                            <td width="10%">
                                <div class="btn-group">
                                    <?php if(checkResourcePermission('/application/surrender','u')): ?>
                                        <a href="<?php echo HTTP_SERVER; ?>application/surrender/<?php echo $aResult['application_id'];?>/<?php echo $aResult['id'];?>" class="btn btn-xs btn-warning" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        endforeach; 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
</div>
  