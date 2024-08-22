<?php

declare(strict_types=1);

namespace Prappo\WpEloquent\Doctrine\Inflector;

interface WordInflector
{
    public function inflect(string $word) : string;
}
