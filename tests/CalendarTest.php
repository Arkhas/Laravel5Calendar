<?php

namespace Arkhas\Calendar\Test;

use Carbon\Carbon;
use Arkhas\Calendar\Calendar;
use Orchestra\Testbench\TestCase;

class CalendarTest extends TestCase
{
    public function testSetupCalendarDefaults()
    {
        $calendar = new Calendar();
        $calendarData = $calendar->setupCalendar();

        $todaysMonth = date('n');
        $todaysYear = date('Y');
        $todaysDay = date('j');
        $today = Carbon::now();

        $lastMonth = date('n', strtotime('-1 month'));
        $nextMonth = date('n', strtotime('+1 month'));

        $this->assertEquals($todaysMonth, $calendarData->calendar['current_month']->month);
        $this->assertEquals($todaysDay, $calendarData->calendar['today']->day);
        $this->assertEquals($todaysYear.'/'. $todaysMonth , $calendarData->calendar['current_month_url']);
        $this->assertEquals($todaysYear.'/'. $lastMonth, $calendarData->calendar['previous_month_url']);
        $this->assertEquals($todaysYear.'/'. $nextMonth, $calendarData->calendar['next_month_url']);
        $this->assertEquals(' highlight', $calendarData->calendar['weeks'][$today->weekOfMonth - 1][$today->day]['class']);
        $this->assertEquals('/calendar/', $calendarData->data['url']);
    }

    public function testSetupCalendarNonDefaults()
    {
        $year = 2017;
        $month = 9;

        $calendar = new Calendar();
        $calendarData = $calendar->setupCalendar($year, $month, [], ['url' => '/testURL/']);

        $todaysDay = date('j');

        $this->assertEquals(9, $calendarData->calendar['current_month']->month);
        $this->assertEquals($todaysDay, $calendarData->calendar['today']->day);
        $this->assertEquals($year.'/'. $month , $calendarData->calendar['current_month_url']);
        $this->assertEquals($year.'/'. 8, $calendarData->calendar['previous_month_url']);
        $this->assertEquals($year.'/'. 10, $calendarData->calendar['next_month_url']);
        $this->assertEquals('/testURL/', $calendarData->data['url']);
    }
}