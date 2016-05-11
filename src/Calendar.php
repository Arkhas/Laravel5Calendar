<?php

namespace Arkhas\Calendar;

use Lang;
use Carbon\Carbon;

class Calendar
{
	/**
	 * Constructor
	 *
	 * Loads the calendar language file and sets the default time reference
	 */
	public function __construct($request)
	{
		
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the calendar
	 *
	 * @access	public
	 * @param	integer	the year
	 * @param	integer	the month
	 * @param	array	the data to be shown in the calendar cells
	 * @return	string
	 */
	public function generate($year = '', $month = '', $event = array(), $data = array())
	{
		$today = Carbon::now();
		

		if ($month == '') {
			$month = $today->month;
		}
		if ($year == '') {
			$year = $today->year;
		}
		$current_month  = Carbon::createFromDate($year,$month);
		// $current_month = new Carbon;
		// call_user_func_array(array($current_month, "createFromDate"), array($year, $month));

		$previous_month = $current_month->copy()->subMonth();
		$next_month     = $current_month->copy()->addMonth();
		

		$calendar['current_month'] = $current_month;
		$calendar['previous_month_url'] = $previous_month->year."/".$previous_month->month;
		$calendar['next_month_url'] = $next_month->year."/".$next_month->month;
		$calendar['today'] = $today;

		// Build the main body of the calendar
		$weeksInMonth = Carbon::createFromDate($year, $month)->endOfMonth()->weekOfMonth;

		// We get the first day of the week (default is Sunday so we substract a day to have the next monday)
		$firstDay = $current_month->copy()->startOfMonth()->startOfWeek()->subDay(2);
		$day = $firstDay->copy()->addDay();
		for($currentWeek=0; $currentWeek <= $weeksInMonth; $currentWeek++){
			for ($i = 0; $i < 7; $i++){
				$class = "";
				$day = $day->copy()->addDay();

				if ($currentWeek == 0) {
					$week_days[$i] =  $day->format('D');
				}
				if ($month != $day->month) {
					$class .= ' next-month';
				}elseif(in_array($day->year.'/'.$day->month.'/'.$day->day, $event)){
					$class .= ' event';
				}
				if ($day->isSameDay($today)) {
					$class .= ' highlight';
				}
				$calendar['weeks'][$currentWeek][$day->day]['day'] = $day;
				$calendar['weeks'][$currentWeek][$day->day]['class'] = $class;
			}
		}
		$calendar['week_days'] = $week_days;
		return view('calendar::calendar', compact('calendar', 'data'));
	}

}
