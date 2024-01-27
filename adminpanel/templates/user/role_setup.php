<div id="page-inner">
    <h3 class="page-header"><i class="glyphicon glyphicon-user"></i> User Roles
        <button class="btn btn-success pull-right add"><i class="glyphicon glyphicon-plus"></i> Add User Roles</button>
    </h3>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php elseif (isset($flash['success'])): ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="form-block hide panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Add/Edit User Role</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="role_name">Role Name : </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="name" id="role_name" required>
                        </div>
                    </div>

                    <div id="permissions">
                        <div class="panel-group" id="accordion">
                            <div class="text-big">
                                <div class="col-sm-4">Access On</div>
                                <div class="col-sm-2 text-center"><a href="javascript:void(0)" data-rel="C" class="select-all">Create</a></div>
                                <div class="col-sm-2 text-center"><a href="javascript:void(0)" data-rel="V" class="select-all">View</a></div>
                                <div class="col-sm-2 text-center"><a href="javascript:void(0)" data-rel="U" class="select-all">Update</a></div>
                                <div class="col-sm-2 text-center"><a href="javascript:void(0)" data-rel="D" class="select-all">Delete</a></div>
                                <div class="clearfix"></div>
                            </div>
                            <?php if (!empty($aResources)) : ?>
                                <?php foreach ($aResources as $sKey => $resource) : ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $sKey; ?>">
                                                    <i class="glyphicon glyphicon-plus"></i> <?php echo $resource['name']; ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="<?php echo $sKey ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php $iCount = count($resource['child']); foreach ($resource['child'] as $i => $aChild): ?>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <?php echo $aChild['page_name']; ?>
                                                        </div>
                                                        <div class="col-sm-2 text-center"><input type="checkbox" name="permissions[<?php echo $aChild['id']; ?>][]" class="permissions" align="center" value="C"></div>
                                                        <div class="col-sm-2 text-center"><input type="checkbox" name="permissions[<?php echo $aChild['id']; ?>][]" class="permissions" align="center" value="V"></div>
                                                        <div class="col-sm-2 text-center"><input type="checkbox" name="permissions[<?php echo $aChild['id']; ?>][]" class="permissions" align="center" value="U"></div>
                                                        <div class="col-sm-2 text-center"><input type="checkbox" name="permissions[<?php echo $aChild['id']; ?>][]" class="permissions" align="center" value="D"></div>
                                                    </div>
                                                    <?php if($iCount != ($i+1)): ?>
                                                    <hr />
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                    <input type="hidden" id="role" value="0" >
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" value="create"><i class="glyphicon glyphicon-check"></i> Submit</button>
                            <button type="reset" name="reset" class="btn btn-default reset-button"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="fa fa-bars"></i>
                 List Applications
             </h4>
        </div>
        <div class="panel-body">
            <?php if (!empty($aRoles)) : ?>
                <table class="table table-striped datatable">
                    <thead>
                    <th width="8%">S.NO</th>
                    <th width="15%">Role Name</th>
                    <th>Modules</th>
                    <th width="15%">Actions</th>
                    </thead>

                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($aRoles as $name => $modules) :
                        $id = $modules['id'];
                        unset($modules['id']);
                        $count = count($modules) - 1;
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $name; ?></td>
                            <td>
                                <?php
                                foreach ($modules as $j => $module) {
                                    echo $module . ($j != $count ? "," : "");
                                }
                                ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary edit-role" data-toggle="tooltip" title="Edit Role" value="<?php echo $id; ?>"><i class=" glyphicon glyphicon-edit"></i></button>
                                    <button type="button"class="btn btn-sm btn-danger del-record" data-rel="user_role" data-toggle="tooltip"  value="<?php echo $id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>  