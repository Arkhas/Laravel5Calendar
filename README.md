## Installation

Install the package through [Composer](http://getcomposer.org/). Edit your project's `composer.json` file by adding:

```php
"require": {
	"laravel/framework": "5.2.*",
	"arkhas/calendar": "dev-master"
}
```

Next, run the Composer update command from the Terminal:

    composer update

Now all you have to do is add the service provider of the package and alias the package. To do this open your `app/config/app.php` file.

Add a new line to the `service providers` array:

	Arkhas\Calendar\CalendarServiceProvider::class,

And finally add a new line to the `aliases` array:

	'Calendar' => Arkhas\Calendar\Facades\Calendar::class

Now you're ready to start using the calendar package in your application.


## Usage

You can use the `generate` method to generate a calendar.

```php
// Generate a calendar for the current month and year
Calendar::generate();

// Generate a calendar for the specified year and month
Calendar::generate(2012, 5);

// Add an array of events as the third parameter to add them to the calendar (YYYY/MM/DD), 
$event = array(
	'2016/5/3',
	'2016/5/5',
	'2016/5/11',
	'2016/5/16',
	'2016/5/28',
);

Calendar::generate(2016, 5, $event);

// Add an array of data as the fourth parameter so you can use them in the view

$data = array(
	'name' => 'Arkhas',
	'url'  =>  '/event/arkhas',
	'foo' => 'bar'
);

Calendar::generate(2016, 5, $event, $data);
```
## Routing

By default, the routing is `/calendar/YYYY/MM`, you can change the leading route using the url data parameter

```php
	$data['url'] = '/foo/bar/';
```

## Template

If you want to use a custom template, run :
	
	php artisan vendor:publish

The template is located in `resources/views/arkhas/calendar/calendar.blade.php`

the css file is located in `public/assets/arkhas/calendar/calendar.css`


