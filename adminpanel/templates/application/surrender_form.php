<div id="page-inner">
    <h3 class="page-header">
        <i class="fa fa-barcode"></i>
       GCP Cancellation Form
    </h3>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
<form class="form-horizontal" role="form" method="post" id="surrender-form" action="">
    <div class="panel panel-default">
        <div class="panel-heading">
             CANCELLATION OF GCP COMPANY PREFIX 
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-12">This application for cancellation relate to GS1 Company Prefix currently registered in the Name of company  (Fill the given box below)</label>
                <div class="col-sm-12">
                    <textarea style="height:120px;" type="text" class="form-control" name="gs1_company_prefix" required="" aria-required="true"><?php echo isset($aVal['gs1_company_prefix'])?$aVal['gs1_company_prefix']:'' ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12">The reason for this cancellation concerns  (Fill the given box below)</label>
                <div class="col-sm-12">
                    <textarea style="height:120px;" type="text" class="form-control" name="reason" required="" aria-required="true"><?php echo isset($aVal['reason'])?$aVal['reason']:'' ?></textarea>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="note col-sm-12"><u>NOTE :- There are no product's in our warehouse, with our wholesaler, or at the stores.</u></label>
            </div>
            <div class="clearfix"></div>
            <div class="dialog note text-center">
                <span>The GCP Company Prefix cannot be cancelled until the unpaid Invoice / dues are cleared in full.</span> 
            </div>
            <label class="note">GCP Allocated</label>
            <table class="table no-datatable table-bordered">
                <thead>
                    <tr>
                        <th width="6%">Sr.</th>
                        <th>GCP Type</th>
                        <th>GCP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; 
                    if(isset($aData['allocates']) && $aData['allocates']): 
                    foreach($aData['allocates'] as $aPackage):
                        $iCount = count($aPackage['value']); 
                        if($iCount>0){
                            $value = $aPackage['value'][0];
                            unset($aPackage['value'][0]);
                        }
                        ?>                            
                        <tr>
                            <td><?php echo $i+1 ?></td>
                            <td rowspan="<?php echo $iCount; ?>"><?php echo $aPackage['package'] ?></td>
                            <td><?php echo $value; ?></td>                           
                        </tr>
                        <?php 
                        if(count($aPackage['value'])):
                            foreach ($aPackage['value'] as $value) : $i++; ?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo $value; ?></td>                           
                            </tr>
                        <?php $i++; 
                        endforeach;
                        endif; 
                    endforeach;
                   /* else: ?>
                        <tr>
                            <td colspan="3">No Allocation found.</td>
                        <tr>
                    <?php*/ endif; ?>
                </tbody>
            </table>
            <div class="clearfix"></div>
            <div id="memtext">
                We the undersigned request Cancellation as specified above 
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username">Cancellation Date: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control daypicker" name="cancel_date" required="" aria-required="true" value="<?php echo isset($aVal['cancel_date'])?$aVal['cancel_date']:date('d-m-Y'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username">Company Name: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="company_name" disabled="" aria-required="true" value="<?php echo $aData['company_name'] ?>">
                    <input type="hidden" class="form-control" name="company_id" aria-required="true" value="<?php echo $aData['company_id'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username">Name: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="name" disabled="" aria-required="true" value="<?php echo $aData['customer_name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username">Title: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="title" disabled="" aria-required="true" value="<?php echo $aData['title'] ?>">
                </div>
            </div>  
        </div>
        <?php if(!$iSurrender): ?>
            <div class="panel-footer">
                <div class="pull-right">
                    <button id="submit" type="submit" name="submit" class="btn btn-primary filter"><i class="glyphicon glyphicon-share"></i> Submit </button> 
                    <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-remove" onclick="window.history.back();"></i> Cancel </button>
                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
    </div>
</form>

<?php if($iSurrender): ?>
    <?php echo loadModule('History',array('activity_type' => ACTIVITY_TYPE_SURRENDER, 'type' => 5, 'record_id' => $iSurrender, 'company_id' => $aData['company_id'])); ?>
<?php endif; ?>      
</div>   