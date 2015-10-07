<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

	class E_user {

		public function set_employee_session($userdata) {

			if(is_array($userdata) && count($userdata) > 1) {

        		$firstname 	= ucfirst($userdata['firstname']);
        		$middlename = ucfirst(substr($userdata['middlename'], 0, 1)) . '.';
        		$lastname 	= ucfirst($userdata['lastname']);

		        $userdata += array('fullname' => $firstname . ' ' . $middlename . ' ' . $lastname);
				$userdata += array('is_loggedin' => true);
				
				$CI = & get_instance();
				$CI->session->set_userdata($userdata);
				return true;
			} else {
				return false;
			}
		}

		// --------------------------------------------------------------------------

		public function set_employee_cookie($employee_id) {

			if(is_numeric($employee_id) && !empty($employee_id) ) {

				$CI = & get_instance();
				$CI->load->model('employee');
				$CI->load->library('e_security');

				$cookie = $CI->e_security->generate_cookie();

				if($CI->employee->set_token($employee_id, $cookie)) {
					setcookie('hash', $cookie, strtotime('+30 days'), "/");
					return true;
				}

			}else {
				return false;
			}
		}

		// --------------------------------------------------------------------------

		public function is_remembered($hash) {
			if($hash !== NULL) {
				$CI = & get_instance();
				$CI->load->model('employee');

				$employee_id = $CI->employee->extract_token_info($hash); // Gets the employee_id using the cookie value
				$userdata = $CI->employee->get_info($employee_id);

				self::set_employee_session($userdata);

				return true;
			}

			return false;
		}

		// --------------------------------------------------------------------------

	}