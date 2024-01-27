<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-pencil-square-o"></i>
         <?php echo $sHeading; ?>
    </div>
    <div class="panel-body">
        <table class="table table-striped datatable table-bordered">
            <thead>
                <tr>
                <?php foreach($aColumns as $key => $data): ?>
                    <th><?php echo $data; ?></th>
                <?php endforeach; ?>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                <?php if($aLists): ?>
                    <?php foreach ($aLists as $aValue) : ?>
                        <tr>
                            <?php 
                            foreach($aColumns as $key => $data): ?>
                                <td><?php 
                                switch($key) {
                                    case 'status': 
                                    case 'status_id':
                                        if($aValue[$key] == 0){ 
                                            echo 'Pending';
                                        } else {
                                            echo 'Approved';
                                        }
                                        break;
                                    case 'renewal_date':
                                    case 'created_at':
                                        echo qsDateFormat($aValue[$key]); 
                                        break;
                                    default :
                                        echo $aValue[$key]; 
                                        break;
                                } ?></td>
                            <?php
                            endforeach; ?>
                            <td><div class="btn-group">
                            <?php if($type == 'invoice'): ?>
                                    <a href="<?php echo HTTP_SERVER; ?>invoice/view_invoice/<?php echo $aValue['id']; ?>" title="View Invoice" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-list-alt"></i></a>
                            <?php elseif($type == 'renewal'): ?>
                                    <a href="<?php echo HTTP_SERVER; ?>invoice/view_invoice/<?php echo $aValue['id']; ?>" title="View Invoice" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-list-alt"></i></a>
                            <?php elseif($type == 'profile'): ?>
                                    <a href="<?php echo HTTP_SERVER; ?>member/profile/<?php echo $aValue['id']; ?>" title="View Profile" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-list-alt"></i></a>
                            <?php elseif($type == 'application'): ?>
                                <?php if(checkResourcePermission('/invoice/view_application','v')): ?>
                                    <a href="<?php echo HTTP_SERVER ?>invoice/view_application/<?php echo $aValue['id']; ?>" class="btn btn-default btn-sm" id="surrender-app" title="View Application"><i class="glyphicon glyphicon-list-alt"></i></a>
                                <?php endif; ?>
                                <?php if(checkResourcePermission('/application','v')): ?>
                                    <a href="<?php echo HTTP_SERVER ?>application/<?php echo $aValue['id']; ?>" class="btn btn-info btn-sm" id="surrender-app" title="Edit Application"><i class="glyphicon glyphicon-edit"></i></a>
                                <?php endif; ?>
                            <?php endif; ?>
                                </div></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
