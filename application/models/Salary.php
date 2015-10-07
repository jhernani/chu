<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed.');

	class Salary extends CI_Model {
		
		public function __construct() {
			parent::__construct();
		}

		// --------------------------------------------------------------------------

		public function get_rate() {
			$this->db->select('rate');
			$this->db->where('employee_id', $this->session->id);
			$query = $this->db->get('salary');

			if($query->num_rows()) {
				return (int)$query->result_array()[0]['rate'];
			}

			return false;
		}

		// --------------------------------------------------------------------------

	}