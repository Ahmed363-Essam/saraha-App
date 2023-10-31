<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MessageRepositoryInterface;
use App\Repositories\MessageRepository;

class RepeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
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
