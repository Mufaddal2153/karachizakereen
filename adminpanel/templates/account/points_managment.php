<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Points Details</h4>
    </div>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php
        endif;
        if (isset($flash['success'])) :
        ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    
    <div class="panel-body">  
        <table class="table table-striped datatable table-bordered" data-order="[[ 2, &quot;desc&quot; ]]">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Store Name</th>
                    <th width="12%">Packages</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($points as $i => $user) { ?>
                <tr align="center">
                    <td width="10%"><?php echo $user['id']; ?></td>
                    <td width="700px"><?php echo $user['title']; ?></td>
                    <td>
                        <a href="<?php echo HTTP_SERVER?>account/points_detail/<?php echo $user['id'];?>"><?php echo $user['packages']; ?></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>