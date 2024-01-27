<div class="row">
	<div class="col-sm-2 col-md-4"></div>
	<div class="col-sm-6 col-md-4">
		<p class="text-center">Please enter Party Teeper ITS # to get your schedule:</p>
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8">
				<input type="number" class="form-control search-text number required" oninput="maxLengthCheck(this)" maxlength="8" id="search" value="" name="search_term" />
				<div class="error ajax-result alert alert-danger" role="alert" style="display: none;">Invalid ITS #</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4">
				<button type="button" class="search-submit btn btn-primary" style="width: 100%;">Search</button>
				<div class="clearfix"></div>
				<span class="loading-search">&nbsp;</span>
			</div>
		</div>
	</div>
	<div class="col-sm-2 col-md-4"></div>
</div>
<div class="clearfix"></div>

<div id="search-data">

</div>

<script>
	// This is an old version, for a more recent version look at
	// https://jsfiddle.net/DRSDavidSoft/zb4ft1qq/2/
	function maxLengthCheck(object) {
		if (object.value.length > object.maxLength)
		object.value = object.value.slice(0, object.maxLength)
	}
</script>