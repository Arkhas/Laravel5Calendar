<?php

namespace Arkhas\Calendar;

use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Get namespace
        $nameSpace = $this->app->getNamespace();
        
        $this->loadViewsFrom(__DIR__.'/views', 'calendar');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/calendar'),
        ]);
        $this->publishes([
             __DIR__.'/assets' => public_path('assets/arkhas/calendar'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app['calendar'] = $this->app->share(function($app)
        {
            return new Calendar();
        });
        // $this->app->register('Arkhas\Calendar\CalendarServiceProvider');
    }

}
