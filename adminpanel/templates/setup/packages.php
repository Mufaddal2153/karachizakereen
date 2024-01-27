<div id="page-inner" class="package">
    <h3 class="page-header">
        <i class="fa fa-pencil-square-o"></i>
        Packages 
    </h3>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message'])) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>

    <button id="add" class="pull-right btn btn-success add"><i class="fa fa-plus-square"></i> Add Package</button>
    <ul class="nav nav-tabs" id="form-tab">
        <li class="active"><a href="#entrance" data-toggle="tab" data-rel="1">Entrance Fees</a></li>
        <li><a href="#annual" data-toggle="tab" data-rel="2">Annual Fees</a></li>
    </ul>
    <div class="form-block hide" >
        <div class="panel panel-default">
            <div class="panel-body">
                <br />
                <form class="form-horizontal" role="form" method="post" id="package-form" action="<?php echo HTTP_SERVER; ?>setup/packages">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="fees_type" id="fees_type" value="1" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="username">Number of GTIN:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name" id="name" />
                        </div>
                        <label class="col-sm-1 control-label" for="username">GTN Type:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="type_id" id="type_id">
                                <option value="0">GTN 13s</option>
                                <option value="1">GTN 8s</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="username">Amount:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="amount" id="amount" />
                        </div>
                        <label class="col-sm-1 control-label" for="username">GCP Type:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="gcp_type" id="gcp_type" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-11 text-right">
                            <button type="submit" name="submit" class="btn btn-info" value="create"><i class="glyphicon glyphicon-share"></i> Submit </button>
                            <button type="reset" name="reset" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        </div> 
                    </div>
                </form>
            </div> 
        </div>
    </div>  
    <div class="tab-content">
        </br>
        <div class="tab-pane fade active in" id="entrance">
            <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i>
                Entrance Description
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Number of GTIN</th>
                                    <th>GTN Type</th>
                                    <th>Amount</th>
                                    <th>GCP Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($data as $i => $result):
                                    if ($result->fees_type==1) {
                                        
                            ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $result->name;?></td>
                                    <td><?php echo ($result->type_id==0 ? 'GTIN-13s':'GTIN-8s');?></td> 
                                    <td class="text-right"><?php echo $result->amount;?></td> 
                                    <td class="text-right"><?php echo $result->gcp_type;?></td> 
                                    <td class="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-primary edit update-packages" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Edit" value="36" data-original-title="Edit User"><i class="glyphicon glyphicon-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger delete-packages" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="" value="36" data-original-title="Delete User"><i class="glyphicon glyphicon-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                }
                                endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
             </div>
        </div>
        <div class="tab-pane fade" id="annual">
            <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-calendar-o"></i>
                Annual Description
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Number of GTIN</th>
                                    <th>GTN Type</th>
                                    <th>Amount</th>
                                    <th>GCP Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $position=1;
                                foreach($data as $result):
                                    if ($result->fees_type==2) {
                                        
                                ?>
                                <tr>
                                    <td><?php echo $position;$position++; ?></td>
                                    <td><?php echo $result->name;?></td>
                                    <td class="text-right"><?php echo ($result->type_id==0 ? 'GTIN-13s':'GTIN-8s');?></td> 
                                    <td class="center"><?php echo $result->amount;?></td> 
                                    <td class="text-right"><?php echo $result->gcp_type;?></td> 
                                    <td class="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn-primary btn btn-sm edit update-packages" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Edit" value="36" data-original-title="Edit User"><i class="glyphicon glyphicon-edit"></i></button>
                                            <button type="button" class="btn-danger btn btn-sm delete-packages" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="" value="36" data-original-title="Delete User"><i class="glyphicon glyphicon-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                }
                                endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

