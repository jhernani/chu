<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed.');

	class Employee extends CI_Model {

		public function __construct() {
			parent::__construct();
		}

		// --------------------------------------------------------------------------

		public function account_existed($username) { // Check if account exists
			$this->db->select('username');
			$this->db->where('username', $username);
			$query = $this->db->get('employee');

			$status = ($query->num_rows() > 0) ? true : false;

			return $status;
		}

		// --------------------------------------------------------------------------

		public function get_info($id) { // Gets the user information to set session
			$this->db->select('id, username, firstname, middlename, lastname, type');
			$this->db->where('id', $id);
			$query = $this->db->get('employee');

			if($query->num_rows()) {
				return $query->result_array()[0];
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function get_overall_info($id) { // Gets the user's necessary information
			$this->db->select('idnumber, pm_id, picture, contact, email, address, code, status, date_hired, date_resignation, date');
			$this->db->where('id', $id);
			$query = $this->db->get('employee');

			if($query->num_rows()) {
				return $query->result_array()[0];
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function get_id($username) { // Gets the id (Primary Key) of the employee by username
			$this->db->select('id');
			$this->db->where('username', $username);
			$query = $this->db->get('employee');

			if($query->num_rows()) {
				$result = $query->result_array()[0];
				return (int)$result['id'];
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function get_password($username) { // Gets the password of a specific employee
			$this->db->select('password');
			$this->db->where('username', $username);
			$query = $this->db->get('employee');

			if($query->num_rows()) {
				$result = $query->result_array();
				return $this->encryption->decrypt($result[0]['password']);
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function is_active($id = 0) { // Checks if employee's account is active
			$this->db->select('status');
			$this->db->where('id', $id);
			$query = $this->db->get('employee');

			if($query->num_rows()) {
				$get_status = (int)$query->result_array()[0]['status'];
				$account_status  = ($get_status === 1) ? true : false;
				
				return $account_status;
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function token_exist($employee_id) { // Checks if there's and existing cookie (Remember me function)
			$this->db->select('hash');
			$this->db->where('employee_id', $employee_id);
			$query = $this->db->get('token');

			$status = ($query->num_rows() > 0) ? true : false;

			return $status;
		}

		// --------------------------------------------------------------------------

		public function set_token($employee_id, $cookie) { // Sets the cookie for the employee to be remembered (Remember me function)

			$token_existed = self::token_exist($employee_id);

			if($token_existed) {
				$this->db->where('employee_id', $employee_id);
				$this->db->update('token', array('hash' => $cookie));

			}else {
				$this->db->insert('token', array(
					'employee_id' => $employee_id,
					'hash' => $cookie
				));

			}

			if($this->db->affected_rows()) { return true; }

			return false;
		}

		// --------------------------------------------------------------------------

		public function extract_token_info($hash) { // Gets the employee_id (foregihn key) using the cookie value
			$this->db->select('employee_id');
			$this->db->where('hash', $hash);
			$query = $this->db->get('token');

			if($query->num_rows()) {
				$result = $query->result_array()[0];
				return (int)$result['employee_id'];
			}

			return false;
		}

	}