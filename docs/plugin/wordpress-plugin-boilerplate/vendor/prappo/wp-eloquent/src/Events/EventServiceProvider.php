<?php

namespace Prappo\WpEloquent\Events;

use Prappo\WpEloquent\Contracts\Queue\Factory as QueueFactoryContract;
use Prappo\WpEloquent\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('events', function ($app) {
            return (new Dispatcher($app))->setQueueResolver(function () use ($app) {
                return $app->make(QueueFactoryContract::class);
            });
        });
    }
}
