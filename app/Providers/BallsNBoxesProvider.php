<?php

namespace App\Providers;

use App\Helpers\BallsNBoxesSolver;
use Illuminate\Support\ServiceProvider;

class BallsNBoxesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->singleton(BallsNBoxesSolver::class, function($app){
            return new BallsNBoxesSolver();
        });
    }
}
