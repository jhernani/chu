<?php

	if(!defined('BASEPATH')) exit('No direct script access allowed.');
	
	class Timelog extends CI_Model {
			
		public function __construct() {
			$this->load->library('e_attendance');
			parent::__construct();
		}

		// --------------------------------------------------------------------------

		public function time_in() {

			$date		= date('Y-m-d');
			$time_in 	= date('h:i a');

			$this->db->insert('timelog', array(
				'id' => NULL,
				'employee_id' => $this->session->id,
				'time_in' => $time_in,
				'time_out' => NULL,
				'timein_date' => $date,
				'timeout_date' => NULL,
				'total_time' => NULL,
				'pay' => NULL
			));

			if($this->db->affected_rows()) {
				return true;
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function time_out() {
			$timed_in = self::employee_timedin();

			if($timed_in) {

				$time_in  = self::get_timein();
				$time_out = date('h:i a');
				$timein_date = self::get_timein_date();
				$timeout_date = date('Y-m-d');

				$total_time = $this->e_attendance->calculate_hours($time_in, $time_out, $timein_date, $timeout_date);
				$payment = $this->e_attendance->generate_pay($total_time);

				$this->db->where('time_out', NULL);
				$this->db->where('employee_id', $this->session->id);
				$this->db->update('timelog', array(
					'time_out' => $time_out,
					'timeout_date' => $timeout_date,
					'total_time' => $total_time,
					'pay' => $payment
				));

				if($this->db->affected_rows()) { return true; }
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function employee_timedin() {
			$this->db->where('time_in !=', NULL);
			$this->db->where('time_out', NULL);
			$this->db->where('employee_id', $this->session->id);
			$query = $this->db->get('timelog');

			$status = ($query->num_rows() > 0) ? true : false;

			return $status;
		}

		// --------------------------------------------------------------------------

		public function get_timein() {
			$this->db->select('time_in');
			$this->db->where('employee_id', $this->session->id);
			$this->db->where('time_out', NULL);
			$query = $this->db->get('timelog');

			if($query->num_rows()) {
				return $query->result_array()[0]['time_in'];
			}

			return false;
		}

		// --------------------------------------------------------------------------

		public function get_timein_date() {
			$this->db->select('timein_date');
			$this->db->where('employee_id', $this->session->id);
			$this->db->where('time_out', NULL);
			$query = $this->db->get('timelog');

			if($query->num_rows()) {
				return $query->result_array()[0]['timein_date'];
			}

			return false;
		}

		// --------------------------------------------------------------------------

	}