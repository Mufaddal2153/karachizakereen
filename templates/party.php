<div class="inner-body" id="printableArea">
    <?php if(!empty($data)) { ?>
        <h3>Zakereens List</h3>
        <p>&nbsp;</p>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center">S.No</th>
						<th class="text-center">Leader's ITS #</th>
						<th class="text-center">Party Name</th>
						<th class="text-center">Leader Name</th>
						<th class="text-center">Leader's Phone #</th>
						<th class="text-center">Party Zone</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach ($data as $search_result) { ?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td class="text-center"><?php echo $search_result['its']; ?></td>
							<td class="text-center">Hizbe <?php echo $search_result['name']; ?></td>
							<td class="text-center"><?php echo $search_result['teeper']; ?></td>
							<td class="text-center"><?php echo $search_result['phone']; ?></td>
							<td class="text-center"><?php echo $search_result['zone']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	<?php } else { ?>
		<div class="alert alert-danger" role="alert">No zakereens available...</div>
	<?php } ?>
</div>

<?php if(!empty($data)) { ?>
	<div class="text-center">
		<p><input type="button" onclick="printDiv('printableArea')" value="Print This Schedule" class="btn btn-primary" id="print" /></p>
	</div>
<?php } ?>