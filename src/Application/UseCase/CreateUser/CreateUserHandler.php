<?php

namespace App\Application\UseCase\CreateUser;

use App\Application\Command;
use App\Application\CommandHandler;
use App\Application\UseCase\ResponderAware;
use App\Application\UseCase\ResponderAwareBehavior;
use App\Domain\UserRegistry;

class CreateUserHandler implements CommandHandler, ResponderAware
{
    use ResponderAwareBehavior;

    private $userRegistry;

    public function __construct(UserRegistry $registry)
    {
        $this->userRegistry = $registry;
    }

    /**
     * @param CreateUserCommand $command
     */
    public function handle(Command $command)
    {
        $user = $this->userRegistry->find($command->id);
    }
}
