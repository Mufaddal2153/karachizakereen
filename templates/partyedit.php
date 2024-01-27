<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<?php if (isset($flash['success'])) : ?>
    <div class="alert alert-success"><?php echo $flash['success']; ?></div>
<?php endif; ?>
<h3 class="main-heading text-center">Zakereen Data Edit</h3>

<div class="container">

	<?php if (isset($flash['success'])) : ?>
		<div class="alert alert-success"><?php echo $flash['success']; ?></div>
	<?php endif; ?>

	<?php if(!isset($aResults) && isset($aParties)): ?>
		<div class="panel panel-default form-horizontal">
	        <div class="panel-heading">
	            <h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span> Filter</h3>
	        </div>
	        <div class="panel-body">
	            <div class="row">
	                <div class="col-sm-6">
	                    <form class="form-horizontal" id="schedule_report">
	                        <label>Party Name:</label>
	                        <div class="form-group">
	                            <div class="col-xs-8 col-sm-8 col-md-8">
	                                <?php echo CHtml::dropDownList('party','',$aParties, array('class' => 'form-control chzn-select','prompt' => 'Choose Party')); ?>
	                            </div>
	                            <div class="col-xs-4 col-sm-4 col-md-4">
	                                <button type="button" class="btn btn-primary" id="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	                <div class="col-sm-6">
	                    <form class="form-horizontal" id="schedule_csv" method="POST" enctype="multipart/form-data" action='<?php echo CURR_DIR.'schedule_csv' ?>'>
	                        <label>Import Schedule: <a href="http://karachizakereen.org/schedule/import-schedule-sample.csv" download="">Download Sample</a></label>
	                        <div class="form-group">
	                            <div class="col-xs-8 col-sm-8 col-md-8">
	                                <input type="file" name="schedule_file" class="form-control" id="file" class="file"/>
	                            </div>
	                            <div class="col-xs-4 col-sm-4 col-md-4">
	                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-upload"></span> Import</button>
	                            </div>
	                        </div>
	                        <?php /*<label>&nbsp;</label>
	                        <button type="button" onclick="location.href='<?php echo CURR_DIR.'adminindex'?>'" class="btn btn-warning">Back</button>*/ ?>
	                    </form>
	                </div>
	            </div>
	        </div>
	        <form id="schedule_form" method="post" action="" class="form hide">
		        <div class="panel panel-default form-horizontal">
		            <div class="panel-body">
		                <div class="text-right">
		                    <button type="submit" name="submit" id="schedule_submit" class="btn btn-success" value="create">Save</button>
		                </div>
		                <hr />
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="schedule_table">
		                        <thead>
		                            <tr>
		                                <th class="text-center">Urus / Majlis Title</th>
		                                <th class="text-center">Mohalla</th>
		                                <th class="text-center">Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<tr>
		                                <td>
		                                <?php echo CHtml::dropDownList('target[0][event_id]','',$aEvents, array('class' => 'form-control event','prompt' => 'Choose Event')); ?>
		                                </td>
		                                <td>
		                                	<?php echo CHtml::dropDownList('target[0][mohalla_id]','',$aMohalla, array('class' => 'form-control mohalla','prompt' => 'Choose Mohalla')); ?>
		                                </td>
		                                <td class="text-center">
		                                    <button type="button" class="btn btn-md btn-primary" id="remove_schedule">Remove</button>
		                                </td>
		                            </tr>
		                        </tbody>
		                        <tfoot class="hidden">
		                            <tr>
		                            <td>
		                            <?php echo CHtml::dropDownList('target[-1][event_id]','',$aEvents, array('class' => 'form-control event','prompt' => 'Choose Event')); ?>
		                            </td>
		                                
		                                <td>
		                                	<?php echo CHtml::dropDownList('target[-1][mohalla_id]','',$aMohalla, array('class' => 'form-control mohalla','prompt' => 'Choose Mohalla')); ?>
		                                </td>
		                                <td class="text-center">
		                                    <button type="button" class="btn btn-md btn-primary" id="remove_schedule">Remove</button>
		                                </td>
		                            </tr>
		                        </tfoot>
		                    </table>
		                </div>

		                <hr />

		                <div class="text-center">
		                    <button type="button" class="btn btn-info" id="add_schedule">Add New Row</button>
		                </div>
		            </div>
		        </div>
		    </form>
	    </div>

		<?php /*<div class="panel panel-default form-horizontal">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span> Filter</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<form class="form-horizontal" id="data_report">
							<label>Party Name:</label>
							<div class="form-group">
								<div class="col-xs-8 col-sm-8 col-md-8">
									<?php echo CHtml::dropDownList('party','',$aParties, array('class' => 'form-control chzn-select','prompt' => 'Choose Party')); ?>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4">
									<button type="button" class="btn btn-primary" id="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-6">&nbsp;</div>
				</div>
			</div>
		</div>*/ ?>

		<form id="data_form" method="post" action="" class="form">
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="row">
						<div class="col-sm-4 form-group">
							<label>Party Name:</label>
							<?php echo CHtml::dropDownList('party_id','',$aParties, array('class' => 'form-control chzn-select','prompt' => 'Choose Party')); ?>
						</div>

						<div class="col-sm-4 form-group">
							<label>Registered Mohalla:</label>
							<?php echo CHtml::dropDownList('mohalla_id','',$aMohalla, array('class' => 'form-control mohalla','prompt' => 'Choose Mohalla')); ?>
						</div>

						<div class="col-sm-4">
							<label>Registered Since:</label>
							<input type="text" class="form-control date registered" value="" data-date-format="yyyy" data-provide="datepicker" name="registered" />
						</div>
					</div>

				</div>
			</div>

			<hr />

			<h3 class="text-center">Teeper / Member Details</h3>

			<div class="member-data">

				<div class="member-row">
					<div class="panel panel-default">		
						<div class="panel-body row">
							<div class="col-sm-3 form-group">
								<label>ITS #: <span class="red">*</span></label>
								<input type="text" class="form-control required" value="" maxlength="8" name="members[0][its]" />
							</div>
							<div class="col-sm-3 form-group">
								<label>Prefix:</label>
								<select class="form-control" name="members[0][prefix]">
									<option value="">--Choose--</option>
									<option value="Mulla">Mulla</option>
									<option value="Sheikh">Sheikh</option>
								</select>
							</div>
							<div class="col-sm-4 form-group">
								<label>Full Name: <span class="red">*</span></label>
								<input type="text" class="form-control required" value="" name="members[0][name]" />
							</div>
							<div class="col-sm-2 form-group">
								<label>Rank: <span class="red">*</span></label>
								<select class="form-control" name="members[0][rank]">
									<option value="">--Choose--</option>
									<option value="Teeper">Teeper</option>
									<option value="Side Teeper">Side Teeper</option>
									<option value="Member">Member</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label>DOB: <span class="red">*</span></label>
								<input type="text" class="form-control date datepicker" value="" data-date-format="yyyy-mm-dd" data-provide="datepicker" name="members[0][dob]" />
							</div>
							<div class="col-sm-3 form-group">
								<label>Mobile #: <span class="red">*</span></label>
								<input type="text" class="form-control num" value="" name="members[0][mobile]" />
							</div>
							<div class="col-sm-3 form-group">
								<label>Alternate #:</label>
								<input type="text" class="form-control num" value="" name="members[0][alternate]" />
							</div>
							<div class="col-sm-3 form-group">
								<label>WhatsApp #: <span class="red">*</span></label>
								<input type="text" class="form-control num" value="" name="members[0][whatsapp]" />
							</div>
							<div class="col-sm-4 form-group">
								<label>Email Address: <span class="red">*</span></label>
								<input type="text" class="form-control email" value="" name="members[0][email]" />
							</div>
							<div class="col-sm-2 form-group">
								<label>Title (if any):</label>
								<input type="text" class="form-control" value="" name="members[0][title]" />
							</div>
							<div class="col-sm-6 form-group">
								<label>Kalaam & Profile updated on Idaratal Zakereen?: <span class="red">*</span></label>
								<select class="form-control" name="members[0][idara]">
									<option value="">-- Choose --</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div class="col-sm-6 form-group">
								<label class="filelabel">Upload Photo: <span class="red">*</span> <small>Photo must be uploaded same as ITS</small><div class="loading-search"></div></label>
								<div class="fileinput-button">
									<input type="file" id="fileupload_0" class="fileupload form-control" value="" name="image" />
									<span class="filename"></span>
								</div>
								<input type="hidden" name="members[0][photo]" class="hdn-attach-file" value="" />
							</div>
							<div class="col-sm-6 form-group text-right">
								<label>&nbsp;</label>
								<button type="button" class="btn btn-md btn-primary hide remove_data">Remove</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center">
				<button type="button" class="btn btn-info" id="add_row">Add Member</button>
				<button type="button" name="submit" id="data_submit" class="btn btn-success" value="create">Save</button>
			</div>
		</form>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="<?php echo $scheduleurl; ?>assets/js/jquery.fileupload.js"></script>
		<script src="<?php echo $scheduleurl; ?>assets/js/jquery.fileupload-process.js"></script>
		<script src="<?php echo $scheduleurl; ?>assets/js/jquery.fileupload-image.js"></script>
		<script src="<?php echo $scheduleurl; ?>assets/js/jquery.fileupload-ui.js"></script>
		<script type="text/javascript">

			jQuery('.registered').datepicker( {
				yearRange: "c-100:c",
				changeMonth: false,
				changeYear: true,
				showButtonPanel: true,
				closeText:'Select',
				currentText: 'This year',
				onClose: function(dateText, inst) {
					var year = jQuery("#ui-datepicker-div .ui-datepicker-year :selected").val();
					jQuery(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
				}
			}).focus(function () {
				jQuery(".ui-datepicker-month").hide();
				jQuery(".ui-datepicker-calendar").hide();
				jQuery(".ui-datepicker-current").hide();
				jQuery(".ui-datepicker-prev").hide();
				jQuery(".ui-datepicker-next").hide();
				jQuery("#ui-datepicker-div").position({
					my: "left top",
					at: "left bottom",
					of: jQuery(this)
				});
			}).attr("readonly", false);

			jQuery(".num").mask("9999-9999999");

			$('.dob').datepicker({
				format: 'yyyy-mm-dd',
			});

			var html = jQuery('#data_form .member-row:first-child').html();
			console.log(html);
			var rowCount = 0;

			function addRow() {
				var count = ++rowCount;
				console.log(count);
				newhtml = html.replace(/_0/g, '_'+count);
				newhtml = newhtml.replace(/\[0\]/g, '[' + count + ']');
				obj = jQuery(`<div class="member-row">${newhtml}</div>`)
				jQuery('#data_form .member-data').append(obj);
				jQuery('.remove_data').removeClass('hide');
				/*if (jQuery('#schedule_table tbody tr').length > 1) {
				}*/
				jQuery(".num").mask("9999-9999999");
				setFileUpload();
				return jQuery('#data_form .member-row:last');
			}

			jQuery(document).on('click', '.remove_data', function() {
				jQuery(this).parents('.member-row').remove();
			})

			jQuery(document).on('click', '#add_row', function() {
				addRow();
			});

			function setFileUpload() {
				jQuery('.fileupload').fileupload({
					url: baseUrl + 'upload',
					dataType: 'json',
					beforeSend: function() {
						let parent = jQuery(this).parents('.form-group');
						jQuery('span.filename', parent).addClass('hide');
						jQuery('label.filelabel', parent).show('<div class="loading-search"></div>'); //.hide();
					},
					done: function(e, data) {
						console.log(e,data);
						let obj = e.target;
						let parent = $(obj).parents('.form-group');
						// jQuery('.fileinput-button').show();
						jQuery('.loading-search').hide();
						var file = data.result.files[0];
						if (file.hasOwnProperty('error')) {
							alert(file.error);
						} else {
							alert("File Successfully Added.");
							jQuery('span.filename', parent).html(
								'<img src="' + file.full_name + '" class="img-thumbnail" />'
							).removeClass('hide');
							jQuery('.hdn-attach-file', parent).val(file.name);
						}
					},
					add: function(e, data) {
						let obj = e.target;
						let parent = $(obj).parents('.form-group');
						data.formData = {
							old_file: jQuery('.hdn-attach-file', parent).val()
						};
						data.submit();
					}
				});
			}

			setTimeout(function() {
				setFileUpload();
			}, 500);

			jQuery(document).on('click', '#data_form #data_submit', function() {
				var obj = jQuery(this);
				jQuery('.ajax-result').remove();
				if(jQuery('#party').val() == "") {
					jQuery('#data_form').addClass('hide');
					return false;
				}

				jQuery.ajax({
					url: baseUrl + 'partyinfo',
					type: 'POST',
					dataType: 'json',
					data: jQuery('#data_form').serialize(),
					beforeSend: function() {
						//jQuery('#data_form').addClass('hide');
						//obj.hide();
						obj.before('<div class="loading-search"></div>');
						jQuery('.alert-danger').remove();
					},
					success: function(res) {
						alert("Success");
						location.reload()
					},
					fail: function() {
						alert('Error: Saving Data');
					},
					complete: function() {
						jQuery('.loading-search').remove();
						obj.show();
					}
				});
			});

			function clearScheduleForm() {
				$('#schedule_form input').val('');
				$('#schedule_form input[type=hidden]').remove();
				$('#schedule_form select option:first').attr('selected', true);
				$('#schedule_table tbody tr').not(':first').remove();
				//$('#remove_schedule').addClass('hide');
			}

			jQuery(document).on('click', '#schedule_report #submit', function() {
			    var obj = jQuery(this);
			    jQuery('.ajax-result').remove();
			    if(jQuery('#party').val() == "") {
			        jQuery('#schedule_form').addClass('hide');
			        return false;
			    }
			    jQuery.ajax({
			        url: baseUrl + 'schedule',
			        type: 'POST',
			        dataType: 'json',
			        data: {party: jQuery('#party').val()},
			        beforeSend: function() {
			            jQuery('#schedule_form').addClass('hide');
			            //obj.hide();
			            obj.before('<div class="loading-search"></div>');
			            jQuery('.alert-danger').remove();
			        },
			        success: function(res) {
			                clearScheduleForm();
			                var html = "";

			                jQuery('#schedule_form').removeClass('hide');
			                if (res.schedules.length > 0) {
			                    jQuery.each(res.schedules, function (i, val) {
			                        if (i == 0 && jQuery('#schedule_table tbody tr').length >= 1) {
			                            var row = jQuery('#schedule_table tbody tr:first');
			                        } else {
			                            var row = addScheduleRow();
			                        }
			                        row.append('<input type="hidden" id="id" name="target[' + i + '][id]" value="' + val.id + '" />');
			                        jQuery('.event option[value='+val.event_id+']', row).attr('selected', true);
			                        jQuery('.mohalla option[value='+val.mohalla_id+']', row).attr('selected', true);
			                        //row.append('<input type="button" id="remove_schedule" class="btn btn-md btn-primary"/>Remove</button>');
			                        //jQuery('.multiple', row).prop('checked',val.is_multiple == 1);
			                        
			                    });
			                    // jQuery('.party').prop('disabled',true);
			                } else {
			                    jQuery('#schedule_table tbody').html('');
			                    if(jQuery('#schedule_table tbody tr').length == 0)
			                        addScheduleRow();
			                    alert('No Record Found');
			                }
			                    
			                jQuery('#schedule_submit').val(jQuery('#party').val());
			        },
			        fail: function() {
			            alert('Error: Saving Data');
			        },
			        complete: function() {
			            jQuery('.loading-search').remove();
			            obj.show();
			        }
			    });
			});
		</script>

		<script type="text/javascript">
	        jQuery('.datepicker').datepicker({
	            format: 'yyyy-mm-dd',
	            startDate: '-3d'
	        });
	    </script>

	<?php endif; ?>

</div>