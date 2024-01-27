<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="glyphicon glyphicon-user"></i> Shop Users</h4>
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
        <table class="table table-striped datatable table-bordered">
            <thead>
                <tr>
                    <th width="15%">Shop ID</th>
                    <th>Shop Name</th>
                    <th width="25%">Manage Users</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($user as $i => $user) : ?>
                <tr align="center">
                    <td width="2%"><?php echo $user['id']; ?></td>
                    <td ><?php echo $user['title']; ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo HTTP_SERVER?>account/manage_users/<?php echo $user['id'];?>">Manage</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>