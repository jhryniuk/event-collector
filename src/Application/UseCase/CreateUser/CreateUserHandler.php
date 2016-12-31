<?php

namespace App\Application\UseCase\CreateUser;

use App\Application\Command;
use App\Application\CommandHandler;
use App\Application\Factory\UserFactory;
use App\Application\UseCase\ResponderAware;
use App\Application\UseCase\ResponderAwareBehavior;
use App\Domain\User;
use App\Domain\UserRegistry;

class CreateUserHandler implements CommandHandler, ResponderAware
{
    use ResponderAwareBehavior;

    private $userFactory;
    private $userRegistry;

    public function __construct(UserFactory $userFactory, UserRegistry $userRegistry)
    {
        $this->userFactory = $userFactory;
        $this->userRegistry = $userRegistry;
    }

    /**
     * @inheritdoc
     * @param CreateUserCommand $command
     */
    public function handle(Command $command)
    {
        $user = $this->userFactory->createUser(
            $command->id,
            $command->firstName,
            $command->lastName,
            $command->age,
            $command->email
        );

        $checkedUser = $this->userRegistry->findByEmail($command->email);
        if (!($checkedUser instanceof User)) {
            $this->userRegistry->register($user);
            $this->userCreated($user);
        } else {
            $this->userNotCreated($user);
        }
    }

    /**
     * @inheritdoc
     */
    public function userCreated(User $user)
    {
        foreach ($this->responders as $responder) {
            $responder->userCreated($user);
        }
    }

    /**
     * @inheritdoc
     */
    public function userNotCreated(User $user)
    {
        foreach ($this->responders as $responder) {
            $responder->userNotCreated($user);
        }
    }
}
