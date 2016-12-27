<?php

namespace App\Application\UseCase\CreateUser;

use App\Application\Command;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

final class CreateUserCommand implements Command
{
    public $id;
    public $firstName;
    public $lastName;
    public $age;
    public $email;

    public function __construct(
        IntNumber $id,
        StringType $firstName,
        StringType $lastName,
        IntNumber $age,
        StringType $email
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->email = $email;
    }
}
