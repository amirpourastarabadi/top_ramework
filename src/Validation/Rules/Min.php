<?php

namespace Top\Validation\Rules;

class Min extends Rule
{

    private static $MESSAGE = '{attribute} min is {min}.';

    private const NEEDLE = '{attribute}';

    private const MIN_VALUE = '{min}';

    public function setProperties(string $properties): void
    {
        $this->minValue = $properties;
    }

    public function passed($value): bool
    {
        if (is_string($value)) {
            return strlen($value) >= $this->minValue;
        }
        if (is_integer($value)) {
            return $value >= $this->minValue;
        }

        return true;
    }

    public function getErrorMessage(string $property): string
    {
        static::$MESSAGE = str_replace(static::MIN_VALUE, $this->minValue, static::$MESSAGE);

        return str_replace(static::NEEDLE, $property, static::$MESSAGE);
    }
}
