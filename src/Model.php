<?php

namespace Amir\WebFramework;

abstract class Model
{
    // rules
    protected const REQUIRED = 'required';
    protected const MATCH = 'match';
    protected const STRING = 'string';
    protected const MAX = 'max';
    protected const MIN = 'min';
    protected const EAMIL = 'email';

    protected const ERROR_MESSAGES = [
        self::REQUIRED => 'is required',
        self::MATCH => 'not match with {attribute}',
        self::STRING => 'must be string',
        self::MAX => 'must be less or equal to {max}',
        self::MIN => 'must be biger than {min}',
        self::EAMIL => 'must be email',
    ];

    protected $instance;
    private static function getInstance()
    {
        return static::$instance ?? new static();
    }

    public static function create(array $properties)
    {
        static::validate($properties);
        $instace = self::loadData($properties);
        $instace->save();
    }

    protected static function loadData(array $properties)
    {
        $instace = static::getInstance();
        foreach ($properties as $property => $value) {
            if (property_exists($instace, $property)) {
                $instace->{$property} = $value;
            }
        }

        return $instace;
    }

    protected static function validate(array $attirbutes)
    {
        foreach ($attirbutes as $attirbute => $value) {
            foreach (static::getRules()[$attirbute] as $key => $rule) {
                $prefix = is_string($key) ? $key : $rule;
                $method = is_string($key) ? "{$key}Rule" : "{$rule}Rule";
                if (!static::{$method}($value, $rule)) {
                    // todo : fill erros
                }
            }
        }
    }

    protected static function addError(string $attirbute, string $rule): string
    {
        if (is_string($rule)) {
            return $attirbute . static::ERROR_MESSAGES[$attirbute];
        } elseif (is_array($rule)) {
            var_dump($attirbute, $rule);
        }
    }

    protected static function requiredRule($value, $rule)
    {
        return !is_null($value);
    }


    protected static function matchRule($value, $rule)
    {
        return $value === Application::$app->request->get($rule[static::MATCH]);
    }

    protected static function emailRule($value, $rule)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected static function minRule($value, $rule)
    {
        return strlen($value) >= $rule[static::MIN];
    }

    protected function save()
    {
        // save model in database
    }

    abstract protected static function getRules(): array;
}
