<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" /> -->

<h3 class="main-heading text-center">Zakereen Data Collection</h3>

<div class="container">

	<?php if (isset($flash['success'])) : ?>
		<div class="alert alert-success"><?php echo $flash['success']; ?></div>
	<?php endif; ?>

	<?php if(!isset($aResults) && isset($aParties)): ?>

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

		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="<?php // echo $scheduleurl; ?>assets/js/jquery.fileupload.js"></script>
		<script src="<?php // echo $scheduleurl; ?>assets/js/jquery.fileupload-process.js"></script>
		<script src="<?php // echo $scheduleurl; ?>assets/js/jquery.fileupload-image.js"></script>
		<script src="<?php // echo $scheduleurl; ?>assets/js/jquery.fileupload-ui.js"></script> -->
		<script type="text/javascript">

			$('.registered').datepicker( {
				yearRange: "c-100:c",
				changeMonth: false,
				changeYear: true,
				showButtonPanel: true,
				closeText:'Select',
				currentText: 'This year',
				onClose: function(dateText, inst) {
					var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
					$(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
				}
			}).focus(function () {
				$(".ui-datepicker-month").hide();
				$(".ui-datepicker-calendar").hide();
				$(".ui-datepicker-current").hide();
				$(".ui-datepicker-prev").hide();
				$(".ui-datepicker-next").hide();
				$("#ui-datepicker-div").position({
					my: "left top",
					at: "left bottom",
					of: $(this)
				});
			}).attr("readonly", false);

			$(".num").mask("9999-9999999");

			$('.dob').datepicker({
				format: 'yyyy-mm-dd',
			});

			var html = $('#data_form .member-row:first-child').html();
			console.log(html);
			var rowCount = 0;

			function addRow() {
				var count = ++rowCount;
				console.log(count);
				newhtml = html.replace(/_0/g, '_'+count);
				newhtml = newhtml.replace(/\[0\]/g, '[' + count + ']');
				obj = $(`<div class="member-row">${newhtml}</div>`)
				$('#data_form .member-data').append(obj);
				$('.remove_data').removeClass('hide');
				/*if ($('#schedule_table tbody tr').length > 1) {
				}*/
				$(".num").mask("9999-9999999");
				setFileUpload();
				return $('#data_form .member-row:last');
			}

			$(document).on('click', '.remove_data', function() {
				$(this).parents('.member-row').remove();
			})

			$(document).on('click', '#add_row', function() {
				addRow();
			});

			function setFileUpload() {
				$('.fileupload').fileupload({
					url: baseUrl + 'upload',
					dataType: 'json',
					beforeSend: function() {
						let parent = $(this).parents('.form-group');
						$('span.filename', parent).addClass('hide');
						$('label.filelabel', parent).show('<div class="loading-search"></div>'); //.hide();
					},
					done: function(e, data) {
						console.log(e,data);
						let obj = e.target;
						let parent = $(obj).parents('.form-group');
						// $('.fileinput-button').show();
						$('.loading-search').hide();
						var file = data.result.files[0];
						if (file.hasOwnProperty('error')) {
							alert(file.error);
						} else {
							alert("File Successfully Added.");
							$('span.filename', parent).html(
								'<img src="' + file.full_name + '" class="img-thumbnail" />'
							).removeClass('hide');
							$('.hdn-attach-file', parent).val(file.name);
						}
					},
					add: function(e, data) {
						let obj = e.target;
						let parent = $(obj).parents('.form-group');
						data.formData = {
							old_file: $('.hdn-attach-file', parent).val()
						};
						data.submit();
					}
				});
			}

			setTimeout(function() {
				setFileUpload();
			}, 500);

			$(document).on('click', '#data_form #data_submit', function() {
				var obj = $(this);
				$('.ajax-result').remove();
				if($('#party').val() == "") {
					$('#data_form').addClass('hide');
					return false;
				}

				$.ajax({
					url: baseUrl + 'partyinfo',
					type: 'POST',
					dataType: 'json',
					data: $('#data_form').serialize(),
					beforeSend: function() {
						//$('#data_form').addClass('hide');
						//obj.hide();
						obj.before('<div class="loading-search"></div>');
						$('.alert-danger').remove();
					},
					success: function(res) {
						alert("Success");
						location.reload()
					},
					fail: function() {
						alert('Error: Saving Data');
					},
					complete: function() {
						$('.loading-search').remove();
						obj.show();
					}
				});
			});

		</script>

	<?php endif; ?>

</div>