<div id="page-inner">
    <h3 class="page-header">
        <i class="fa fa-barcode"></i>
            Applications 
        <a href="<?php echo HTTP_SERVER; ?>application/new" class="pull-right btn btn-success"><i class="fa fa-plus-square"></i> Add New Application</a>
    </h3>
    <?php if (isset($flash['errors']) && $flash['errors']) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success']) && $flash['success']) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message'])) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>
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
                        <div class="col-sm-8 company_filter">
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
                    <a id="reset" href="<?php echo HTTP_SERVER ?>application" class="btn btn-warning"><i class="glyphicon glyphicon-recycle"></i> Reset </a>
                </div>   
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bars"></i>
             List Applications
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover small-font" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Application Number</th>
                            <th>Application Type</th>
                            <th>Company Name</th>
                            <th>Package</th>
                            <th>GCP Type</th>
                            <th>Package Amount</th>
                            <th>Entrance Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $position=1;
                            foreach($application as $result):
                        ?>
                        <tr>
                            <td width="3"><?php echo $position++; ?></td>
                            <td><?php echo $result->application_number; ?></td>
                            <td><?php echo $result->application_type; ?></td>
                            <td><?php echo $result->cname; ?></td>
                            <td><?php echo $result->package; ?></td>
                            <td class="center"><?php echo $result->gcp_type ?></td>
                            <td class="text-right"><?php echo $result->package_amount; ?></td>
                            <td class="text-right"><?php echo $result->entrance_package_amount; ?></td>
                            <td class="center">
                                <div class="btn-group">
                                <?php if(checkResourcePermission('/invoice/view_application','v')): ?>
                                    <a href="<?php echo HTTP_SERVER ?>invoice/view_application/<?php echo $result->id; ?>" class="btn btn-default btn-sm" id="surrender-app" title="View Application"><i class="glyphicon glyphicon-list-alt"></i></a>
                                <?php endif; ?>
                                <?php if(checkResourcePermission('/application','v')): ?>
                                    <a href="<?php echo HTTP_SERVER ?>application/<?php echo $result->id; ?>" class="btn btn-info btn-sm" id="surrender-app" title="Edit Application"><i class="glyphicon glyphicon-edit"></i></a>
                                <?php endif; ?>
                                <?php if(!$result->is_canceled && $result->status_id == $iGCPSurrender && checkResourcePermission('/application/surrender','c')): ?>
                                    <a href="<?php echo HTTP_SERVER ?>application/surrender/<?php echo $result->id; ?>" class="btn btn-danger btn-sm" id="surrender-app" title="Surrender"><i class="glyphicon glyphicon-trash"></i></a>
                                <?php endif; ?>
                                </div>
                            </td> 
                        </tr>
                         <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
