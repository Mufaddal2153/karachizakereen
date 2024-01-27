<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">
        <i class="glyphicon glyphicon-list"></i>
            Pending 
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
                                    <i class="glyphicon glyphicon-info-sign"></i> Company Information 
                                    </a>           
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
                                            foreach($product as $data): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td class="text-center"><?php echo $data->name; ?></td>
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
                        <input type="hidden" class="id" value="<?php echo $data->company_id; ?>">
                        <input type="hidden" class="app-id" value="<?php echo $data->application_type_id; ?>">
                        <?php echo loadModule('History',array('activity_type' => 'Application','type' => 'Pending', 'record_id' => $product->id)); ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>