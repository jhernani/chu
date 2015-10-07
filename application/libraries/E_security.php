<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

	class E_security {

		public function generate_cookie() {

			$characters = 'a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,,q,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0';
			$characters_array = explode(',', $characters);
			shuffle($characters_array);
			
			return implode('', $characters_array);
		}

		// --------------------------------------------------------------------------

		public function check_login() {
			$CI = & get_instance();
			$CI->load->library('e_user');

			if($CI->e_user->is_remembered(get_cookie('hash')) || $CI->session->is_loggedin) {
				redirect('/home');
			}
		}

		// --------------------------------------------------------------------------

		public function not_loggedin() {
			$CI = & get_instance();

			if(!$CI->session->is_loggedin) {
				redirect('/index');
			}
		}

		// --------------------------------------------------------------------------

	}