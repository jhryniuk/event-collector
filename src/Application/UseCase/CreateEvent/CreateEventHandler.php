<?php

namespace App\Application\UseCase\CreateEvent;

use App\Application\Command;
use App\Application\CommandHandler;
use App\Application\Factory\EventFactory;
use App\Application\UseCase\Responder;
use App\Application\UseCase\ResponderAwareBehavior;
use App\Domain\Event;
use App\Domain\UserRegistry;

class CreateEventHandler implements CommandHandler, Responder
{
    use ResponderAwareBehavior;

    private $userRegistry;
    private $eventFactory;

    public function __construct(UserRegistry $userRegistry, EventFactory $eventFactory)
    {
        $this->userRegistry = $userRegistry;
        $this->eventFactory = $eventFactory;
    }

    /**
     * @inheritdoc
     * @param CreateEventCommand $command
     */
    public function handle(Command $command)
    {
        $user = $this->userRegistry->findById($command->userId);
        $event = $this->eventFactory->createEvent($command->id, $command->userId, $command->title,
            $command->description, $command->date_start, $command->date_end);
    }

    public function eventCreated(Event $event)
    {
        foreach ($this->responders as $responder) {
            $responder->eventCreated($event);
        }
    }

    public function eventAlreadyExist(Event $event)
    {
        foreach ($this->responders as $responder) {
            $responder->eventAlreadyExist($event);
        }
    }
}