<?php

namespace App\Domain\ValueObjects;

class DateTimeType
{
    private $value;

    public function __construct($value)
    {
        if (!($value instanceof \DateTime)) {
            throw new \InvalidArgumentException('Wrong argument');
        }
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function equal($value)
    {
        $valueCheck = new \DateTime($value);

        return $valueCheck == $this->value;
    }
}
