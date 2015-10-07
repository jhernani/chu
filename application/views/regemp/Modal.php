<!-- ---------------- MODALS ---------------- -->

<?php
	if($timed_in === true) {
		$word = 'out';
	}else {
		$word = 'in';
	}
?>
		
<div class="modal fade" id="timein" tabindex='-1' role="dialog"> <!-- TIMEIN MESSAGE MODAL -->
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header"></div>
			<div class="modal-body" id="settingsform">
				<h2>
					Are you sure you want time <?= $word; ?>?
				</h2>
			</div>

			<div class="modal-footer">
				<div class="ui button" data-dismiss="modal"><i class="icon remove"></i>Cancel</div>
				<div id='timein_button' class="ui primary button"><i class="icon checkmark"></i>Ok</div>
			</div>

		</div>
	</div>
</div> <!-- END TIMEIN MESSAGE MODAL -->


<div class="modal fade" id="recent" tabindex='-1' role="dialog"> <!-- VIEW RECENT MODAL -->
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button><br>
			</div>
			
			<div class="modal-body">

				<table class="table">
					<tr>
						<th>Date</th>
						<th>Day</th>		
						<th>Time In</th>
						<th>Time Out</th>
						<th>Total Hours</th>
					</tr>
					<tr>
						<td>June 16, 2015</td>
						<td>Tuesday</td>		
						<td>10:00 AM</td>
						<td>07:00 PM</td>
						<td>9</td>
					</tr>
				</table>

				<p id="totalhours">Total Hours: 9</p>
			</div>
		</div>
	</div>
</div> <!-- END VIEW RECENT MODAL -->


<div class="modal fade" id="notification-modal" tabindex='-1' role="dialog"> <!-- Background of pop-up notification -->
	<div class="modal-dialog"> <!-- This is the dialog that will pop-up -->
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button> <br />
				<h4 class="modal-title">Outing</h4>
			</div>

			<div class="modal-body">
				I'm having a BBQ this weekend. Come by around 4pm if you can.
			</div>

			<div class="modal-footer">
				<div class="meta">
					<i class="check circle outline icon cursor-default green"></i>
					<label class="request-approve">Approve</label>
				</div>
			</div>
		</div>
	</div>
</div>  <!-- End Background of pop-up notification -->

<!-- ---------------- MODALS ---------------- -->
