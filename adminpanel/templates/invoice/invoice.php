<div id="page-inner">
    <h3 class="page-header">
        <i class="fa fa-pencil-square-o"></i>
        Invoices 
    </h3>
    <div id="messageflash"></div>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
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
                <form class="invoice form-horizontal" role="form" id="invoice-form">
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="username">Company :</label>
                        <div class="col-sm-4">
                            <?php echo CHtml::dropDownList('filter_company', $aVal['filter_company'], $aCompanies, array('class' => 'form-control chzn-select','prompt' => 'Select Option')); ?>
                        </div>
                        <label class="col-sm-1 control-label" for="username">Type :</label>
                        <div class="col-sm-4">
                            <?php echo CHtml::dropDownList('filter_type', $aVal['filter_type'], $aTypes, array('class' => 'form-control chzn-select','prompt' => 'Select Option')); ?>
                        </div>
                        <?php /*
                        <label class="col-sm-1 control-label" for="username">GCP Type :</label>
                        <div class="col-sm-3">
                            <?php echo CHtml::dropDownList('filter_gcptype', $aVal['filter_gcptype'], $aGCPTypes, array('class' => 'form-control chzn-select','prompt' => '')); ?>
                        </div>*/ ?>
                        <div class="col-sm-2 text-right">
                            <button id="filter" type="submit" name="submit" class="btn btn-info filter"><i class="glyphicon glyphicon-filter"></i> Filter </button>
                            <a id="reset" href="<?php echo HTTP_SERVER ?>invoice" class="btn btn-warning"><i class="glyphicon glyphicon-recycle"></i> Reset </a>
                        </div> 
                    </div>
                    <div class="form-group">
 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-bars"></i>
                     List Invoices
                </div>
                <div class="panel-body show" style="display:none;">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="2">S.No</th>
                                    <th>Invoice No.</th>
                                    <th>Company Name</th>
                                    <th>Type</th>
                                    <th>GCP Package</th>
                                    <th>GTINs Number</th>
                                    <th>Invoice Date</th>
                                    <th>Total Amount</th>
                                    <th>Payment</th> 
                                    <th width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i = 1;
                            foreach($aData as $results){
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $results->invoice_number; ?></td>
                                    <td><?php echo $results->company_name; ?></td>
                                    <td class="center"><?php echo $results->name; ?></td>
                                    <td class="center"><?php echo $results->gcp_type == 0 ? 'GTINs-13s':'GTINS-8s';?></td>
                                    <td class="center"><?php echo $results->package; ?></td>
                                    <td class="center"><?php echo date("d/m/Y", strtotime($results->created_at)); ?></td>
                                    <td class="center"><?php echo $results->package_sum; ?></td>
                                    <td class="center"><?php echo $results->status_id == 1 ? 'Paid':'Pending'; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo HTTP_SERVER; ?>invoice/view_invoice/<?php echo $results->id;?>" class="btn btn-xs btn-warning" title="View Invoice"><i class="glyphicon glyphicon-list-alt"></i></a>
                                            <a href="<?php echo HTTP_SERVER; ?>invoice/view_application/<?php echo $results->application_id; ?>" data-id="3611" class="btn btn-xs btn-success" title="View Application"><i class="glyphicon glyphicon-search"></i></a>
                                            <a data-rel="<?php echo $results->id;?>" class="btn btn-xs btn-danger delete-invoice" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            $i++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>