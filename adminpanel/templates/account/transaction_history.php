<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<div class="row">
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php
    endif;
    if (isset($flash['success'])) :
        ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>

    <h4><i class="glyphicon glyphicon-edit"></i> Transaction History</h4>

    <div class="box-content">
        <input style="display: none" type="text" id="appdisapp" value="" name="appdisapp">
        <table class="table table-striped datatable">
            <thead>

            <th width="15%">Name</th>
            <th width="15%">Points</th>
            <th width="15%">Date Added</th>
            <th width="15%">Status</th>
            <th width="10%">Action</th>

            </thead>

            <tbody>
            <?php foreach ($transactions as $i => $oTrans) { ?>


                <tr align="center">

                    <td><?php echo $oTrans['name']; ?></td>
                    <td><?php echo $oTrans['points']; ?></td>
                    <td><?php echo $oTrans['date']; ?></td>
                    <?php if($oTrans['status']=="1"){ ?>
                   <td>Pending</td>
                        <td>
                        <button type="button" name="approve_acc" id="approve_transaction" title="Approve" data-toggle="modal" data-target="#approve"  class="btn btn-sm btn-success app_trans" value="<?php echo $oTrans['id']; ?>"><i class="glyphicon glyphicon-edit"></i>
                        </button>

                        <button type="button" name="disapprove_acc" id="cancel_transaction" title="Cancel" data-toggle="modal" data-target="#disapprove"  class="btn btn-sm btn-danger cancel-trans" value="<?php echo $oTrans['id']; ?>"><i class="glyphicon glyphicon-edit"></i>
                        </button>
                        </td>
                    <?php } else if($oTrans['status']=="2"){?>
                    <td>Approved</td>
                        <td><button type="button" name="disapprove_acc" id="disapprove_accounts" title="Cancel" data-toggle="modal" data-target="#disapprove"  class="btn btn-sm btn-danger cancel-trans" value="<?php echo $oTrans['id']; ?>"><i class="glyphicon glyphicon-edit"></i>
                            </button>
                        </td>
                    <?php } else {?>
                    <td>Canceled</td>
                    <td>
                        <button type="button" name="approve_acc" id="approve_accounts" title="Approve" data-toggle="modal" data-target="#approve"  class="btn btn-sm btn-success app_trans" value="<?php echo $oTrans['id']; ?>"><i class="glyphicon glyphicon-edit"></i>
                        </button>
</td>
                        <?php }?>


                    <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="approveLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Approve This</h4>
                                </div>

                                <div class="modal-body">

                                    <div class="alert alert-success"><span class="glyphicon glyphicon-success"></span> Are you sure you want to Approve?</div>
                                    <div class="modal-footer ">
                                        <button type="button" class="approve-button btn btn-success appTransaction" name="app" id="appTransaction" value="<?php echo $oTrans['id']; ?>" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span>Approve</button>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="disapprove" tabindex="-1" role="dialog" aria-labelledby="approveLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Approve This</h4>
                                </div>

                                <div class="modal-body">

                                    <div class="alert alert-success"><span class="glyphicon glyphicon-success"></span> Are you sure you want to Cancel?</div>
                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-danger" name="disapp" id="disappTransaction" value="<?php echo $oTrans['id']; ?>" data-dismiss="modal"><span class="glyphicon glyphicon-success"></span>Disapprove</button>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </tr>

            <?php } ?>

            </tbody>
        </table>
        <div class="clearfix"></div>
    </div>
</div>
