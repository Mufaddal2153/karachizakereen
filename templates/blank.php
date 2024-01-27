<div class="container">
	<div class="text-center">
		<p class="form-group"><img src="<?php echo $scheduleurl; ?>assets/images/ashara-mubaraka-1445h.jpg" alt="Ashara Mubaraka 1445H" /></p>
		<h3 class="form-group">Schedule Will be <strong>LIVE</strong> Soon</strong></h3>
		<hr />
		<div id="timer" class="row">
			<div class="col-sm-3 form-group">
				<div id="days" class="item"></div>
			</div>
			<div class="col-sm-3 form-group">
				<div id="hours" class="item"></div>
			</div>
			<div class="col-sm-3 form-group">
				<div id="minutes" class="item"></div>
			</div>
			<div class="col-sm-3 form-group">
				<div id="seconds" class="item"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function makeTimer() {
		var endTime = new Date("17 July 2023 17:00:00 GMT+0500");
			endTime = (Date.parse(endTime) / 1000);

		var now = new Date();
			now = (Date.parse(now) / 1000);

		var timeLeft = endTime - now;

		var days = Math.floor(timeLeft / 86400);
		var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
		var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
		var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

		if (days < "10") { days = "0" + days; }
		if (hours < "10") { hours = "0" + hours; }
		if (minutes < "10") { minutes = "0" + minutes; }
		if (seconds < "10") { seconds = "0" + seconds; }

		jQuery("#days").html(days + "<span>Days</span>");
		jQuery("#hours").html(hours + "<span>Hours</span>");
		jQuery("#minutes").html(minutes + "<span>Minutes</span>");
		jQuery("#seconds").html(seconds + "<span>Seconds</span>");		


		if (days == '00' && hours == '00' && minutes == '00' && seconds == '00'){
			jQuery("#counter-section").css("display", "none");
		}
	}
	setInterval(function() { makeTimer(); }, 1000);
	setTimeout(function () {
		location.reload(true);
	}, 5000);
</script>