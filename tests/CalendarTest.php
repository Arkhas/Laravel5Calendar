<?php

namespace Arkhas\Calendar\Test;


use Arkhas\Calendar\Calendar;
use Carbon\Carbon;
use Orchestra\Testbench\TestCase;

class CalendarTest extends TestCase
{
    public function testSetupCalendarDefaults()
    {
        $calendar = new Calendar();
        $calendarData = $calendar->setupCalendar();

        $todaysMonth = date('n');
        $todaysYear = date('Y');
        $today = Carbon::now();

        $lastMonth = date('n', strtotime('-1 month'));
        $nextMonth = date('n', strtotime('+1 month'));

        $this->assertEquals($todaysMonth, $calendarData->calendar['current_month']->month);
        $this->assertEquals($todaysYear . '/'. $todaysMonth , $calendarData->calendar['current_month_url']);
        $this->assertEquals($todaysYear . '/' . $lastMonth, $calendarData->calendar['previous_month_url']);
        $this->assertEquals($todaysYear . '/' . $nextMonth, $calendarData->calendar['next_month_url']);
        $this->assertEquals(' highlight', $calendarData->calendar['weeks'][$today->weekOfMonth - 1][$today->day]['class']);
        $this->assertEquals('/calendar/', $calendarData->data['url']);
    }
}