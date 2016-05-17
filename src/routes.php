<?php

/*
|--------------------------------------------------------------------------
| Calendar Routes
|--------------------------------------------------------------------------
*/

Route::get('calendar/{year?}/{month?}', 'arkhas\calendar\CalendarController@index');
Route::get('arkhas/calendar/demo', 'arkhas\calendar\CalendarController@demo');