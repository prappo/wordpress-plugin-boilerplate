<?php

namespace Prappo\WpEloquent\Events;

use Closure;

if (! function_exists('Prappo\WpEloquent\Events\queueable')) {
    /**
     * Create a new queued Closure event listener.
     *
     * @param  \Closure  $closure
     * @return \Prappo\WpEloquent\Events\QueuedClosure
     */
    function queueable(Closure $closure)
    {
        return new QueuedClosure($closure);
    }
}
