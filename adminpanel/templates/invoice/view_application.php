<div id="page-inner">
    <h3 class="page-header">
        <i class="glyphicon glyphicon-list"></i>
                View Application <?php //echo ($oDetails && $oDetails->status_id == 1 ? 'Invoice Paid':'Invoice Pending') ?>
        <div class="pull-right btn-group">
            <?php if($oDetails): ?>
                <a href="<?php echo HTTP_SERVER; ?>application/print/<?php echo $oDetails->id ?>"><button type="button" class="btn btn-s btn-warning"><i class="glyphicon glyphicon-print"></i> Print</button></a>
            <?php endif; ?>
            <a href="<?php echo HTTP_SERVER; ?>application"><button type="button" class="btn btn-s btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
        </div>
    </h3>
    <?php if($oDetails): ?>
        <div class="middle-container">
            <div class="panel-group" id="accordion" role="tablist">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title pull-left">
                            <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#company_details" aria-controls="collapseOne">
                            <i class="glyphicon glyphicon-info-sign"></i> Company Information
                            </a>           
                        </h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="company_details" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label font">Company Name:</label>
                                <div class="col-sm-4">
                                    <label class="form-control-label"><?php echo $oDetails->name; ?></label>
                                </div>
                                <label class="col-sm-2 control-label font">Attention Name:</label>
                                <div class="col-sm-4">
                                    <label class="form-control-label"><?php echo $oDetails->title.' '.$oDetails->contact_name; ?></label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label font">Country:</label>
                                <div class="col-sm-4">
                                    <label class="form-control-label"><?php echo $oDetails->country_name; ?></label>
                                </div>
                                <label class="col-sm-2 control-label font">City:</label>
                                <div class="col-sm-4">
                                    <label class="form-control-label"><?php echo $oDetails->city_name; ?></label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label font">Street Address:</label>
                                <div class="col-sm-4">
                                    <label class="form-control-label"><?php echo $oDetails->street_address; ?></label>
                                </div>
                                <label class="col-sm-2 control-label font">Telephone:</label>
                                <div class="col-sm-4">
                                    <label class="form-control-label"><?php echo $oDetails->telephone; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title pull-left">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#generated" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-shopping-cart"></i> Product 
                        </a>
                    </h4>
                    <div class="clearfix"></div>
                </div>
                <div id="generated" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <table class="table table-bordered no-datatable">
                            <thead>
                            <tr>
                                <th class="text-center" width="6%">Sr.</th>
                                <th class="text-center">Product Category</th>
                                <th class="text-center">GCP Type</th>
                                <th class="text-center">GTIN Number (Package)</th>
                                <th class="text-center">Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td><b><?php echo $oDetails->product_category; ?></b></td>
                                    <td><?php echo $oDetails->gcp_type;?></td>
                                    <td><?php echo $oDetails->package; ?></td>
                                    <td class="text-right"><?php echo $oDetails->package_sum; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#reciept" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-pencil-square-o"></i> Reciept
                        </a>
                    </h4> 
                </div>
                <div id="reciept" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <table class="table table-bordered no-datatable">
                            <thead>                                
                                <tr>
                                    <th>Payment Method</th>
                                    <th>Bank</th>
                                    <th>Cheque/Transcation No.</th>
                                    <th>Cheque/Transaction Date</th>
                                    <th>Bank Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($aReceipts): ?>
                                    <?php foreach ($aReceipts as $aReceipt) : ?>
                                        <tr>
                                            <td><?php echo $aReceipt['payment_method'] ?></td>
                                            <td><?php echo $aReceipt['bank_name'] ?></td>
                                            <td><?php echo $aReceipt['payment_no'] ?></td>
                                            <td><?php echo qsDateFormat($aReceipt['payment_date']) ?></td>
                                            <td><?php echo $aReceipt['bank_detail'] ?></td>
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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title pull-left">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#gcp" aria-expanded="true" aria-controls="subscription_records">
                         <i class="fa fa-barcode"></i> GCP Allocation
                        </a>
                    </h4>
                <div class="clearfix"></div>
                </div>
                 <div id="gcp" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <table class="table table-bordered no-datatable">
                            <thead> 
                            <tr>
                                <th class="text-center" width="6%">Sr.</th>
                                <th class="text-center">GTIN Package</th>
                                <th class="text-center">GCP Allocated</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if($aAllocations): ?>
                                    <?php foreach ($aAllocations as $i => $aAllocate): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i+1 ?></td>
                                            <td class="text-center"><?php echo $aAllocate['package']; ?></td>
                                            <td class="text-center"><?php echo $aAllocate['gsp'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td class="text-center" colspan="4">No Record Found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php echo loadModule('History',array('activity_type' => ACTIVITY_TYPE_APPLICATION,'type' => null, 'record_id' => $oDetails->id, 'company_id' => $oDetails->company_id)); ?>
    <?php else: ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <p class="text-center">No Record Found.</p>
            </div>
        </div>
    <?php endif; ?>
</div>