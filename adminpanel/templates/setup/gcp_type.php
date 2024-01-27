<div id="page-inner">
    <h3 class="page-header">
    <i class="fa fa-barcode"></i>
        GCP Type 
    <button id="add" class="pull-right btn btn-success add"><i class="fa fa-plus-square"></i> Insert GCP</button>
    </h3>
    <?php if (isset($flash['errors'])) : ?>
    <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
    <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message'])) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>
    <div class="panel panel-default">
        <div class="form-block hide panel-default">
            <div class="panel-heading">
                <i class="fa fa-add"></i>
                Add/Edit GCP Type 
            </div>
            <div class="panel-body">
                <br />
                <form class="form-horizontal" role="form" method="post" id="user-setup-form" action="<?php echo HTTP_SERVER; ?>setup/gcp_type">
                    <input type="hidden" name="id" id="hdn_id1" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">GCP Prefix :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="name" id="prefix" required="" aria-required="true">
                        </div>
                        <label class="col-sm-1 control-label" for="description">Description :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="description" id="description" required="" aria-required="true">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" name="submit" class="btn btn-info" id="gcptypesub" value="create"><i class="glyphicon glyphicon-share"></i> Submit </button>
                            <button type="reset" name="reset" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        </div>   
                    </div>
                </form>
            </div> 
        </div>
        <div class="panel-heading">
            <i class="fa fa-bars"></i>
                 List GCP Type 
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>GCP Prefix</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                        $position=1;
                            foreach($data as $result):
                        ?>
                        <tr>
                            <td width="3"><?php echo $position;$position++; ?></td>
                            <td><?php echo $result->name; ?></td>
                            <td class="center"><?php echo $result->description ?></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button type="button" class="btn-primary btn btn-sm edit update-gcp-type" data-rel=<?php echo $result->id; ?> data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></button>
                                    <button type="button" class="btn-danger btn btn-sm del-gcp-type" data-rel=<?php echo $result->id; ?> data-toggle="tooltip" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                         <?php 
                            
                            endforeach; 
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
