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

        if (0 == $valueCheck->diff($this->value, true)->format('%Y%M%D%H%I%s')) {
            return true;
        }

        return false;
    }
}
