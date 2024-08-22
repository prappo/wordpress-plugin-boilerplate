<?php

namespace Prappo\WpEloquent\Events;

class InvokeQueuedClosure
{
    /**
     * Handle the event.
     *
     * @param  \Prappo\WpEloquent\Queue\SerializableClosure  $closure
     * @param  array  $arguments
     * @return void
     */
    public function handle($closure, array $arguments)
    {
        call_user_func($closure->getClosure(), ...$arguments);
    }

    /**
     * Handle a job failure.
     *
     * @param  \Prappo\WpEloquent\Queue\SerializableClosure  $closure
     * @param  array  $arguments
     * @param  array  $catchCallbacks
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed($closure, array $arguments, array $catchCallbacks, $exception)
    {
        $arguments[] = $exception;

        asdb_collect($catchCallbacks)->each->__invoke(...$arguments);
    }
}
