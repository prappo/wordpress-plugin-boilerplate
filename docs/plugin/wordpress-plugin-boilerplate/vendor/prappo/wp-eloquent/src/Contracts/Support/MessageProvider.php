<?php

namespace Prappo\WpEloquent\Contracts\Support;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Prappo\WpEloquent\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
