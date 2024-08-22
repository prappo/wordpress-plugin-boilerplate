<?php

namespace Prappo\WpEloquent\Contracts\Support;

interface DeferringDisplayableValue
{
    /**
     * Resolve the displayable value that the class is deferring.
     *
     * @return \Prappo\WpEloquent\Contracts\Support\Htmlable|string
     */
    public function resolveDisplayableValue();
}
