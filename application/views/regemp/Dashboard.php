<!-- 4. CONTAINER OF EVERYTHING IN DASHBOARD -->
<div class="container" id="dashboardwrapper">

<!-- 5. DASH BOARD LEFT SIDE, CONTAINER OF PICTURE AND USER OPTIONS -->
<div class="col-md-2 col-sm-4 col-xs-12 dashboard-vertical-menu">

	  <div class="ui fluid card"> <!-- Image and Upload Image Form -->
		  <div class="image">
		    <img src="<?= base_url() . 'resources/images/users/' . $picture; ?>">
		  </div>
		  
		  <div id="profile-photo">
				<label for="file" class="ui icon grey button">
					<i class="photo icon"></i>
					Update Photo
				</label>
			<input type="file" id="file" style="display:none" />
		  </div>
		</div>

		<div class="ui fluid vertical menu">
		  <a onClick="show_request()" class="item">
		    Request <div class="ui teal label">1</div>
		  </a>

		  <a class="item">Payslip</a>

		  <a onClick="show_logs()" class="item">Logs</a>
		</div>

		<div class="ui compact fluid vertical labeled icon menu">
		  <a class="item">
		    <i class="newspaper icon"></i>Portfolio
		  </a>

		  <a onClick="show_settings()" class="item">
		    <i class="settings icon"></i>Settings
		  </a>
		</div>	
</div>
<!-- DASH BOARD LEFT SIDE, CONTAINER OF PICTURE AND USER OPTIONS -->

<!-- ************ 6. CONTAINER OF `SEND LEAVE REQUEST MESSAGE` AND `REQUEST FEED` ************ -->
<div class="col-md-10 col-sm-8 col-xs-12 dashboard-request" id="dashboard-request">
	<div class="full-height" id="leavewrapper">
		<div class="row full-scale">

			<!-- -------------------------------------------------------------------------------------- -->

			<div class="col-md-6 full-height" id="leave-message"> <!-- LEAVE MESSAGE -->
				<div class="row">

					<div>
						<label class=" col-lg-offset-0 col-md-1 col-md-offset-0 col-sm-1 col-xs-1 col-xs-offset-1">From:</label>
						<div class="ui input col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-12 col-xs-11 col-xs-offset-1">
							<input type="date">
						</div>
					</div>

					<div>
						<label class="col-lg-offset-0 col-md-1 col-md-offset-0 col-sm-1 col-xs-1 col-xs-offset-1">To:</label>
						<div class="ui input col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-12 col-xs-11 col-xs-offset-1">
							<input type="date">
						</div>
					</div>

					<div class="row col-md-11 col-xs-10 col-xs-offset-1">
						<div class="ui form">
	  						<div class="field">
	  							<textarea placeholder="Your reason here..."></textarea>
	    					</div>
						</div>
					</div>

					<div class="row col-md-5 col-md-offset-1 col-sm-6 col-xs-9 col-xs-offset-1 request-type-form">
						<div class="ui form">
						  <div class="field">
						    <select>
						      <option value="" disabled selected>Select Request</option>
						      <option value="sick_leave">Sick leave</option>
						      <option value="vacation_leave">Vacation leave</option>
						      <option value="paternity_leave">Paternity leave</option>
						      <option value="maternity_leave">Maternity leave</option>
						      <option value="overtime">Overtime</option>
						    </select>
						  </div>
						</div>
					</div>

					<div class="row col-md-6 col-md-offset-1 col-sm-6 col-xs-9 col-xs-offset-1">
						<div class="ui buttons" id="leave-button">
							<button class="ui button">Clear</button>
							<div class="or"></div>
							<button class="ui positive button">Submit</button>
						</div>
					</div>

				</div>
			</div> <!-- LEAVE MESSAGE -->

			<!-- -------------------------------------------------------------------------------------- -->
		
			<!-- DASHBOARD -> RIGHT MOST COLUMN -->

			<h3 class="ui header">
				Request Feed<i class="feed icon yellow"></i> 
			</h3>

			<div class="col-md-6 col-sm-12" id="requestwrapper"> <!-- REQUEST FEED WRAPPER -->
				<div class="row">
					<div class="col-md-6 full-width">
						<div class="row">
							<div>
								<div class="col-md-6 full-width" id="request-feed"> <!-- REQUEST FEED -->
									<div class="col-md-6 full-width">
										<div class="ui feed">
											<!--  FEED  -->

											<div class="event"> <!-- REQUEST APPROVE -->
												<div class="label">
													<img src="<?= base_url() . 'resources/images/users/' . $picture; ?>">
												</div>

												<div class="content">

													<div class="date">September 21, 2015</div>
													
													<div class="summary">
														<label class="request-name-color">Karla Bonotan</label> Overtime request
													</div>

													<div class="extra text">
														<div class="date">
															<p>
																<strong>From</strong>: 9-21-2015 <br />
																<strong>To</strong>: 9-22-2015 <br />
															</p>
														</div>
														Have you seen what's going on in Israel? Can you believe it.
													</div>

													<div class="meta">
														<i class="check circle outline icon cursor-default green"></i>
														<label class="request-approve">Approve</label>
														<i class="remove icon" data-toggle="tooltip" data-placement="right" title="You want to delete it?"></i>	
													</div>
												</div>
											</div>


											<div class="event"> <!-- REQUEST DENY -->
												<div class="label">
													<img src="<?= base_url() . 'resources/images/users/' . $picture; ?>">
												</div>

												<div class="content">

													<div class="date">September 21, 2015</div>

													<div class="summary">
														<label class="request-name-color">Karla Bonotan</label> Leave request
													</div>

													<div class="extra text">
														Have you seen what's going on in Israel? Can you believe it.
													</div>

													<div class="meta">
														<i class="remove circle outline icon cursor-default red"></i>
														<label class="request-deny">Deny</label>
														<i class="remove icon" data-toggle="tooltip" data-placement="right" title="You want to delete it?"></i>		
													</div>
												</div>
											</div>


											<div class="event"> <!-- REQUEST PENDING -->
												<div class="label">
													<img src="<?= base_url() . 'resources/images/users/' . $picture; ?>">
												</div>

												<div class="content">

													<div class="date">September 21, 2015</div>

													<div class="summary">
														<label class="request-name-color">Karla Bonotan</label> Leave request
													</div>

													<div class="extra text">
														Have you seen what's going on in Israel? Can you believe it.
													</div>

													<div class="meta">
														<i class="minus circle icon cursor-default yellow"></i>
														<label class="request-pending">Pending</label>
														<i class="remove icon" data-toggle="tooltip" data-placement="right" title="You want to delete it?"></i>	
													</div>
												</div>
											</div>


											<!--  FEED  -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- END OF REQUEST FEED WRAPPER -->

			<!-- -------------------------------------------------------------------------------------- -->
		
		</div>
	</div>
