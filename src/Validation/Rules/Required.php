<?php

namespace Top\Validation\Rules;

class Required extends Rule
{
    static public function setProperties(string $properties): void
    {
    }

    static public function passed(mixed $value): bool
    {
        if($value === '' || is_null($value)){
            return false;
        }

        return true ;
    }
}
