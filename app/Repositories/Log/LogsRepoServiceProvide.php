<?php
namespace App\Repositories\Log;


use Illuminate\Support\ServiceProvider;


class LogsRepoServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Log\LogsInterface', 'App\Repositories\Log\LogsRepository');
    }
}
