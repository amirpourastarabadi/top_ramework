<?php

namespace Top\Validation\Rules;


abstract class Rule
{
    abstract static public function setProperties(string $properties): void;

    abstract static public function passed(mixed $value): bool;
}