</div>
<!-- ************ END CONTAINER OF `SEND LEAVE REQUEST MESSAGE` AND `REQUEST FEED` ************ -->

<!-- 7. DASHBOARD -> LOGS -> DATE FILTER -->
<div class="col-md-10 col-sm-8 col-xs-12 dashboard-logs" id="dashboard-logs">

	<h3 class="ui top attached header" id="date-filter-header">Date Filter</h3>
	
	<div class="ui attached segment">

		<div class="row date-filter">
			<label class="col-md-1 col-sm-1 col-xs-1">From:</label>
			<div class="ui input col-md-3 col-sm-4 col-xs-12">
				<input type="date" />
			</div>

			<label class="col-md-1 col-sm-1 col-xs-1">To:</label>
			<div class="ui input col-md-3 col-sm-4 col-xs-12">
				<input type="date" />
			</div>
		</div>

		<div class="row dashboard-table">
			<div class="col-md-12">
				<table class="table">
					<tr>
					   	<th>Date</th>
					   	<th>Day</th>		
					   	<th>Time In</th>
					   	<th>Time Out</th>
					   	<th>Total Hours</th>
					</tr>

					<tr>
					    <td>April 03, 1991</td>
					    <td>Wednesday</td>		
					    <td>10:00 AM</td>
					    <td>07:00 PM</td>
					    <td>9</td>
					</tr>

				</table>
				<label class="col-md-2 pull-right">Total Hours: 9</label>
			</div> 	
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="ui pagination menu">
					<a class="active item">
						1
					</a>
					<a class="disabled item">
						...
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- DASHBOARD -> LOGS -> DATE FILTER -->

<!-- ---------------- 8. EMPLOYEE UPDATE PROFILE ---------------- -->

<div class="settingswrapper" id="settingswrapper">

<!-- Personal Information -->

<div class="col-md-4">
	<div class="row">
		<div class="col-md-12">
			<table class="ui celled table personal-information">
				<thead>
					<tr>
						<th>Personal Information</th>
					</tr>
				</thead>

				<tbody>
					<tr class="personal-information-hover">
						<td>Name: Jason Roxas <p class="pull-right">Edit</p></td>
					</tr>

					<tr class="personal-information-edit">
						<td>
							<form class="ui form">
								<div class="field">
									<label>First Name</label>
									<input type="text" name="">
								</div>

								<div class="field">
									<label>Last Name</label>
									<input type="text" name="">
								</div>

								<div class="field">
									<label>Adress</label>
									<input type="text" name="">
								</div>

								<div class="field">
									<label>Contact Number</label>
									<input type="text" name="">
								</div>

								<div class="field">
									<label>Email</label>
									<input type="text" name="">
								</div>

								<button class="ui positive button" type="submit">Save</button>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Personal Information End -->

<!-- Change Password -->

<div class="col-md-4">
	<div class="row">
		<div class="col-md-12">
			<table class="ui celled table personal-information">
				<thead>
					<tr>
						<th>Password</th>
					</tr>
				</thead>

				<tbody>
					<tr class="change-password-hover">
						<td>Change Password <p class="pull-right">Edit</p></td>
					</tr>

					<tr class="change-password">
						<td>
							<form class="ui form">
								<div class="field">
									<label>Current Password</label>
									<input type="text" name="">
								</div>

								<div class="field">
									<label>New Password</label>
									<input type="text" name="">
								</div>

								<div class="field">
									<label>Confirm New Password</label>
									<input type="text" name="">
								</div>

								<button class="ui positive button" type="submit">Save</button>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Change Password End-->

</div>

<!-- ---------------- EMPLOYEE UPDATE PROFILE END ---------------- -->

</div>
<!-- END CONTAINER OF EVERYTHING IN DASHBOARD -->