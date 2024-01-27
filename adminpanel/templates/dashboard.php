<div id="page-inner">        
    <h1 class="page-header">
        Dashboard
    </h1>
     <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message'])) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>
    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="panel-heading">
                <h3>Statistics</h3>
            </div>
            <div class="panel-body">
                <div id="morris-bar-chart"></div>
            </div>                                
       </div>
    </div>
    <div id="statistics" class="panel-collapse collapse in" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countPending->count_invoices; ?></div>
                                <div class="small" style="padding-left:15px;">Total Pending Invoices</div>
                            </div>
                        </div>
                    </div>
                    <a class="dashboard-list listing-view" rel="invoice">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countRenewal->count_renewal; ?></div>
                                <div class="small" style="padding-left:15px;">This Month's Renewals</div>
                            </div>
                        </div>
                    </div>
                    <a class="dashboard-list listing-view" rel="renewal">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countApp->count_application; ?></div>
                                <div class="small" style="padding-left:15px;">Latest Application Listing</div>
                            </div>
                        </div>
                    </div>
                    <a class="dashboard-list listing-view" rel="application">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countProfile->count_profile; ?></div>
                                <div class="small" style="padding-left:15px;">Update Profile Approval</div>
                            </div>
                        </div>
                    </div>
                    <a class="dashboard-list listing-view" rel="profile">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="dashboard-list" class="panel-collapse collapse pending"></div>

<!-- Application Workflow Option  -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-tasks"></i>
                Application WorkFlow
                <?php $total = $countPendingApp->count_app+$countApprovalApp->count_app+$countInvoice->count_invoice+$countGcp->count_gcp; ?>
                <span class="label label-default pull-right" style="font-size: 85%;">Total: <span class="panel-total"><?php echo $total; ?></span></span>
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-lg-2 col-md-5 col-sm-5">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-time fa-5x "></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countPendingApp->count_app; ?></div>
                                <div class="small">Pending</div>
                            </div>
                        </div>
                    </div>
                    <a class="listing-view application-workflow" rel="1">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class=" removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs top-pad"><i class="glyphicon glyphicon-arrow-right fa-3x"></i></div>
            <div class="col-lg-2 col-md-5 col-sm-5">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-check fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countApprovalApp->count_app; ?></div>
                                <div class="small">Approval</div>
                            </div>
                        </div>
                    </div>
                    <a class="listing-view application-workflow" rel="2">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class=" removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="col-sm-1 hidden-xs top-pad"><i class="glyphicon glyphicon-arrow-right fa-3x"></i></div>
            <div class="col-lg-2 col-md-5 col-sm-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countInvoice->count_invoice; ?></div>
                                <div class="small">Invoice Paid</div>
                            </div>
                        </div>
                    </div>
                    <a class="listing-view application-workflow" rel="3">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class=" removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
              <div class="col-sm-1 hidden-xs top-pad"><i class="glyphicon glyphicon-arrow-right fa-3x"></i></div>
            <div class="col-lg-2 col-md-5 col-sm-5">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-barcode fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countGcp->count_gcp; ?></div>
                                <div class="small">GCP Generated</div>
                            </div>
                        </div>
                    </div>
                    <a class="listing-view application-workflow" rel="4">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class=" removerclass glyphicon glyphicon-circle-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div id="workflow-listing" class="panel-collapse collapse pending"></div>
    <div class="clearfix"></div>
</div>
