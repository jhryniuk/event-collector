<?php

namespace App\Domain\ValueObjects;

class Title
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return (string) $this->value;
    }

    public function equal($value)
    {
        return (string) $this->value === (string) $value;
    }
}
