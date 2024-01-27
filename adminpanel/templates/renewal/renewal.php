<div id="page-inner">
    <h3 class="page-header">
    <i class="fa fa-clock-o"></i>
        Renewals
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
                        <label class="col-sm-2 control-label" for="filter_from">From :</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="filter_from" value="<?php echo $aVal['filter_from'] ?>" />
                        </div>
                        <label class="col-sm-2 control-label" for="filter_to">To :</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="filter_to" value="<?php echo $aVal['filter_to'] ?>" />
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-2 control-label" for="filter_company">Company:</label>
                        <div class="col-sm-3">
                           <?php echo CHtml::dropDownList('filter_company', $aVal['filter_company'], $CompanyName, array('class' => 'form-control chzn-select','prompt' => '')); ?>
                        </div>
                   <?php /* 
                        <label class="col-sm-4 control-label" for="filter_product_category">Category:</label>
                        <div class="col-sm-8">
                        <?php echo CHtml::dropDownList('filter_product_category', $aVal['filter_product_category'],$Categories, array('class' => 'form-control chzn-select','prompt' => '')); ?>
                        </div>
                </div>
                <div class="form-group">*/ ?>
                        <label class="col-sm-2 control-label" for="filter_gcptype">GCP Type:</label>
                        <div class="col-sm-3">
                        <?php echo CHtml::dropDownList('filter_gcptype', $aVal['filter_gcptype'], $aGCPTypes, array('class' => 'form-control chzn-select','prompt' => 'All')); ?>
                        </div>
                </div>
                <div class="text-right">
                    <button id="filter" type="submit" name="submit" class="btn btn-info filter"><i class="glyphicon glyphicon-filter"></i> Filter </button>
                    <a id="reset" href="<?php echo HTTP_SERVER ?>renewal" class="btn btn-warning"><i class="glyphicon glyphicon-recycle"></i> Reset </a>
                </div>   
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message'])) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-bars"></i>
             List Renewals
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th width="2">S.No</th>
                            <th>Invoice No.</th>
                            <th>Application No.</th>
                            <th>Company Name</th>
                            <th>Renewal Date</th>
                            <th>GCP Type</th>
                            <th>GTIN Numbers</th>
                            <th>Status</th>   
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($Invoices as $i => $result): ?>
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo $result->invoice_number; ?></td>
                                <td><?php echo $result->application_number; ?></td>
                                <td><?php echo $result->company_name; ?></td>
                                <td><?php echo qsDateFormat($result->renewal_date); ?></td>
                                <td><?php echo $result->gcp_type; ?></td>
                                <td><?php echo $result->package; ?></td>
                                <td><?php echo $result->status_id==1?'Approved':'Pending'; ?> </td>
                                <td class="center">
                                    <div class="btn-group">
                                        <a href="<?php echo HTTP_SERVER; ?>send_renewal/<?php echo $result->id; ?>" class="btn btn-sm btn-warning" title="Reminder Invoice"><i class="glyphicon glyphicon-list-alt"></i></a>
                                        <a href="<?php echo HTTP_SERVER; ?>invoice/view_invoice/<?php echo $result->id; ?>" title="Reminder Letter" class="btn btn-sm btn-info"><i class="fa fa-envelope-o"></i></a>
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