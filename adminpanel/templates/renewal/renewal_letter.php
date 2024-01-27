<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
            <i class="fa fa-file-text"></i>
              REMINDER Letter
            </h3>
            <div class="pull-right btn-group">
                <a id="printReport" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-print"></i> Print</a>
                <a href="" class="btn btn-sm btn-success" id="fund_verify"><i class="glyphicon glyphicon-ok"></i> Verify</a>
                <a href="" class="btn btn-sm btn-primary" id="fund_verify"><i class="fa fa-envelope-o"></i> Send</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">
                     REMINDER LETTER 
                </div>
                <div class="panel-body" style="padding: 50px">
                    <div class="row monospace">
                        <div class="col-xs-4">
                            <div class="panel panel-default">
                                <table class="table table-bordered">
                                    <tbody>
                                     <tr>
                                        <th class="text-center letter" width="2px">Attentions</th>
                                        <td class="text-center"><?php echo $Details->title.' '.$Details->first_name.' '.$Details->last_name; ?></td>
                                      </tr>
                                      <tr>
                                        <th class="text-center letter" width="2px">Company</th>
                                        <td class="text-center">M/s. <?php echo $Details->company_name; ?></td>
                                      </tr>
                                      <tr>
                                        <th class="text-center letter" width="2px">GCP No</th>
                                        <td class="text-center">
                                            <?php $resultstr = array();
                                                foreach ($GCP as $result) {
                                                  $resultstr[] = $result->gsp;
                                                }
                                                $result = implode(",",$resultstr);
                                                echo $result; 
                                            ?>
                                        </td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <b>Dear Member,</b></br>

                                        The annual renewal of your above registration with <b class="letter">GS1 Pakistan</b> has become due since</br>
                                        <div class="clearfix"></div>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                <th class="text-center letter"><?php echo $Details->package; ?></th>
                                                <td class="text-center letter"><?php echo $Details->package_sum; ?></td>
                                              </tr>
                                            </tbody>
                                        </table>
                                        Please find your invoice on Date : <b class="letter"><?php echo date("d-F-Y", strtotime($Details->created_at)); ?></b> and request you to kindly clear you outstanding annual fees at the earliest.Please ensure in that your annual renewal is cleared well before the due date. We all agree that annual renewals are important for current subscriptions to remain valid and as such need to be kept cleared to date.</br>
                                        If you have already cleared these dues, We 'll appreciate if you could send us the proof of payments.</br></br>

                                        Thanks and Best Regards
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>