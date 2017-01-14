<?php

namespace App\UserInterface\AppBundle\Services;

use App\Application\Factory\EventFactory;
use App\Application\Factory\UserFactory;
use App\Application\UseCase\CreateEvent\CreateEventCommand;
use App\Application\UseCase\CreateEvent\CreateEventHandler;
use App\Application\UseCase\CreateUser\CreateUserCommand;
use App\Application\UseCase\CreateUser\CreateUserHandler;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use App\Infrastructure\Domain\UserRegistry;
use App\UserInterface\AppBundle\Entity\Event;
use App\UserInterface\AppBundle\Entity\User;

class UserDataMapper
{
    public $userRegistry;
    public $userFactory;
    public $eventFactory;

    public function __construct(UserRegistry $userRegistry, UserFactory $userFactory, EventFactory $eventFactory)
    {
        $this->userRegistry = $userRegistry;
        $this->userFactory = $userFactory;
        $this->eventFactory = $eventFactory;
    }

    public function insertUserToRegistry(User $user)
    {
        $domainUser = new CreateUserCommand(
            new IntNumber($user->getId()),
            new StringType($user->getFirstName()),
            new StringType($user->getLastName()),
            new IntNumber($user->getAge()),
            new StringType($user->getEmail())
        );

        $handledUser = new CreateUserHandler($this->userFactory, $this->userRegistry);
        $handledUser->handle($domainUser);
    }

    public function insertEventToRegistry(Event $event, $userId)
    {
        $event = new CreateEventCommand(
            new IntNumber($event->getId()),
            new StringType($event->getTitle()),
            new IntNumber($userId),
            new StringType($event->getDescription()),
            new DateTimeType($event->getDateStart()),
            new DateTimeType($event->getDateEnd())
        );

        $handledEvent = new CreateEventHandler($this->userRegistry, $this->eventFactory);
        $handledEvent->handle($event);
    }
}
