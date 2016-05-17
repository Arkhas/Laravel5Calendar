<?php

/*
|--------------------------------------------------------------------------
| Calendar Routes
|--------------------------------------------------------------------------
*/

// Route::get('calendar/{year?}/{month?}', 'arkhas\calendar\CalendarController@index');
Route::get('calendar/{year?}/{month?}', [
    'middleware' => 'web',
    'uses' => 'arkhas\calendar\CalendarController@index',
]);
Route::get('arkhas/calendar/demo', [
    'middleware' => 'web',
    'uses' => 'arkhas\calendar\CalendarController@demo',
]);

// Route::get('arkhas/calendar/demo', 'arkhas\calendar\CalendarController@demo');