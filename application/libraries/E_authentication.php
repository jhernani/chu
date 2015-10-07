<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

	class E_authentication {

		public function password_matched($username = null, $password = null) {
			$CI = & get_instance();
			
			if($username&&$password) {
				if(strcmp($password, $CI->employee->get_password($username)) === 0) {
					return true;
				}
			}

			return false;
		}

		// --------------------------------------------------------------------------
	}