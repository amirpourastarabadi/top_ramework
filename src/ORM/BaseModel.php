<?php

namespace Top\ORM;

use Exception;
use Top\Validation\Validation;

abstract class BaseModel
{

    protected array $validationErrors = [];

    protected function create(array $data)
    {
        $this->fillModel($data)->validate()
            /**->save() */
        ;
        $this->validate();
        // $this->save();



        return $this;
    }

    public static function __callStatic($name, $arguments)
    {

        if (method_exists(static::class, $name)) {
            return (new static)->{$name}(...$arguments);
        }
    }

    public function fillModel(array $data): static
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        return $this;
    }

    public function validate(): static
    {

        foreach ($this->rules() as $property => $rules) {
            foreach ($rules as $rule) {
                if (! Validation::isValid($rule, $this->{$property})) {
                    $this->fillValidationErrors($rule, $property);
                };
            }
        }

        return $this;
    }

    protected function fillValidationErrors(string $rule, string $property):void
    {
        $this->validationErrors[$property][] = Validation::getValidationError($rule, $property);
    }

    abstract protected function rules(): array;
}
