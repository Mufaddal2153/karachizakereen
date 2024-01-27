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
                <?php endforeach;  ?>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($aLists): ?>
                    <?php foreach ($aLists as $aValue) : ?>
                        <tr>
                            <?php 
                            foreach($aColumns as $key => $data): ?>
                                <td><?php echo ($key == 'created_at' ? qsDateFormat($aValue[$key]) : $aValue[$key]); ?></td>
                            <?php
                            endforeach; ?>
                                <td>
                                    <a href="<?php echo HTTP_SERVER; ?>activity/workflow/<?php echo $type; ?>/<?php echo $aValue['id']; ?>" class="workflow-button btn btn-xs btn-success"><?php echo $button;?></a>
                                </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
