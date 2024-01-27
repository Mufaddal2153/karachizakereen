<div id="page-inner">
    <h3 class="page-header">
        <i class="glyphicon glyphicon-list"></i>
        Member Reporting 
        <div class="pull-right btn-group">
            <a href="<?php echo HTTP_SERVER ?>member"><button type="button" class="btn btn-s btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
        </div>
    </h3>
    <div class="middle-container">
        <div class="panel-group" id="accordion" role="tablist">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#company_details" aria-controls="collapseOne">
                        <i class="glyphicon glyphicon-info-sign"></i> Company Information</a>
                    </h4>
                <div class="clearfix"></div>
                </div>
                <div id="company_details" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Company Name:</label>
                            <div class="col-sm-4 form-control-static"><?php echo $oCompany->name;  ?></div>
                            <label class="col-sm-2 control-label">Attention Name :</label>
                            <div class="col-sm-4 form-control-static"><?php echo $oCompany->contact_name ;?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Country:</label>
                            <div class="col-sm-4 form-control-static"><?php echo $oCompany->country_name;?></div>
                            <label class="col-sm-2 control-label">City:</label>
                            <div class="col-sm-4 form-control-static"><?php echo $oCompany->city_name; ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Street Address:</label>
                            <div class="col-sm-4 form-control-static"><?php echo $oCompany->street_address?></div>
                            <label class="col-sm-2 control-label">Telephone:</label>
                            <div class="col-sm-4 form-control-static"><?php echo $oCompany->telephone; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title pull-left">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#generated" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-shopping-cart"></i> List Products
                        </a>
                    </h4>
                    <div class="clearfix"></div>
                </div>
                <div id="generated" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <table class="table table-bordered no-datatable">
                            <thead>
                                <tr>
                                    <th width="6%">Sr.</th>
                                    <th>Product Category</th>
                                    <th>GTIN Type</th>
                                    <th>GTIN Number (Package)</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                           <tbody>
                                <?php if($aProducts): ?>
                                    <?php foreach ($aProducts as $i => $aProduct): ?>
                                        <tr>
                                            <td><?php echo $i+1 ?></td>
                                            <td><?php echo $aProduct['product_category'] ?></td>
                                            <td><?php echo $aProduct['gcp_type'] ?></td>
                                            <td><?php echo $aProduct['package'] ?></td>
                                            <td class="text-right"><?php echo $aProduct['package_amount'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td class="text-center" colspan="5">No Record Found.</td>
                                    </tr>
                                <?php endif; ?>
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#gcp" aria-expanded="true" aria-controls="subscription_records">
                         <i class="fa fa-barcode"></i> List GCP Prefix Allocated
                        </a>
                    </h4>
                <div class="clearfix"></div>
                </div>
                 <div id="gcp" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <table class="table table-bordered no-datatable">
                            <thead>
                            <tr>
                                <th width="6%">Sr.</th>
                                <th>GTIN Type</th>
                                <th>GCP</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if($aAllocations): ?>
                                <?php foreach ($aAllocations as $i => $aAllocation): ?>
                                    <?php 
                                        $iCount = count($aAllocation['gcps']);
                                        $gcp = $aAllocation['gcps'][0];
                                        unset($aAllocation['gcps'][0]);
                                    ?>
                                    <tr>
                                        <td rowspan="<?php echo ($iCount > 1)?$iCount:1; ?>"><?php echo $i+1 ?></td>
                                        <td rowspan="<?php echo ($iCount > 1)?$iCount:1; ?>"><?php echo $aAllocation['name'] ?></td>
                                        <td><?php echo $gcp ?></td>
                                    </tr>
                                    <?php if($aAllocation['gcps']): 
                                        foreach($aAllocation['gcps'] as $gcp): ?>
                                        <tr>
                                            <td><?php echo $gcp ?></td>
                                        </tr>

                                <?php endforeach;
                                    endif;
                                 endforeach;
                                 ?>
                             <?php else: ?>
                                <tr>
                                    <td class="text-center" colspan="3">No Record Found.</td>
                                </tr>
                             <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title pull-left">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#invoice" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-file-text"></i> List Invoices
                        </a>
                    </h4> 
                    <div class="clearfix"></div>
                </div>
                <div id="invoice" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="2%">S.No</th>
                                <th>Invoice No.</th>
                                <th>Company Name</th>
                                <th>Type</th>
                                <th>GCP Type</th>
                                <th>GTINs Number</th>
                                <th>Invoice Date</th>
                                <th>Total Amount</th>
                                <th>Payment</th>   
                                <th width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach($aInvoices as $i => $aInvoice): ?>
                                <tr>
                                    <td><?php echo $i+1 ?></td>
                                    <td><?php echo $aInvoice['invoice_number'] ?></td>
                                    <td><?php echo $aInvoice['company_name'] ?></td>
                                    <td class="center"><?php echo $aInvoice['name'] ?></td>
                                    <td class="center"><?php echo $aInvoice['gcp_type'] ?></td>
                                    <td class="center"><?php echo $aInvoice['package'] ?></td>
                                    <td><?php echo qsDateFormat($aInvoice['created_at']) ?></td>
                                    <td class="text-right"><?php echo number_format($aInvoice['package_sum'],0) ?></td>
                                    <td><?php echo $aInvoice['status_id'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo HTTP_SERVER; ?>invoice/view_invoice/<?php echo $aInvoice['id'];?>" class="btn btn-xs btn-warning" title="View Invoice"><i class="glyphicon glyphicon-list-alt"></i></a>
                                            <a href="<?php echo HTTP_SERVER; ?>invoice/view_application/<?php echo $aInvoice['application_id']; ?>" class="btn btn-xs btn-success" title="View Application"><i class="glyphicon glyphicon-search"></i></a>
                                            <a data-rel="<?php echo $aInvoice['id'];?>" class="btn btn-xs btn-danger delete-invoice" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title pull-left">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#history" aria-expanded="true" aria-controls="subscription_records">
                         <i class="fa fa-clock-o"></i> Notification
                        </a>
                    </h4>
                <div class="clearfix"></div>
                </div>
                 <div id="history" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="10%">Subject</th>
                                <th width="10%">Date Time</th>
                                <th width="15%">User</th>
                                <th width="15%">Status</th>
                                <th>Comments</th>
                                <th width="10%">Notified</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($aNotifications as $aNotify): ?>
                                    <tr>
                                        <td><?php echo $aNotify['activity_type'] ?></td>
                                        <td><?php echo qsDateFormat($aNotify['created_at']) ?></td>
                                        <td><?php echo $aNotify['user'] ?></td>
                                        <td><?php echo $aNotify['status'] ?></td>
                                        <td><?php echo $aNotify['description'] ?></td>
                                        <td><?php echo $aNotify['notify']?'Yes':'No' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
