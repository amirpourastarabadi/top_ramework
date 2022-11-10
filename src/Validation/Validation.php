<?php

namespace Top\Validation;

class Validation
{
    private const RULES_NAMESPASE = "Top\\Validation\\Rules\\";

    public static function isValid(string $rule, $value): bool
    {
        $ruleClass = static::pareseRule($rule);
        return (static::RULES_NAMESPASE . $ruleClass)::passed($value);
    }

    protected static function pareseRule(string $rule): string
    {
        $ruleParts = explode(':', $rule);

        $rule = ucwords($ruleParts[0]);

        if (count($ruleParts) > 1) {
            ($rule::class)::setProperties($ruleParts[1]);
        }

        return $rule;
    }
}
