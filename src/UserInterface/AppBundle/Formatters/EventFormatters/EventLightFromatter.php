<?php

namespace App\UserInterface\AppBundle\Formatters\EventFormatters;

use App\Domain\Event;
use App\UserInterface\AppBundle\Formatters\AbstractJsonFormatter;

class EventLightFromatter extends AbstractJsonFormatter
{
    /** @var Event  */
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->event->getId(),
            'title' => $this->event->getTitle(),
            'date_start' => $this->event->getDateStart(),
            'date_end' => $this->event->getDateEnd()
        ];
    }
}
