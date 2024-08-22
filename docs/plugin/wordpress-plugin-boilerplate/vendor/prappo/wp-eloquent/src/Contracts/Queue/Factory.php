<?php

namespace Prappo\WpEloquent\Contracts\Queue;

interface Factory
{
    /**
     * Resolve a queue connection instance.
     *
     * @param  string|null  $name
     * @return \Prappo\WpEloquent\Contracts\Queue\Queue
     */
    public function connection($name = null);
}
