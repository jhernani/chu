<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->library(array('e_user', 'e_authentication', 'e_security'));
			$this->load->helper('cookie');
			$this->load->model(array('employee', 'salary', 'timelog'));
		}

		public function index() {
			$this->e_security->check_login();
			$this->load->view('login');
		}

		public function home() {
			$this->e_security->not_loggedin();
			
			$data = $this->employee->get_overall_info($this->session->id);
			$data['timed_in'] = $this->timelog->employee_timedin();
			$data['page_title'] = 'Home';

			$this->load->view('regemp/header', $data);
			$this->load->view('regemp/nav');
			$this->load->view('regemp/modal');
			$this->load->view('regemp/time');
			$this->load->view('regemp/dashboard');
			$this->load->view('regemp/footer');
		}

		public function logout() {
			$this->session->sess_destroy();
			delete_cookie('hash');
			redirect('/index');
		}

		public function test() {  }

	}