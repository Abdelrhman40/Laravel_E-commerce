<?php

namespace App\Providers;

use App\Repositories\BlogRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
