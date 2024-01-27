<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Create Users
        <button class="btn btn-primary btn-sm pull-right"  id="add-btn"><i class="glyphicon glyphicon-plus"></i> Add Users</button>
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
            <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="name">Name: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" required />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="col-sm-4 control-label" for="role_id">User Role: </label>
                    <div class="col-sm-8">
                        <?php echo CHtml::dropDownList('role_id','',$roles,array('class'=>'form-control','prompt'=>'Select Role')); ?>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">Email: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" id="email" required />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="mohallas">Password: </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" id="Password" required />
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary" value="create">Submit <i class="glyphicon glyphicon-share"></i></button>
                        <button type="reset" name="reset" class="btn btn-default" onclick="displaysection()">Reset <i class="glyphicon glyphicon-refresh"></i></button>
    <!--                    <img src="../img/ajax-loader.gif" alt="Wait"  id="loader" style="display:none;" />-->
                    </div>
                </div>
                <hr/>
            </form>
        </div>
        <table class="table table-striped datatable table-bordered">
            <thead>
            <th width="10%">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th width="15%">Role</th>
            <th width="15%">Actions</th>
            </thead>

            <tbody>
                <?php foreach ($users as $i => $user) { ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo ($user['name'] ? $user['name'] : "-"); ?></td>
                        <td><?php echo ($user['email'] ? $user['email'] : "-"); ?></td>
                        <td rel="<?php echo $user['role_id'] ?>"><?php echo (isset($roles[$user['role_id']])?$roles[$user['role_id']]:''); ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary edit-user" data-toggle="tooltip" title="Edit User" value="<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                                <button type="button" class="btn btn-sm btn-danger del-record" data-rel="usee" data-toggle="tooltip" title="Delete User" value="<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div class="clearfix"></div>
    </div>
</div>