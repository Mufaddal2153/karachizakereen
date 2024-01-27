<div class="inner-body schedule-area" id="printableArea">
	<?php if(!empty($search_results)) { ?>
		<style type = "text/css">
            @media print {
                .table tr .coodinator{ display: none; }
            }
        </style>
		<h3 class="text-center"><?php echo $search_results[0]['teeper']; ?> - <?php echo $search_results[0]['its']; ?></h3>
		<h4 class="text-center">Hizbe <?php echo $search_results[0]['party_name']; ?></h4>
		<p>&nbsp;</p>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center">S.No</th>
						<th>Urus / Majlis Title</th>
						<th class="eng-date text-center">Date</th>
						<th class="text-center">Hijri Date</th>
						<th class="text-center">Mohalla</th>
						<th class="coodinator text-center">Mohalla Coordinator</th>
						<?php /*<th class="text-center">You Attended?</th>
						<th class="text-center">Mohalla Aamil Feedback</th>*/ ?>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach ($search_results as $search_result) {
						$source = $search_result['date'];
						$date = new DateTime($source); ?>
						<tr<?php echo (strpos($search_result['urus'], 'Waaz') ? ' class="bold"' : ''); ?>>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><strong><?php echo $search_result['urus']; ?></strong></td>
							<td class="eng-date text-center"><?php echo ($search_result['is_multiple'] == 1) ? '-' : $date->format('dS F, Y');//$search_result['date']; ?></td>
							<td class="text-center"><?php echo ($search_result['is_multiple'] == 1) ? '-' : $hijri_date->date($search_result['date'])->getFullDate(); ?></td>
							<td class="text-center"><strong><?php echo $search_result['name']; ?></strong></td>
							<td class="coodinator text-center">
								<?php //echo ($search_result['time'] != '') ? $search_result['time'] : 'N/A'; ?>
								<?php if ($search_result['mohalla_co'] != '') { ?>
									<div class="contact-detail main-icons flex-center with-space">
										<div class="name">
											<strong><?php echo $search_result['mohalla_co']; ?></strong><br />
											<?php echo $search_result['mohalla_num']; ?>
										</div>
										<div class="contact">
											<a class="icon flex-center" href="tel:<?php echo $search_result['mohalla_num']; ?>">
												<span class="glyphicon glyphicon-earphone"></span> Click to Call Now
											</a>
										</div>
									</div>
								<?php } else { ?>
									N/A
								<?php } ?>
							</td>
							<?php /*<td class="text-center">
								<label class="checkbox-inline">
									<input type="checkbox" data-id="<?php echo $search_result['schedule_id']; ?>" data-type="user" name="attended" class="attended" <?php echo $search_result['attended'] ? "checked" : ""; ?> /> 
									YES
								</label>
							</td>
							<td class="text-center"><?php echo $search_result['verified'] == -1 ? "Pending" : ($search_result['verified'] ? "Yes, Attended" : "Didn't Attended"); ?></td>*/ ?>
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
		<p><input type="button" onclick="printDiv('printableArea')" value="Print Your Schedule" class="btn btn-primary" id="print" /></p>
	</div>
<?php } ?>