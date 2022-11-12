<?php

namespace Top\Validation\Rules;

class Required extends Rule
{

    private const MESSAGE = '{attribute} is required.';

    private const NEEDLE = '{attribute}';

    public function setProperties(string $properties): void
    {
    }

    public function passed($value): bool
    {
        if ($value === '' || is_null($value)) {
            return false;
        }

        return true;
    }

    public function getErrorMessage(string $property): string
    {
        return str_replace(static::NEEDLE, $property, static::MESSAGE);
    }
}
