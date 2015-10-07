<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller {

		public function __construct() {
			parent::__construct();

			$this->load->library(array('form_validation', 'e_user', 'e_authentication'));
			$this->load->helper('cookie');
			$this->load->model('employee');

			$this->encryption->initialize(array(
				'cipher' => 'aes-128',
				'mode' => 'cbc',
				'driver' => 'openssl'
			));

		}

		// ------------------------------------------------------------------------------------

		public function user_login() {

			$hash = get_cookie('hash');

			if($this->e_user->is_remembered($hash) || $this->session->is_loggedin) {
				redirect('/home');
			}

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = $this->input->post('remember');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|trim|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('login');
			}elseif($this->employee->account_existed($username)) {

				$employee_id = $this->employee->get_id($username);

				if($this->e_authentication->password_matched($username, $password)) {

					if($this->employee->is_active($employee_id)) {
						$userdata = $this->employee->get_info($employee_id);
						$this->e_user->set_employee_session($userdata);

						if($remember == 'on') {
							$this->e_user->set_employee_cookie($employee_id);
						}

						redirect('/home');
					}else {
						$data['login_error'] = "<p class='error'>Account is not active yet.</p>";
						$this->load->view('login', $data);
					}

				}else {
					$data['login_error'] = "<p class='error'>Password is incorrect!</p>";
					$this->load->view('login', $data);
				}

			} else {
				$data['login_error'] = "<p class='error'>Account doesn't exist.</p>";
				$this->load->view('login', $data);
			}	
		}

		// ------------------------------------------------------------------------------------



	}