<?php

declare(strict_types=1);

namespace Prappo\WpEloquent\Doctrine\Inflector;

use Prappo\WpEloquent\Doctrine\Inflector\Rules\English;
use InvalidArgumentException;
use function sprintf;

final class InflectorFactory
{
    public static function create() : LanguageInflectorFactory
    {
        return self::createForLanguage(Language::ENGLISH);
    }

    public static function createForLanguage(string $language) : LanguageInflectorFactory
    {
        switch ($language) {
            case Language::ENGLISH:
                return new English\InflectorFactory();
            default:
                throw new InvalidArgumentException(sprintf(
                    'Language "%s" is not supported.',
                    $language
                ));
        }
    }
}
