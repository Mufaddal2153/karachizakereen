<?php if(isset($aMohalla) && !isset($search_results)) : ?>
<div class="row">
    <div class="col-sm-2 col-md-4"></div>
    <div class="col-sm-6 col-md-4">
        <p class="text-center">Please select Mohalla to get the schedule:</p>
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <?php echo CHtml::dropDownList('mohalla','',$aMohalla, array('class' => 'form-control','prompt' => 'Select Mohalla')); ?>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <button type="button" class="search-mohalla btn btn-primary" style="width: 100%;">Search</button>
                <div class="clearfix"></div>
                <span class="loading-search">&nbsp;</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2 col-md-4"></div>
</div>
<div class="clearfix"></div>
<div id="search-data"></div>
<?php else: ?>
    <div class="inner-body" id="printableArea">
    	<?php if(!empty($search_results)) { ?>
    		<h2><?php echo $search_results[0]['mohalla']; ?></h2>
            <p>&nbsp;</p>
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-hover vertical-middle">
    				<thead>
    					<tr>
    						<th class="text-center">S.No</th>
    						<th>Urus / Majlis Title</th>
    						<th class="eng-date text-center">Date</th>
    						<th class="text-center">Hijri Date</th>
    						<th class="text-center">Teeper Name</th>
                            <th class="text-center">Party Name</th>
                            <th class="text-center">Teeper Contact #</th>
                            <?php /*<th class="text-center">Zakereen Attended?</th>*/ ?>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $i = 1; foreach ($search_results as $search_result) {
    						$source = $search_result['date'];
    						$date = new DateTime($source); ?>
    						<tr>
    							<td class="text-center"><?php echo $i++; ?></td>
    							<td><?php echo $search_result['urus']; ?></td>
    							<td class="eng-date text-center"><?php echo ($search_result['is_multiple'] == 1) ? '-' : $date->format('dS F, Y'); ?></td>
    							<td class="text-center"><?php echo ($search_result['is_multiple'] == 1) ? '-' : $hijri_date->date($search_result['date'])->getFullDate(); ?></td>
    							<td class="text-center"><?php echo $search_result['teeper']; ?></td>
                                <td class="text-center"><?php echo 'Hizbe ' . $search_result['party_name']; ?></td>
                                <td class="text-center"><?php echo $search_result['phone']; ?></td>
                                <?php /*<td class="text-center">
                                    <select class="form-control verified" data-type="aamil" data-id="<?php echo $search_result['schedule_id']; ?>" name="verified">
    									<?php foreach ($status as $key => $value) : ?>
    										<option <?php echo $search_result['verified'] == $key ? "selected" : "" ?> value="<?php echo $key; ?>">
                                                <?php echo $value; ?>
                                            </option>	
    									<?php endforeach; ?>
									</select>
								</td>*/ ?>
    						</tr>
    					<?php } ?>
    				</tbody>
    			</table>
    		</div>
    	<?php } else { ?>
    		<div class="alert alert-danger" role="alert">No schedule available for now...</div>
    	<?php } ?>
    </div>

    <?php if(!empty($search_results)) { ?>
    	<div class="text-center">
    		<p><input type="button" onclick="printDiv('printableArea')" value="Print This Schedule" class="btn btn-primary" id="print" /></p>
    	</div>
    <?php } ?>
<?php endif; ?>