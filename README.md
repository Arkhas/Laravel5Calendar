## Installation

Install the package through [Composer](http://getcomposer.org/) :

	composer require arkhas/laravel5calendar:dev-master



Now all you have to do is add the service provider of the package and alias the package. To do this open your `app/config/app.php` file.

Add a new line to the `service providers` array:

	Arkhas\Calendar\CalendarServiceProvider::class,

Add a new line to the `aliases` array:

	'Calendar' => Arkhas\Calendar\Facades\Calendar::class,

Then insert this in the top of your file :

```php
use Calendar;
```
Or use it directly :
```php
$calendar = \Calendar::generate();
```

Now you're ready to start using the calendar package in your application.


## Usage

You can use the `generate` method to generate a calendar, it will return the template of the calendar.

```php
// Generate a calendar for the current month and year
$calendar = Calendar::generate();

// Generate a calendar for the specified year and month
$calendar = Calendar::generate(2012, 5);

// Add an array of events as the third parameter to add them to the calendar (YYYY/MM/DD), 
$events = array(
	'2016/5/3',
	'2016/5/5',
	'2016/5/11',
	'2016/5/16',
	'2016/5/28',
);

$calendar = Calendar::generate(2016, 5, $events);

// Add an array of data as the fourth parameter so you can use them in the view :

$data = array(
	'name' => 'Arkhas',
	'url'  =>  '/event/arkhas',
	'foo' => 'bar'
);

$calendar = Calendar::generate(2016, 5, $events, $data);
```
## Routing

By default, the routing format is `/calendar/YYYY/MM` , you can change the leading route using the url data parameter :

```php
$data['url'] = '/foo/bar/';
```

## Template

If you want to use a custom template, run :
	
	php artisan vendor:publish

The template is located in `resources/views/vendor/calendar/calendar.blade.php`

The css file is located in `public/assets/arkhas/calendar/calendar.css`


