<?php
namespace Arkhas\Calendar;

use Carbon\Carbon;

class Calendar
{

	protected $url = "/calendar/";
	/**
	 * Constructor
	 *
	 */
	public function __construct()
	{
		
	}

	/**
	 *
	 * @access	public
	 * @param	integer	the year
	 * @param	integer	the month
	 * @param	array	the event to be shown in the calendar
	 * @param	array	the additional data to be shown in the view
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
		$previous_month = $current_month->copy()->subMonth();
		$next_month     = $current_month->copy()->addMonth();

		// Calculation of the number of week in month (go to the end of the month and get the week of the month)
		$weeksInMonth 	= $current_month->copy()->endOfMonth()->weekOfMonth;
		
		$calendar['current_month']		= $current_month;
		$calendar['previous_month_url']	= $previous_month->year."/".$previous_month->month;
		$calendar['next_month_url']		= $next_month->year."/".$next_month->month;
		$calendar['today']				= $today;
		
		// We get the first day of the week (default is Sunday so we substract a day to have the previous monday)
		$day = $current_month->copy()->startOfMonth()->startOfWeek()->subDay(1);

		// Iteration over the number of week in the month for building each row of the calendar
		for($currentWeek=0; $currentWeek <= $weeksInMonth; $currentWeek++){
			// Iteration over the number of day in the week for building each column in the calendar
			for ($i = 0; $i < 7; $i++){

				$class = "";
				// Creation of a new instance of Carbon for each day adding a day to the prior day
				$day = $day->copy()->addDay();

				// Checking if the day is in the current month and adding a class to that day
				if ($month != $day->month) {
					$class .= ' next-month';
				}
				// Cheking if the day is in the event array and adding a class to that day
				if(in_array($day->year.'/'.$day->month.'/'.$day->day, $event)){
					$class .= ' event';
				}
				// Cheking if the day is today and adding a class to that day
				if ($day->isSameDay($today)) {
					$class .= ' highlight';
				}
				$calendar['weeks'][$currentWeek][$day->day]['day'] = $day;
				$calendar['weeks'][$currentWeek][$day->day]['class'] = $class;
			}
		}
		// dd($data);
		if (!isset($data["url"])) {
			$data["url"] = $this->url;
		}
		return view('calendar::calendar', compact('calendar', 'data'));
	}
}
