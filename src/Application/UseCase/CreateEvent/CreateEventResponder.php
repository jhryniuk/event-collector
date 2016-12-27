<?php

namespace App\Application\UseCase\CreateEvent;

use App\Application\UseCase\Responder;
use App\Domain\Event;

interface CreateEventResponder extends Responder
{
    /**
     * @param Event $event
     * @return void
     */
    public function eventCreated(Event $event);

    /**
     * @param Event $event
     * @return void
     */
    public function eventAlreadyExist(Event $event);
}
