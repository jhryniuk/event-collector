<?php

namespace App\Application\Factory;

use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

interface UserFactory
{
    /**
     * @param IntNumber $id
     * @param StringType $firstName
     * @param StringType $lastName
     * @param IntNumber $age
     * @param StringType $email
     * @return mixed
     */
    public function createUser(
        IntNumber $id,
        StringType $firstName,
        StringType $lastName,
        IntNumber $age,
        StringType $email
    );
}