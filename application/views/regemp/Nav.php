<header>

	<div id="custom-bootstrap-menu" class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container-fluid">

    		<div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
	            	<span class="sr-only">Toggle navigation</span>
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	            </button>
	        </div>

	        <div class="collapse navbar-collapse navbar-menubuilder">


	            <ul class="nav navbar-nav navbar-left">
	                <li onClick="show_dashboard()">
	                	<a href="#"><i class="dashboard icon"></i>Dashboard</a>
	                </li>

	                <li onClick="show_profile()">
	                	<a href="#"><i class="time icon"></i>Time</a>
	                </li>

	                <li>
	                	<a href="#recent" data-toggle="modal"><i class="list layout icon"></i>View Recent</a>
	                </li>
	            </ul>

	            <ul class="nav navbar-nav navbar-right">

	                <li class="dropdown padding-zero margin-zero">
	                
		                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
		                	<i class="alarm outline icon"></i>
		                	<span class="badge">2</span>
		                </a>
	                 


		                <!-- ******************** THIS IS THE DROPDOWN NOTIFICATION ******************** -->
		                 
		                 <ul class="dropdown-menu notifications notifications-margin notification-dropdown" role="menu" aria-labelledby="dLabel">

							 <div class="notification-heading">
								 <div class="notification-footer">
								 	<a href="#">
								 		<h4 class="menu-title">View more
								 			<i class="chevron circle right icon"></i>
								 		</h4>
								 	</a>
								 </div>
							 </div>

							 <li class="divider"></li>


							<div class="notifications-wrapper"> <!-- notifications-wrapper -->
								
								<div>
									<a href="#notification-modal" data-toggle="modal">
										<div class="notification-item">
											<div class="ui large feed">
												<div class="event">
												    <div class="content">

												      <div class="summary">Outing
												        <div class="date">3 days ago</div>
												      </div>

												      <div class="extra text">
												        I'm having a BBQ this weekend. Come by around 4pm if you can.
												      </div>

												      <div class="meta">
												        <i class="check circle outline icon cursor-default green"></i>
												        <label class="request-approve">Approve</label>
												        <label>Vacation Leave</label>
												      </div>

												    </div>
											  	</div>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- end notifications-wrapper -->


							<li class="divider"></li>

						</ul>

						<!-- ******************** THIS IS THE DROPDOWN NOTIFICATION ******************** -->

    				</li>


	            	<li class="dropdown padding-zero margin-zero">

		                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
		                	<i> <img class="ui avatar mini image" src="<?= base_url() . 'resources/images/users/' . $picture; ?>"> </i>	                	
		                	<?= $this->session->fullname; ?>
		                	<b class="caret"></b>
		                </a>

		                <ul class="dropdown-menu">
			                <li> <a href="<?= base_url(); ?>logout">Logout</a> </li>
		                </ul>
    				</li>

				</ul>
	        </div>
		</div>
	</div>

</header>