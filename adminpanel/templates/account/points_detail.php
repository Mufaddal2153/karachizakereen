<div class="panel panel-default">
    <div class="panel-body form-inline">
        <label class="control-label">Change Shop Owner:</label>
        <?php echo CHtml::dropDownList('account_id',$id, $aAccount, array('class'=>'form-control')); ?>
        <button class="btn btn-sm btn-primary" id="show_account_points" name="show_account_points" value="showdetail"><i class="glyphicon glyphicon-filter">Filter</i></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
            <h4 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Points Details for Company:
                <?php if(isset($aAccount[$id]) !=""): ?>
                    <?php echo $aAccount[$id]; ?>
                <?php endif; ?>
            <button class="btn btn-primary btn-sm pull-right" id="add-btn"><i class="glyphicon glyphicon-plus"></i> Add Points</button>
            <div class="clearfix"></div>   
            </h4>     
    </div>
    <div class="panel-body">
        <?php if (isset($flash['errors'])) : ?>
            <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
        <?php
        endif;
        if (isset($flash['success'])) :
            ?>
            <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
        <?php endif; ?>
        <div  id="hidesection">
            <form class="form-horizontal" role="form" method="post" action="">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Amount</th>
                        <th width="30%">Points</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="col-xs-5">
                                <input type="text" name="min" id="min" class="form-control" placeholder="min">
                            </div>
                            <div class="col-xs-1">
                                -
                            </div>
                            <div class="col-xs-5">
                                <input type="text" name="max" id="max" class="form-control" placeholder="max">
                            </div>
                        </td>
                        <td><input class="form-control" type="number" name="pts" id="pts"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10"  align="right">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary" value="create" id="type_submit">Submit <i class="glyphicon glyphicon-share"></i></button>
                        <button type="reset" name="reset" id="point-detail-reset" class="btn btn-default">Reset <i class="glyphicon glyphicon-refresh"></i></button>
                        <!--                    <img src="../img/ajax-loader.gif" alt="Wait"  id="loader" style="display:none;" />-->
                    </div>
                </div>
                <hr/>
            </form>
        </div>
        <div class="clearfix"></div>
                
        <table class="table table-striped datatable table-bordered">
            <thead>
                <th width="15%">Min Amount</th>
                <th width="25%">Max Amount</th>
                <th width="25%">Korona</th>
                <th width="25%">Actions</th>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            <?php if($points): ?>
            <?php foreach ($points as $i => $user) { ?>
                <tr align="center">
                    <td width="10%"><?php echo $user['amount_min']; ?></td>
                    <td width="10%"><?php echo $user['amount_max']; ?></td>
                    <td width="10%"><?php echo $user['point']; ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary edit-points" data-toggle="tooltip" title="Edit Points" value="<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger del-record" data-rel="points" data-toggle="tooltip" title="Delete" value="<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                    <?php $total +=$user['point']; ?>
                </tr>
            <?php } ?>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="1"></td>
                <th><div align="center">Total</div></th>
                <th><div align="center"><?php echo $total; ?></div></th>
                <td></td>
            </tr>
            </tfoot>

        </table>
        <div class="clearfix"></div>
    </div>
</div>