<?php

namespace App\Domain\ValueObjects;

class StringType
{
    private $value;

    public function __construct($value)
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('Value should be string.');
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function equal($value)
    {
        return (string) $this->value === (string) $value;
    }
}
