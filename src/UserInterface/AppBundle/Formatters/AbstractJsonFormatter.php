<?php

namespace App\UserInterface\AppBundle\Formatters;

abstract class AbstractJsonFormatter implements \JsonSerializable
{
    abstract public function jsonSerialize();
}
