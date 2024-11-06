<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        //URL::forceScheme('https');
=======
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
>>>>>>> aa09f24519539cb62d1c9027a5229f8d851a7016
    }
}
