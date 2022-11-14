<?php

namespace Top\Validation;

class Validation
{
    private const RULES_NAMESPACE = "Top\\Validation\\Rules\\";

    public static function isValid(string $rule, $value): bool
    {
        $ruleObject = static::parseRule($rule);
        
        return $ruleObject->passed($value);
    }

    public static function getValidationError(string $rule, string $property)
    {
        $ruleObject = static::parseRule($rule);

        return $ruleObject->getErrorMessage($property);
    }

    protected static function parseRule(string $rule)
    {
        $ruleParts = explode(':', $rule);

        $rule = static::RULES_NAMESPACE . ucwords($ruleParts[0]);

        $rule = new $rule();

        if (count($ruleParts) > 1) {
            $rule->setProperties($ruleParts[1]);
        }

        return $rule;
    }
}
