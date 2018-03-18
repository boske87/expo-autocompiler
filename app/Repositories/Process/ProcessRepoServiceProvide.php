<?php
namespace App\Repositories\Process;


use Illuminate\Support\ServiceProvider;


class ProcessRepoServiceProvide extends ServiceProvider
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
        $this->app->bind('App\Repositories\Process\ProcessInterface', 'App\Repositories\Process\ProcessRepository');
    }
}
