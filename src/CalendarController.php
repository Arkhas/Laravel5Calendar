<?php

namespace Arkhas\Calendar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;


use App\Http\Requests;

class CalendarController extends Controller
{
    public function index($year='', $month='')
    {
    	$calendar = Calendar::generate($year,$month);

    	return $calendar;
    }

    public function demo()
    {
    	$calendar = Calendar::generate();

    	return view('calendar::demo', compact('calendar'));
    }
}
