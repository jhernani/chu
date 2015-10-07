<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

	class E_attendance {

		public function calculate_hours($time_in, $time_out, $timein_date, $timeout_date) {

			// Extract timed in && out
			$time_in = self::time_extract($time_in);
			$time_out = self::time_extract($time_out);

			// Extract date timed in && out
			$timedin_date = self::date_extract($timein_date);
			$timedout_date = self::date_extract($timeout_date);

			// Convert to military time
			$timedin_hour = self::to_military($time_in['hour'], $time_in['ampm']);
			$timedout_hour = self::to_military($time_out['hour'], $time_out['ampm']);

			// Calculate span of time ( Excluding minutes yet )
			$start = mktime($timedin_hour, 0, 0, $timedin_date['month'], $timedin_date['day'], $timedin_date['year']); 
			$end = mktime($timedout_hour, 0, 0, $timedout_date['month'], $timedout_date['day'], $timedout_date['year']);

			// Calculate minutes
			$total_minutes = (intval($time_in['minute']) + intval($time_out['minute']));

			// Now get the hours rendered
			$timespan = timespan($start, $end, 5);

			$timespan = explode(',', $timespan);
			$found = false;

			foreach ($timespan as $time) {
				$time = trim($time);

				if(strpos($time, 'Hour') !== false) {
					$found = true;
					$hours = explode(' ', $time);
				}
			}

			if($found) { $hours_rendered = (int)$hours[0]; }
			else { $hours_rendered = 0; }

			if($total_minutes > 59) {
				$hours_rendered = $hours_rendered + 1;
			}

			return $hours_rendered;
		}

		// --------------------------------------------------------------------------

		public function time_extract($time) {

			$time = explode(':', $time); 		# Separate hour from minute and ampm
			$smnampm = explode(' ', $time[1]);	# Separate minute from ampm

			$hour = (int)$time[0];
			$minute = (int)$smnampm[0];
			$ampm = $smnampm[1];

			return array(
				'hour' => $hour,
				'minute' => $minute,
				'ampm' => $ampm
			);
		}

		// --------------------------------------------------------------------------

		public function date_extract($date) {
			$date = explode('-', $date);

			$year	= $date['0'];
			$month	= $date['1'];
			$day	= $date['2'];

			return array(
				'month' => $month,
				'day' => $day,
				'year' => $year,
			);
		}

		// --------------------------------------------------------------------------

		public function to_military($hour, $ampm) {
			return (int)date('H', strtotime($hour . $ampm));
		}

		// --------------------------------------------------------------------------

		public function generate_pay($total_time) {
			$CI = & get_instance();
			$CI->load->model('salary');

			$employee_rate = $CI->salary->get_rate();
			$payment = ($employee_rate * $total_time);

			return $payment;
		}

		// --------------------------------------------------------------------------
	}