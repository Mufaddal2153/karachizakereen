<div id="page-inner">    
    <h3 class="page-header">
        <i class="glyphicon glyphicon-list"></i>
        <?php echo $aType['name']; ?>
        <div class="pull-right btn-group">
            <a href="<?php echo HTTP_SERVER; ?>"><button type="button" class="btn btn-s btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
        </div>
    </h3>
    <div class="middle-container">
        <div class="panel-group" id="accordion" role="tablist">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#company_details" aria-controls="collapseOne">
                            <i class="glyphicon glyphicon-info-sign"></i> Company Information 
                        </a>           
                        <i class="glyphicon glyphicon-chevron-down pull-right"></i>  
                    </h4>
                </div>
                <div id="company_details" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="form-group col-sm-6">
                            <label class="col-sm-4 control-label font">Company Name:</label>
                            <div class="col-sm-8">
                                <label class="form-control-label"><?php echo $oApplication->name; ?></label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-4 control-label font">Attention Name:</label>
                            <div class="col-sm-8">
                                <label class="form-control-label"><?php echo $oApplication->title.' '.$oApplication->first_name. ' '.$oApplication->last_name; ?></label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">                            
                            <label class="col-sm-4 control-label font">City:</label>
                            <div class="col-sm-8">
                                <label class="form-control-label"><?php echo $oApplication->city_name; ?></label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-4 control-label font">Street Address:</label>
                            <div class="col-sm-8">
                                <label class="form-control-label"><?php echo $oApplication->street_address; ?></label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-4 control-label font">Telephone:</label>
                            <div class="col-sm-8">
                                <label class="form-control-label"><?php echo $oApplication->telephone; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#generated" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa fa-shopping-cart"></i> Product 
                    </a>
                </h4>
            </div>
            <div id="generated" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <table class="table table-bordered no-datatable">
                        <thead>
                        <tr>
                            <th class="text-center">Product Category</th>
                            <th class="text-center">GCP Type</th>
                            <th class="text-center">GTIN Number (Package)</th>
                            <th class="text-center">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $oApplication->product_category; ?></td>
                                <td><?php echo $oApplication->gcp_type ?></td>
                                <td><?php echo $oApplication->package; ?></td>
                                <td class="text-right"><?php echo ($oApplication->package_amount + $oApplication->entrance_package_amount); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php if($type >= 2): ?>
            <div id="reciept" class=" panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#reciept" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-pencil-square-o"></i> Reciept
                        </a>
                        <?php if ($type==2): ?>
                            <div class="pull-right">
                                <button id="submit-reciept" data-type="<?php echo $type; ?>" data-rel="<?php echo $record_id;?>" class="workflow-submit-btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-ok"></i> Submit</button>
                                <button id="submit-receipt-file" data-type="<?php echo $type; ?>" data-rel="<?php echo $record_id;?>" class="btn btn-primary btn-sm hide"><i class="glyphicon glyphicon-ok"></i> Submit</button>
                            </div>
                        <?php endif; ?>
                    </h4> 
                </div>
                <div  class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <?php if ($type==2): ?>
                            <form id="workflow-form-<?php echo $type ?>" class="form-horizontal workflow-form">
                                <input type="hidden" name="invoice_id" value="<?php echo $iInvoice;?>" />
                                <div class="form-block">
                                    <div class="form-group">
                                            <label class="control-label col-sm-2">Payment Method:</label>
                                            <div class="col-sm-4">
                                                <?php echo CHtml::dropDownList('payment_method_id','',$aReceiptType, array('id'=>'payment','class' => 'form-control')); ?>
                                                <input type="hidden" name="payment_method" id="payment_method" value="<?php echo reset($aReceiptType) ?>"  />
                                            </div>
                                        <div class="cheque_no">
                                            <label id="namechange1" class="control-label col-sm-2 ">Cheque No: </label>
                                            <div class="col-sm-4">
                                                <input id="cheque_no" type="text" class="form-control" name="payment_no" required="" aria-required="true">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="cheque_date">
                                            <label id="namechange2" class="control-label col-sm-2">Cheque Date: </label>
                                            <div class="col-sm-4">
                                                <input id="cheque_date" type="text" class="form-control daypicker" name="payment_date" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <label class="control-label col-sm-2">Bank:</label>
                                        <div class="col-sm-4">
                                            <?php echo CHtml::dropDownList('bank_id','',$aBanks, array('class' => 'form-control','required'=>'required','prompt' => 'Select Option')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Bank Details: </label>
                                        <div class="col-sm-4">
                                            <textarea id="bank_detail" data-type="<?php echo $type; ?>" type="text" class="form-control" name="bank_detail" required="" aria-required="true"></textarea>
                                        </div>
                                        <label class="control-label col-sm-2">&nbsp;</label>
                                        <div class="col-sm-4">
                                            <span class="btn btn-success btn-sm fileinput-button">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                <span>Add file...</span>
                                                <input class="fileupload-receipt" type="file" name="file">
                                            </span>
                                            <span class="filename-receipt text-success"></span>
                                        </div>
                                        
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>                        
                        <table id="table-receipt" class="table table-bordered no-datatable">
                            <thead>                                
                                <tr>
                                    <th>Payment Method</th>
                                    <th>Bank</th>
                                    <th>Cheque/Transcation No.</th>
                                    <th>Cheque/Transaction Date</th>
                                    <th>Bank Details</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($aReceipts): ?>
                                    <?php foreach ($aReceipts as $aReceipt) : ?>
                                        <tr class="saved">
                                            <td><?php echo $aReceipt['payment_method'] ?></td>
                                            <td><?php echo $aReceipt['bank_name'] ?></td>
                                            <td><?php echo $aReceipt['payment_no'] ?></td>
                                            <td><?php echo qsDateFormat($aReceipt['payment_date']) ?></td>
                                            <td><?php echo $aReceipt['bank_detail'] ?></td>
                                            <td><?php echo ($aReceipt['file'] != '' ? 
                                            '<a href="' . HTTP_FILES . '/receipts/' . $aReceipt['file'] . '" download>' . $aReceipt['file'] . '</a>'
                                            : '-'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr class="empty-row">
                                        <td class="text-center" colspan="6">No Record Found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($type >= 3): ?>
            <div class="panel panel-success " id="allocation-panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#gcp" aria-expanded="true" aria-controls="subscription_records">
                         <i class="fa fa-barcode"></i> GCP Allocation
                        </a>
                        <?php if ($type==3): ?>
                            <div class="pull-right">
                                <button id="submit-gcp" data-type="<?php echo $type; ?>" data-rel="<?php echo $record_id;?>" class="workflow-submit-btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-ok"></i> Submit</button>
                            </div>
                        <?php endif; ?>
                    </h4>
                </div>
                <div id="gcp" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <?php if($type == 3): ?>
                            <form id="workflow-form-<?php echo $type ?>" class="form-horizontal workflow-form">
                                <input type="hidden" name="invoice_id" value="<?php echo $iInvoice;?>" />
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label class="col-sm-3 control-label" for="username">GTIN Package: </label>
                                        <div class="col-sm-9">
                                            <label id="package" class="form-control-static"><?php echo $oApplication->package; ?></label>
                                        </div>
                                        <input id="package-id" value="<?php echo $oApplication->package_id; ?>" name="package_id" type="hidden" />
                                        <input id="package" value="<?php echo $oApplication->package; ?>" name="package" type="hidden" />
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="col-sm-3 control-label" for="username">GCP No.: </label>
                                        <div class="col-sm-9">
                                            <input id="gcp-numbers" name="gcp" type="text" class="form-control" aria-required="true" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" id="add-gcp" data-type="<?php echo $type; ?>" data-rel="<?php echo $oApplication->id; ?>" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-share"></i> ADD </button>
                                    </div> 
                                </div>
                                <table id="table-gcp" class="table table-bordered no-datatable">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="6%">Sr.</th>
                                        <th class="text-center">GCP Type</th>
                                        <th class="text-center">GCP No.</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($aGCPs) && $aGCPs): ?>
                                        <?php foreach ($aGCPs as $i => $aGCP): ?>
                                            <tr class="saved">
                                                <td class="text-center" width="6%"><?php echo $i+1; ?></td>
                                                <td class="text-center"><?php echo $aGCP['package']; ?></td>
                                                <td class="text-center"><?php echo $aGCP['gsp']; ?></td>
                                            </tr>
                                        <?php endforeach;
                                        endif; ?>
                                    </tbody>
                                </table>
                            </form>
                        <?php endif; ?>
                        <?php if($type > 3): ?>
                            <table id="table-gcp" class="table table-bordered no-datatable">
                                <thead>
                                <tr>
                                    <th class="text-center" width="6%">Sr.</th>
                                    <th class="text-center">GCP Type</th>
                                    <th class="text-center">GCP</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if($aGCPs): ?>
                                    <?php foreach ($aGCPs as $i => $aGCP): ?>
                                        <tr class="saved">
                                            <td class="text-center" width="6%"><?php echo $i+1; ?></td>
                                            <td class="text-center"><?php echo $aGCP['package']; ?></td>
                                            <td class="text-center"><?php echo $aGCP['gsp']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr class="empty-row">
                                        <td class="text-center" colspan="5">No Record Found.</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php echo loadModule('History',array('activity_type' => ACTIVITY_TYPE_APPLICATION,'type' => $type, 'record_id' => $record_id, 'company_id' => $oApplication->company_id)); ?>
    </div>  
</div>