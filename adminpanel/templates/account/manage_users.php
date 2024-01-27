<div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Shop User Details:
        <?php echo $oAccount->title; ?>
        <button type="button"  class="btn btn-primary btn-sm pull-right" id="add-btn"><i class="glyphicon glyphicon-plus"></i> Add Users</button>
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
        <div id="hidesection">
            <form class="form-horizontal" enctype='multipart/form-data' id="add-usersForm" name="userform-reset" role="form" method="post" action="">
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="name">Name: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" required />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="role_id">Email: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" id="email" required />
                    </div>
                </div>
                
                <div class="form-group col-sm-6" >
                    <label class="col-sm-4 control-label" for=""> </label>
                    <a href="javascript:void(0)" class="col-sm-6 hide" id="change-password-btn">Change Password</a>
                </div>
                <div class="clearfix"></div>
                <div class="" id="password-box">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 control-label" for="role_id">Password: </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password" required />
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 control-label" for="role_id">Confirm Password: </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="confirm_password" id="password" required />
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="mohallas">Image: </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="image" id="image" />
                    </div>

                </div>

                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">Mobile: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mobile" id="mobile" required />
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="roleid">Select Role</label>
                    <div class="col-sm-8">
                        <select name="userrole" id="userrole" class="form-control">
                             <?php foreach($aRoles as $i => $sRole): ?>
                                <option value="<?php echo $i ?>"><?php echo $sRole; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="mohallas">Status: </label>
                    <div class="col-sm-8">
                        <select name="status" id="status" class="form-control">
                            <?php foreach($aStatus as $i => $sStatus): ?>
                                <option value="<?php echo $i ?>"><?php echo $sStatus; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary" value="create" id="type_submit">Submit <i class="glyphicon glyphicon-share"></i></button>
                        <button type="reset" name="reset" class="btn btn-default" id="account-user-reset">Reset <i class="glyphicon glyphicon-refresh"></i></button>
                    </div>
                </div>
                <hr/>
            </form>
        </div>
        <div class="clearfix"></div>
        
        <table class="table table-striped datatable">
            <thead>
            <th width="5%">ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th width="15%">Contact</th>
            <th width="6%">Status</th>
            <th width="10%">Manage Users</th>

            </thead>

            <tbody>
            <?php $items = array();?>
            <?php foreach ($users as $i => $user) { ?>
                <tr align="center">
                    <td width="2%"><?php echo $user['id']; ?></td>
                    <td width="10px"><?php echo $user['name']; ?></td>
                    <td ><?php echo (isset($aRoles[$user['role_id']])?$aRoles[$user['role_id']]:''); ?></td>
                    <td width="10px"><?php echo $user['email']; ?></td>
                    <td><?php echo $user['mobile']; ?></td>
                    <td width="6%"><?php echo (isset($aStatus[$user['status']])?$aStatus[$user['status']]:''); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary edit-shop-user" data-toggle="tooltip" title="Edit User" value="<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger del-record" data-rel="account_user" data-toggle="tooltip" title="Delete User" value="<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="clearfix"></div>
    </div>
</div>
