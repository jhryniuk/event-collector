<?php

namespace App\Application\UseCase\CreateUser;

use App\Application\UseCase\Responder;
use App\Domain\User;

interface CreateUserResponder extends Responder
{
    /**
     * @param User $user
     * @return void
     */
    public function userCreated(User $user);

    /**
     * @param User $user
     * @return void
     */
    public function userNotCreated(User $user);
}