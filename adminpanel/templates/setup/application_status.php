<div id="page-inner" class="application-status">
    <h3 class="page-header">
        <i class="fa fa-barcode"></i>
        Application Status 
    </h3>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message'])) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>
    <button id="add" class="pull-right btn btn-success add"><i class="fa fa-plus-square"></i> Add Stages</button>
    <ul class="nav nav-tabs" id="form-tab" role="tablist">
        <li role="presentation" class="active"><a href="#new" aria-controls="new" role="tab" data-toggle="tab" data-rel="1">Application</a></li>
        <li role="presentation"><a href="#renewal" aria-controls="renewal" role="tab" data-toggle="tab" data-rel="5">Invoice</a></li>
        <li role="presentation"><a href="#surrender" aria-controls="surrender" role="tab" data-toggle="tab" data-rel="4">Surrender</a></li>
    </ul>
    <div class="form-block hide" >
        <div class="panel panel-default">
            <div class="panel-body">
                <br />
                <form class="form-horizontal" role="form" method="post" id="user-setup-form" action="<?php echo HTTP_SERVER; ?>setup/application_status">
                    <input type="hidden" name="type_id" id="type_id" value="1" />
                    <input type="hidden" name="id" id="hdn_id3" />
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="username">Stages :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="name" id="stages" required="" aria-required="true">
                        </div>
                        <label class="col-sm-1 control-label" for="username">Status :</label>
                        <div class="col-sm-3">
                            <select name="status" id="is_active" class="form-control" required="" aria-required="true">
                                <option value="1">Active</option>
                                <option value="0">In-active</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" name="submit" class="btn btn-info" value="create" data-noty-options='{"text":"Modified successfully!","layout":"top","type":"success"}'><i class="glyphicon glyphicon-share"></i> Submit </button>
                            <button type="reset" name="reset" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        </div>   
                    </div>
                </form>                 
                <div class="clearfix"></div>
            </div>
        </div>
    </div>     
    <div class="tab-content">
        <br />
        <div class="tab-pane fade active in" id="new" role="tabpanel">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i>
                    Application
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="2">S.No</th>
                                    <th align="center">Stages</th>
                                    <th align="center">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $position=1;
                                foreach($data as $result):
                                    if ($result->type_id==1) {
                                        
                            ?>
                                <tr>
                                    <td><?php echo $position; $position++; ?></td>
                                    <td><?php echo $result->name;?></td>
                                    <td><?php echo ($result->status==0 ? 'Inactive':'Active');?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn-primary btn btn-sm update-application-status" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></button>
                                            <button type="button" class="btn-danger btn btn-sm delete-application-status" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
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
        <div class="tab-pane fade" id="renewal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i>
                    Invoice
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="2">S.No</th>
                                    <th align="center">Stages</th>
                                    <th align="center">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $position=1;
                                foreach($data as $result):
                                    if ($result->type_id==5) {
                                        
                            ?>
                                <tr>
                                    <td><?php echo $position; $position++; ?></td>
                                    <td><?php echo $result->name;?></td>
                                    <td><?php echo ($result->status==0 ? 'Inactive':'Active');?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn-primary btn btn-sm update-application-status" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></button>
                                            <button type="button" class="btn-danger btn btn-sm delete-application-status" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
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
        <div class="tab-pane fade" id="surrender">
            <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-list fa-fw"></i>
                Surrender
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="2">S.No</th>
                                    <th align="center">Stages</th>
                                    <th align="center">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $position=1;
                                foreach($data as $result):
                                    if ($result->type_id==4) {
                                        
                            ?>
                                <tr>
                                    <td><?php echo $position; $position++; ?></td>
                                    <td><?php echo $result->name;?></td>
                                    <td><?php echo ($result->status==0 ? 'Inactive':'Active');?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn-primary btn btn-sm update-application-status" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></button>
                                            <button type="button" class="btn-danger btn btn-sm delete-application-status" data-rel=<?php echo $result->id;?> data-toggle="tooltip" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
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
