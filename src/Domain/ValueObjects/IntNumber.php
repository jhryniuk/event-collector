<?php

namespace App\Domain\ValueObjects;


class IntNumber
{
    private $value;

    public function __construct($value)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException('Wrong type of value');
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return (int) $this->value;
    }

    public function equal($value)
    {
        return (int) $this->value === (int) $value;
    }

    public function same($value)
    {
        return $this->value === $value;
    }
}
