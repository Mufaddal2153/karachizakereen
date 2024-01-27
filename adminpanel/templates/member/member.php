<div id="page-inner">
    <h3 class="page-header">
        <i class="fa fa-users"></i>
        Members 
    </h3>
    <div class="panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-filter"></i>
             Filter 
        </div>
        <div class="panel-body">
            <div class="form-block">
                <form class="form-horizontal" role="form" id="member-form">
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="filter_company">Company:</label>
                        <div class="col-sm-3">
                            <?php echo CHtml::dropDownList('filter_company', $aVal['filter_company'], $aCompanies, array('class' => 'form-control chzn-select','prompt' => 'Select Option')); ?>
                        </div>
                        
                        <label class="col-sm-1 control-label" for="filter_gcptype">City:</label>
                        <div class="col-sm-3">
                        <?php echo CHtml::dropDownList('filter_city', $aVal['filter_city'], $aCities, array('class' => 'form-control chzn-select','prompt' => 'Select Option')); ?>
                        </div>
                        
                        <label class="col-sm-1 control-label" for="filter_status">Status:</label>
                        <div class="col-sm-3">
                            <?php echo CHtml::dropDownList('filter_status', $aVal['filter_status'], $aStatus, array('class' => 'form-control chzn-select','prompt' => 'Select Option')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-right col-sm-12">
                            <button id="filter" type="submit" name="submit" class="btn btn-info filter"><i class="glyphicon glyphicon-filter"></i> Filter </button>
                            <a id="reset" href="<?php echo HTTP_SERVER ?>member" class="btn btn-warning"><i class="glyphicon glyphicon-recycle"></i> Reset </a>
                        </div>   
                    </div>   
                </form>
            </div>
        </div>
    </div>
   <div id="messageflash"></div>
    <?php if (isset($flash['errors'])) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success'])) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <?php if(isset($flash['message'])) echo '<div class="alert alert-success">'.$flash['message'].'</div>'; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-bars"></i>
             List Members
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th width="2">S.No</th>
                            <th>Company Name</th>
                            <th>Member Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Last Invoice No</th>
                            <th>Status</th>   
                            <th width="4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aMembers as $i => $result): ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $result->name;?></td>
                            <td><?php echo $result->first_name,' ',$result->last_name ;?></td>
                            <td><?php echo $result->email;?></td>
                            <td><?php echo $result->city_name;?></td>
                            <td><?php echo $result->invoice_number;?></td>
                            <td><?php echo $aStatus[$result->status];?></td>
                            <td width="10%">
                                <div class="btn-group">
                                    <?php if(checkResourcePermission('/member','v')): ?>
                                        <a href="<?php echo HTTP_SERVER; ?>member/view/<?php echo $result->id;?>" class="btn btn-sm btn-success" title="View Member history"><i class="glyphicon glyphicon-search"></i></a>
                                    <?php endif; ?>
                                    <?php if(checkResourcePermission('/member','u')): ?>
                                        <a href="<?php echo HTTP_SERVER; ?>member/edit/<?php echo $result->id;?>" class="btn btn-sm btn-warning" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                                    <?php endif; ?>
                                    <?php if(checkResourcePermission('/member','d')): ?>
                                        <button data-rel="<?php echo $result->id;?>" class="btn btn-sm btn-danger delete-member" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
                                    <?php endif; ?>
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