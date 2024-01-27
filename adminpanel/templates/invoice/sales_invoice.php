<div class="not-printable">
    <div class="page-header">
        <br />
        <br />
        <h3 class="page-title">
            <i class="fa fa-file-text"></i>
            Sales Invoice
            <?php if($oDetails): ?>
            <div class="pull-right btn-group">
                <a id="print-invoice" data-rel="<?php echo $oDetails->id; ?>" name="print" class="btn btn-danger"><i class="glyphicon glyphicon-print"></i> Print</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="email"><i class="fa fa-envelope-o"></i> Send</a>
            </div>
            <?php endif; ?>
        </h3>
    </div>
    <div class="alert alert-success" hidden><a class='close' data-dismiss='alert'>x</a><?php echo 'Mail Successfully Sent'; ?></div>
</div>
<div class="print">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
             SALES INVOICE RECEIPT
        </div>
        <div class="panel-body" style="padding: 50px" id="printable">
            <?php if($oDetails): ?>
            <div class="row">
                <div class="col-xs-5" style="margin-bottom: 60px;">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-details" >
                            <span>Company Details</span>
                        </div>
                        <div class="panel-body">
                            <p class="address">
                             <?php /* ATTN : <?php echo $oDetails->title.' '.$oDetails->contact_name; ?> <br> */ ?>
                              M/S. <?php echo $oDetails->name; ?> <br>
                              <?php echo $oDetails->street_address; ?> <br>
                              <?php echo $oDetails->city_name; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <p>
                        <b>Invoice No : 
                        <?php echo $oDetails->invoice_number; ?>
                        </br>
                       Dated : <?php echo date("d/m/Y", strtotime($oDetails->created_at)); ?></b>
                    </p>
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered no-datatable">
                        <thead>
                          <tr>
                            <th class="text-center" width="6%">S.NO</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">AMOUNT</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $i=1;
                            if($oDetails->entrance_package_amount!=0): ?>
                                <tr class="text-center">
                                    <td><?php echo $i; ?></td>
                                    <td>ONE TIME ENTRANCE FEES</td>
                                    <td><?php echo $oDetails->entrance_package_amount; ?></td>
                                    <?php $i++; ?>
                                </tr>
                        <?php endif; ?>
                            <tr class="text-center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $oDetails->package; ?></td>
                                <td><?php echo $oDetails->package_amount; ?></td>
                                <?php $i++; ?>
                            </tr>
                            <tr class="text-center">
                                <td></td>
                                <td class="bold">TOTAL AMOUNT</td>
                                <td><?php echo $oDetails->package_sum; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-8 chargednotice">
                    <p>AMOUNT IN WORDS : ------ <b class="letter"><?php echo convert_number_to_words($oDetails->package_sum); ?></b> ------</p>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr class="hr" align="center">
            <p class="address" align="center" style="padding-top: 0px;">
                GS1 Pakistan(Guarantee) Ltd - Office NO. C.V, 3rd Floor,</br>
                Azainab Court, Campbell Street - 74200 Karachi</br>
                Phone : +9221-32628213/32215844 - Website : http://www.gs1pk.prg - Email : info@gs1pk.org
            </p>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4 top">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-details">
                                <span>Bank Details</span>
                            </div>
                            <div class="panel-body">
                                <p class="address">
                                  GS1 Pakistan (Guarantee) Ltd <br>
                                  Habibh Metropolitan Bank Ltd <br>
                                  Paper Market Branch <br>
                                  New challi, Karachi </br>
                                  A/C No. 20311-714-182748 </br>
                                  NTN : 3338081-3
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="not-printable">
    <?php echo loadModule('History',array('activity_type' => ACTIVITY_TYPE_INVOICE,'type' => null, 'record_id' => $oDetails->id, 'company_id' => $oDetails->company_id)); ?>
</div>
<div class="modal" id="modal-email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content" style="width: 110%;height: 110%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="Close">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Invoice Mail</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-block">
                    <form class="email form-horizontal" role="form" method="post" id="user-setup-email" action="">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-4">
                                <h5 class="col-sm-12 control-label" style="text-align:left;">Email </h5>
                            </div>
                            <div class="col-sm-5">
                                <h5 class="col-sm-12 control-label" style="text-align:left;">Designation </h5>
                            </div>
                             <div class="col-sm-3">
                                <h5 class="col-sm-12 control-label" style="text-align:left;">Medium </h5>
                            </div>
                        </div>
                        <?php
                        $i=1; 
                        foreach ($aEmail as $array):
                        echo '<div class="form-group col-sm-12">
                            <div class="col-sm-4">
                                 <label style="text-align:left;" class="col-sm-4 control-label" for="username" name="'.$array['email'].'">'.$array['email'].'</label>
                                 <input type="hidden" value="'.$array['email'].'" name="email'.$i.'">
                            </div>
                            <div class="col-sm-5">
                                 <label style="text-align:left;" class="col-sm-4 control-label" for="username" name="'.$array['name'].'">'.$array['name'].'</label>
                                 <input type="hidden" value="'.$array['name'].'" name="name'.$i.'">
                            </div>
                             <div class="col-sm-3">
                               <select class="form-control" id="option-'.$i.'" name="option'.$i.'">
                                    <option value="">Choose any option</option>
                                    <option value="To">To</option>
                                    <option value="CC">CC</option>
                                    <option value="BCC">BCC</option>
                                </select>
                            </div>
                        </div>';
                        $i++;
                        endforeach ?>
                         <div class="form-group col-sm-12">
                            <div class="col-sm-4">
                                 <h5 class="text-left control-label bold">Other Email:</h5>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email4" id="email4" required="" aria-required="true">
                            </div>
                            <div class="col-sm-3">
                               <select class="form-control" id="option-4" name="option4">
                                    <option value="">Choose any option</option>
                                    <option value="To">To</option>
                                    <option value="CC">CC</option>
                                    <option value="BCC">BCC</option>
                                </select>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="message"></div>
                <button id="send-email" type="button" class="btn btn-primary">Send Email</button>
            </div>
            </form>
        </div>
    </div>
</div>
