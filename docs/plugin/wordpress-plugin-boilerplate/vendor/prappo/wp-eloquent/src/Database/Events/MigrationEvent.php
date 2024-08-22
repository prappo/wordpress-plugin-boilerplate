<?php

namespace Prappo\WpEloquent\Database\Events;

use Prappo\WpEloquent\Contracts\Database\Events\MigrationEvent as MigrationEventContract;
use Prappo\WpEloquent\Database\Migrations\Migration;

abstract class MigrationEvent implements MigrationEventContract
{
    /**
     * An migration instance.
     *
     * @var \Prappo\WpEloquent\Database\Migrations\Migration
     */
    public $migration;

    /**
     * The migration method that was called.
     *
     * @var string
     */
    public $method;

    /**
     * Create a new event instance.
     *
     * @param  \Prappo\WpEloquent\Database\Migrations\Migration  $migration
     * @param  string  $method
     * @return void
     */
    public function __construct(Migration $migration, $method)
    {
        $this->method = $method;
        $this->migration = $migration;
    }
}
