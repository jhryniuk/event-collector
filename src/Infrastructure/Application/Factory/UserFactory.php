<?php

namespace App\Infrastructure\Application\Factory;

use App\Domain\User;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

class UserFactory implements \App\Application\Factory\UserFactory
{

    /**
     * @param IntNumber $id
     * @param StringType $firstName
     * @param StringType $lastName
     * @param IntNumber $age
     * @param StringType $email
     * @return User
     */
    public function createUser(
        IntNumber $id,
        StringType $firstName,
        StringType $lastName,
        IntNumber $age,
        StringType $email
    ) {
        $user = new User($id, $firstName, $lastName, $age, $email);

        return $user;
    }
}
