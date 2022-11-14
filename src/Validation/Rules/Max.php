<?php

namespace Top\Validation\Rules;

class Max extends Rule
{

    private static $MESSAGE = '{attribute} max is {max}.';

    private const NEEDLE = '{attribute}';

    private const MAX_VALUE = '{max}';

    public function setProperties(string $properties): void
    {
        $this->maxValue = $properties;
    }

    public function passed($value): bool
    {
        if (is_string($value)) {
            return strlen($value) <= $this->maxValue;
        }
        if (is_integer($value)) {
            return $value <= $this->maxValue;
        }

        return true;
    }

    public function getErrorMessage(string $property): string
    {
        static::$MESSAGE = str_replace(static::MAX_VALUE, $this->maxValue, static::$MESSAGE);

        return str_replace(static::NEEDLE, $property, static::$MESSAGE);
    }
}
