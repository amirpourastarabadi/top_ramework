<?php

namespace Top\Validation\Rules;


abstract class Rule
{
    abstract public function setProperties(string $properties): void;

    abstract public function passed($value): bool;

    abstract public function getErrorMessage(string $value): string;
}
