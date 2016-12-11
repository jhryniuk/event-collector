<?php

namespace App\Domain\ValueObjects;

use Ramsey\Uuid\Uuid;

class Id
{
    private $value;
    public function __construct($value = null)
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
