<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">
        <i class="glyphicon glyphicon-list"></i>
            Invoice Paid 
        <div class="pull-right btn-group">
            <a href="<?php echo HTTP_SERVER; ?>"><button type="button" class="btn btn-s btn-success"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
        </div>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="middle-container">
                    <div class="panel-group" id="accordion" role="tablist">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title pull-left">
                                    <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#company_details" aria-controls="collapseOne">
                                    <i class="glyphicon glyphicon-info-sign"></i> Company Information</a>
                                </h4>
                                <i class="glyphicon glyphicon-chevron-down pull-right"></i> 
                            <div class="clearfix"></div>
                            </div>
                            <div id="company_details" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-2 control-label font">Company Name:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-label"><?php echo $profile->name; ?></label>
                                            </div>
                                            <label class="col-sm-2 control-label font">Attention Name:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-label"><?php echo $profile->title.' '.$profile->first_name. ' '.$profile->last_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-2 control-label font">Country:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-label"><?php echo $profile->country_name; ?></label>
                                            </div>
                                            <label class="col-sm-2 control-label font">City:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-label"><?php echo $profile->city_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-2 control-label font">Street Address:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-label"><?php echo $profile->street_address; ?></label>
                                            </div>
                                            <label class="col-sm-2 control-label font">Telephone:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-label"><?php echo $profile->telephone; ?></label>
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
                                    <table border="1px solid #DDD" class="border-table info">
                                        <thead>
                                        <tr>
                                            <th class="text-center" width="6%">Sr.</th>
                                            <th class="text-center">Product Category</th>
                                            <th class="text-center">GCP Type</th>
                                            <th class="text-center">GTIN Number (Package)</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1; 
                                            foreach($invoice_detail as $data): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td class="text-center"><?php echo $data->product_category; ?></td>
                                                <td class="text-center"><?php echo $data->gcp_type == 1 ? 'GTINs-13s':'GTINS-8s'; ?></td>
                                                <td class="text-center"><?php echo $data->package; ?></td>
                                                <td class="text-center"><?php echo ($data->package_amount + $data->entrance_package_amount); ?></td>
                                            </tr>
                                            <?php endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title pull-left">
                                    <a class="total-view" data-toggle="collapse" data-parent="#accordion" href="#reciept" aria-expanded="true" aria-controls="collapseTwo">
                                        <i class="fa fa-pencil-square-o"></i> Reciept
                                    </a>
                                </h4> 
                                <div class="pull-right">
                                        <a class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-ok"></i> Submit</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="reciept" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <label class="control-label col-sm-4">Payment Method: </label>
                                            <div class="col-sm-8">
                                                <select class="form-control">
                                                    <option value="1" disabled="true"><?php echo $invoice_detail->payment_method; ?></option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label col-sm-4">Cheque No: </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="cheque" required="" aria-required="true" value="<?php echo $invoice_detail->cheque_number; ?>" disabled="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <label class="control-label col-sm-4">Cheque Date: </label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="cheque_date" required="" aria-required="true" value="<?php echo $invoice_detail->cheque_date; ?>" disabled="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label col-sm-4">Bank Details: </label>
                                            <div class="col-sm-8">
                                                <select class="form-control">
                                                    <option value="1" disabled="true"><?php echo $invoice_detail->bank_detail; ?></option>
                                                </select> 
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="clearfix"></div>
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
                                <div class="col-sm-12">
                                    <div class="form-group col-sm-5">
                                        <label class="col-sm-3 control-label" for="username">GTIN Package: </label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="package">
                                                <option value="<?php echo $data->package; ?>"><?php echo $data->package; ?></option>
                                            </select>
                                        </div>
                                        <input id="package-id" type="hidden" value="<?php echo $invoice_detail->package_id; ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label class="col-sm-3 control-label" for="username">GCP: </label>
                                        <div class="col-sm-9">
                                            <input id="gcp-numbers" type="text" class="form-control" required="" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <a id="submit-gcp" data-rel="<?php echo $invoice_detail->id; ?>" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-share"></i> ADD </a>
                                    </div> 
                                </div>
                                <div class="clearfix"></div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="6%">Sr.</th>
                                            <th>GTIN Type</th>
                                            <th>GCP</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php echo loadModule('History',array('activity_type' => 'Application','type' => 'Invoice Paid')); ?>
                </div>  
            </div>
        </div>
    </div>
</div>