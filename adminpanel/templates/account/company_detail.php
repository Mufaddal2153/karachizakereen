<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
        <i class="glyphicon glyphicon-edit"></i> Shop Details
        <button class="btn btn-primary btn-sm pull-right" id="add-btn"><i class="glyphicon glyphicon-plus"></i> Add Shop</button>
        </h4>
    </div>
    <div class="panel-body">
        <?php if (isset($flash['errors'])) : ?>
            <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
        <?php endif;
        if (isset($flash['success'])) : ?>
            <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
        <?php endif; ?>
        <div id="hidesection">
            <form class="form-horizontal" enctype='multipart/form-data' role="form" method="post" action="<?php echo HTTP_SERVER ?>account/company_detail">
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="title">Shop Name: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" id="title" required />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="shop_numnber">Shop number: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="shop_numnber" id="shop_numnber" value="<?php echo $shop_number; ?>" required />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="contactperson">Contact Person: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contactperson" id="contactperson" required />
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="contact">Contact: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contact" id="contact" />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="address">Address: </label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon btn btn-default" id="getLocation" type="button" value="Get">Get location</span>
                            <input type="text" class="form-control" name="address" id="address" />
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="CVRnr">CVRnr: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="CVRno" id="CVRnr" required />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="geo_loc">Geo Location: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="geo_loc" id="geo_loc" />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="logo">Logo: </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="logo" id="logo" />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="status">Approve: </label>
                    <div class="col-sm-8">
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <?php foreach ($Status as $Cstatus) { ?>
                                <option value="<?php echo $Cstatus['status']; ?>"><?php echo ($Cstatus['status']=='1')?'Yes':'No'; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary" value="create">Submit <i class="glyphicon glyphicon-share"></i></button>
                        <button type="reset" name="reset" class="btn btn-default">Reset <i class="glyphicon glyphicon-refresh"></i></button>
                    </div>
                </div>
                <hr/>
                <input type="hidden" name="is_accept" id="is_accept" value="is_accept">
            </form>
        </div>
        <table class="table table-striped datatable table-bordered">
            <thead>
                <tr>
                    <th width="8%">ID</th>
                    <th width="15%">Shop Name</th>
                    <th width="15%">Contact Person</th>
                    <th width="15%">Contact</th>
                    <th width="15%">CVRno</th>
                    <th width="15%">Address</th>
                    <th width="25%">Approved</th>
                    <th width="25%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($account as $i => $user) : ?>
                <tr>
                    <td data-status="<?php echo $user['status'] ?>" data-dob="<?php echo $user['shop_number'] ?>"><?php echo $user['id']; ?></td>
                    <td><?php echo $user['title']; ?></td>
                    <td><?php echo $user['contact_person']; ?></td>
                    <td><?php echo $user['contact']; ?></td>
                    <td><?php echo $user['CVRno']; ?></td>
                    <td><?php echo $user['address']; ?></td>
                    <td class="text-center">
                        <?php if($user['status']=="1"): ?>
                            <button type="button" title="Un Approve" data-toggle="tooltip" class="btn btn-sm btn-success cancel-record" value="<?php echo $user['id']; ?>" data-rel="account"><i class="glyphicon glyphicon-ok"></i></button>
                        <?php else: ?>
                            <button type="button" title="Approve" data-toggle="tooltip" class="btn btn-sm btn-danger approve-record" value="<?php echo $user['id']; ?>" data-rel="account"><i class="glyphicon glyphicon-remove"></i></button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-info edit-account" data-toggle="tooltip" title="Edit Company" value="<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                            <a href="<?php echo HTTP_SERVER?>account/manage_users/<?php echo $user['id'];?>" title="Manage Shop Users" data-toggle="tooltip" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-user"></i></a>
                            <a href="<?php echo HTTP_SERVER?>account/points_detail/<?php echo $user['id'];?>" title="Manage Points" data-toggle="tooltip" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-equalizer"></i></a>
                            <button type="button" class="btn btn-sm btn-danger del-record" data-toggle="tooltip" title="Delete Company" value="<?php echo $user['id']; ?>" data-rel="account"><i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="clearfix"></div>
    </div>
</div>
<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="approveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Approve Record</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success"><span class="glyphicon glyphicon-success"></span> Are you sure you want to approve this record?</div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> Cancel</button>
                    <button type="button" class="submit-btn btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Approve</button>
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
                <h4 class="modal-title custom_align" id="Heading">Cancel Record</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success"><span class="glyphicon glyphicon-success"></span> Are you sure you want to cancel this record?</div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> Cancel</button>
                    <button type="button" class="submit-btn btn btn-danger"><span class="glyphicon glyphicon-success"></span> Un Approve</button>
                </div>
            </div>

        </div>
    </div>
</div>