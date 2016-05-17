<?php

namespace Arkhas\Calendar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;
use Illuminate\Support\Facades\Session;


use App\Http\Requests;

class CalendarController extends Controller
{
    public function index($year='', $month='')
    {
    	// $events = Session::all();
    	// dd($events);
    	$calendar = Calendar::generate($year,$month);
    	return $calendar;
    }

    public function demo(Request $request)
    {

    	// $request->session()->put('key', 'value');
    	
    	$events = array(
		    '2016/5/3',
		    '2016/5/5',
		    '2016/5/11',
		    '2016/6/16',
		    '2016/6/28',
		);
		// Session::put('events', $events);

    	$calendar = Calendar::generate('', '', $events);

    	return view('calendar::demo', compact('calendar'));
    }
}
