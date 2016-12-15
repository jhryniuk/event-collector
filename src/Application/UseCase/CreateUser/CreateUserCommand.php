<?php

namespace App\Application\UseCase\CreateUser;

use App\Application\Command;

final class CreateUserCommand implements Command
{
    public $id;
    public $firstName;
    public $lastName;
    public $age;
    public $email;
}