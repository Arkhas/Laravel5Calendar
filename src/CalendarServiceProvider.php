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
            $request = $app['request'];
            return new Calendar($request);
        });
    }
}
