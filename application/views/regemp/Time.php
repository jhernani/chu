<!-- ----------------  TIME WRAPPER ---------------- -->

<div class="container" id="profilewrapper">
	
	<img src="<?= base_url(); ?>resources/images/logo/code_logo.png" class="center-block img-responsive" />
	
	<div>
		<div class="timedisplay">
			<div id="time">
				<span>
					<script type="text/javascript">

						(function () {

							function checkTime(i) {
								return (i < 10) ? "0" + i : i;
							}

							function startTime() {

								var today = new Date(),

								h = checkTime(today.getHours()),
								m = checkTime(today.getMinutes()),
								s = checkTime(today.getSeconds());

								ampm = h >= 12 ? 'PM' : 'AM';
								h = ((h + 11) % 12 + 1);
								
								document.getElementById('time').innerHTML = h + ":" + m + " " +ampm;

								time.style.fontSize = "11em";
								time.style.fontFamily = "dinpro";

								t = setTimeout(function () {
									startTime()
								}, 500);
							}

							startTime();

						})();

					</script>
				</span>
			</div>
		</div>
	</div>

	<div class="datedisplay">
		<p> <?= nice_date(unix_to_human(time()), 'l m-d-y'); ?> </p>
	</div>

	<footer>
		<a href='#timein' data-toggle='modal'>
			<input class="round-button" type="submit" value="IN"/>
		</a>
	</footer>
	
	<div class="datedisplay">
		<p> <?= $this->session->fullname; ?> </p>
	</div>
</div>

<!-- ---------------- END TIME WRAPPER ---------------- -->