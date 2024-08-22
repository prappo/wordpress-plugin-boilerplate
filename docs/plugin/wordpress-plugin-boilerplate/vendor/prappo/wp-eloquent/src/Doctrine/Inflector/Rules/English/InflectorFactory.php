<?php

declare(strict_types=1);

namespace Prappo\WpEloquent\Doctrine\Inflector\Rules\English;

use Prappo\WpEloquent\Doctrine\Inflector\GenericLanguageInflectorFactory;
use Prappo\WpEloquent\Doctrine\Inflector\Rules\Ruleset;

final class InflectorFactory extends GenericLanguageInflectorFactory
{
    protected function getSingularRuleset() : Ruleset
    {
        return Rules::getSingularRuleset();
    }

    protected function getPluralRuleset() : Ruleset
    {
        return Rules::getPluralRuleset();
    }
}
