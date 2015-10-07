<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Attendance extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('timelog');
		}

		public function time_in() {

			if($this->session->is_loggedin) {
				if($this->timelog->employee_timedin()) {
					if($this->timelog->time_out() === true) { echo 'timeout'; }
				}else {
					if($this->timelog->time_in() === true) { echo 'timein'; }
				}
				
			}else { echo 'fail'; }
		}
	}