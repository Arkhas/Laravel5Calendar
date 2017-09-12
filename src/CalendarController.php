<?php

namespace Arkhas\Calendar;

use App\Http\Controllers\Controller;
use Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index($year = '', $month = '')
    {
        $calendar = Calendar::generate($year, $month);

        return $calendar;
    }

    public function demo(Request $request)
    {
        $events = [
            '2016/5/3',
            '2016/5/5',
            '2016/5/11',
            '2016/6/16',
            '2016/6/28',
        ];
        $calendar = Calendar::generate('', '', $events);

        return view('calendar::demo', compact('calendar'));
    }
}
